<?php 
ob_start();
$edit=input('edit','GET');
$del=intval(input('del','GET'));
if($del){
	$DB->exec_delete('product','`id`='.$del);
	header("location: ".$_SERVER['HTTP_REFERER']);
}
//
$qs=$DB->query("SELECT * FROM multi_category WHERE parent_id=0 ORDER BY cat_order DESC");
while($rs=$DB->fetch_array($qs)){
	$sub_cat=array();
	$q1s=$DB->query("SELECT * FROM multi_category WHERE parent_id=".$rs['id']." ORDER BY cat_order DESC");
	while($r1s=$DB->fetch_array($q1s)){
		$sub_cat[]=$r1s;
	}
	$cat_list[] = array('id'=>$rs['id'],'name'=>$rs['name'],'order'=>$rs['cat_order'],'active'=>$rs['active'],'sub_cat'=>$sub_cat);
}
$TPL->assign('cat_list',$cat_list);

if($edit){
	include PATH_ROOT.'/admin/wysiwyg/fckeditor.php';
	if($edit=='post'){
		$oFCKeditor = new FCKeditor('desc_sp') ;
		$oFCKeditor->BasePath	=  'wysiwyg/' ;
		$oFCKeditor->Value		= 'Mô tả chi tiết sản phẩm!' ;
		$TPL->assign('textarea',$oFCKeditor->Create());
		if($submit=='addnew'){
			$name=input('name_sp','POST',true);
			$ma_sp=input('ma_sp','POST',true);
			$desc_sp=input('desc_sp','POST',true);
			$cat=input('cat','POST');
			$thumb=$_FILES['thumb']['name'];
			$active=input('active','POST');
			$choise=input('choise','POST');
			if(!$name || !$ma_sp || !$desc_sp || !$thumb){
				$err='Lỗi : Chưa điền đầy đủ thông tin cần thiết !';
			}else{
				$img_name=time().'_'.$thumb;
				if($thumb){
					$upl=new upl();
					$upl->MAX_SIZE = 5000000;
					$upl->FILENAME_SAVE =$img_name;
					$upl->UPL_INPUT = "thumb";
					$upl->PATH = PATH_ROOT.'/uploads/product';
					$upl->upl_process();
					if($upl->ERROR_RETURN != null) $err = $upl->ERROR_RETURN;
				}
				if(!$err){
					$source =PATH_ROOT.'/uploads/product/'.$img_name;
					$destination = PATH_ROOT.'/uploads/product/thumbs/'.$img_name;
					full_copy($source, $destination);
					$obj = new img_opt();
					$obj->max_width(120);
					$obj->max_height(90);
					$obj->image_path($destination);
					$obj->image_resize();
					//Logo Small
					  $logo1=PATH_ROOT.'/images/print1.png';
					  $printlogo = new PrintLogo();
					  $printlogo->createImageAndLogo($source,$logo1);
					  $printlogo->InsertLogo(3);
					 $printlogo->showImage(PATH_ROOT.'/uploads/product/',$img_name);
					//Logo 
					  $logo2=PATH_ROOT.'/images/print.png';
					  $printlogo2 = new PrintLogo();
					  $printlogo2->createImageAndLogo($destination,$logo2);
					  $printlogo2->InsertLogo(3);
					  $printlogo2->showImage(PATH_ROOT.'/uploads/product/thumbs/',$img_name);
					  $DB->exec_insert('product',array(
							array('cat','title','masp','khuyenmai','thumb','chitiet','active'),
							array($cat,$name,$ma_sp,$choise,$img_name,$desc_sp,$active)));
					  header("location: index.php?act=product");
				}
			}
		}
	}else{
		$pro=$DB->query_first("SELECT * FROM product WHERE `id`=".$edit);
		$TPL->assign('pro',$pro);
		$oFCKeditor = new FCKeditor('desc_sp') ;
		$oFCKeditor->BasePath	=  'wysiwyg/' ;
		$oFCKeditor->Value		= $pro['chitiet'] ;
		$TPL->assign('textarea',$oFCKeditor->Create());
		if($submit=='editnew'){
			$name=input('name_sp','POST',true);
			$ma_sp=input('ma_sp','POST',true);
			$desc_sp=input('desc_sp','POST',true);
			$cat=input('cat','POST');
			$thumb=$_FILES['thumb']['name'];
			$active=input('active','POST');
			$choise=input('choise','POST');
			if(!$name || !$ma_sp || !$desc_sp){
				$err='Lỗi : Chưa điền đầy đủ thông tin cần thiết !';
			}else{
				if($thumb){
					$img_name=time().'_'.$thumb;
					$upl=new upl();
					$upl->MAX_SIZE = 500000;
					$upl->FILENAME_SAVE =$img_name;
					$upl->UPL_INPUT = "thumb";
					$upl->PATH = PATH_ROOT.'/uploads/product';
					$upl->upl_process();
					if($upl->ERROR_RETURN != null) $err = $upl->ERROR_RETURN;
				}
				if(!$err){
					if($thumb){
						$source =PATH_ROOT.'/uploads/product/'.$img_name;
						$destination = PATH_ROOT.'/uploads/product/thumbs/'.$img_name;
						full_copy($source, $destination);
						$obj = new img_opt();
						$obj->max_width(120);
						$obj->max_height(90);
						$obj->image_path($destination);
						$obj->image_resize();
						//Logo Small
						  $logo1=PATH_ROOT.'/images/print1.png';
						  $printlogo = new PrintLogo();
						  $printlogo->createImageAndLogo($source,$logo1);
						  $printlogo->InsertLogo(3);
						  $printlogo->showImage(PATH_ROOT.'/uploads/product/',$img_name);
						//Logo 
						  $logo2=PATH_ROOT.'/images/print.png';
						  $printlogo2 = new PrintLogo();
						  $printlogo2->createImageAndLogo($destination,$logo2);
						  $printlogo2->InsertLogo(3);
						  $printlogo2->showImage(PATH_ROOT.'/uploads/product/thumbs/',$img_name);
						  $DB->exec_update('product',array(
								array('cat','title','masp','khuyenmai','thumb','chitiet','active'),
								array($cat,$name,$ma_sp,$choise,$img_name,$desc_sp,$active)),'`id`='.$edit);
						  header("location: index.php?act=product");
					}else{
						$DB->exec_update('product',array(
							array('cat','title','masp','khuyenmai','chitiet','active'),
							array($cat,$name,$ma_sp,$choise,$desc_sp,$active)),'`id`='.$edit);
					 	  header("location: index.php?act=product");
					}
				}
			}
		}
	}
}else{
	
	
	//Submit
	if($submit=='active_article'){
		$active=input('active','POST');
		$choise=input('choise','POST');
		$ids=input('ids','POST');
		foreach($ids as $k=>$v){
			$DB->query("UPDATE product SET khuyenmai=".$choise[$k].",active=".$active[$k]." WHERE `id`=".$ids[$k]);
			header("location: ".$_SERVER['HTTP_REFERER']);
		}
	}
	if($submit=="search"){
		$keyword=input('keyword','POST');
		$q=$DB->query("SELECT * FROM product WHERE title LIKE ".$DB->quote('%'.$keyword.'%')." OR masp LIKE ".$DB->quote('%'.$keyword.'%'));
		while($r=$DB->fetch_array($q)){
			$List_SP[] = $r;
		}
	}else{
		$page = intval(input('page','get'));
		if ($page == "") { $page="1";}
		$sel_all = $DB->query_first("SELECT COUNT(*) m FROM product WHERE 1");
		
		$limit = 20;
		$number = $sel_all['m'];
		$total = ceil($number/$limit);
		$start = (($page*$limit)-$limit);
		$q=$DB->query("SELECT * FROM product WHERE 1 ORDER BY `id` DESC LIMIT $start,$limit");
		while($r=$DB->fetch_array($q)){
			$List_SP[] = $r;
		}
	}
	$TPL->assign('List_SP',$List_SP);
	$TPL->assign('page',page($page,$total,'?act=product',''));
}
$TPL->assign('err',$err);
$TPL->assign('edit',$edit);
$TPL->assign('Body',$TPL->output('product',true));
?>