<?php 
$edit=input('edit','GET');
$del=intval(input('del','GET'));
if($del){
	$DB->exec_delete('post','`post_id`='.$del);
	header("location: ".$_SERVER['HTTP_REFERER']);
}
//Page
	$page=intval(input('page','GET'));
	if($page==''){$page=1;}
	$sel_all=$DB->query_first("SELECT COUNT(*) m FROM post WHERE 1");
	$limit=20;
	$number=$sel_all['m'];
	$total=ceil($number/$limit);
	$start=(($page*$limit)-$limit);
	$qp=$DB->query("SELECT * FROM post WHERE 1 ORDER BY post_date DESC LIMIT $start,$limit");
	while($rp=$DB->fetch_array($qp)){
		$rp['time']=GmFormatDate($rp['post_date'],"d/m/Y");
		$PostList[]=$rp;
	}
	$TPL->assign('PostList',$PostList);
	$TPL->assign('page',page($page,$total,'?act=news',''));
//Submit
if($submit=='active_article'){
	$active=input('active','POST');
	$ids=input('ids','POST');
	foreach($ids as $k=>$v){
		$DB->query("UPDATE post SET post_status=".$active[$k]." WHERE post_id=".$ids[$k]);
		header("location: ".$_SERVER['HTTP_REFERER']);
	}
}
if($edit){
	include PATH_ROOT.'/admin/wysiwyg/fckeditor.php';
	if($edit=='post'){
		$oFCKeditor = new FCKeditor('content') ;
		$oFCKeditor->BasePath	=  'wysiwyg/' ;
		$oFCKeditor->Value		= 'Nhập vào nội dung chi tiết tin!' ;
		$TPL->assign('textarea',$oFCKeditor->Create());
		if($submit=='addnew'){
			$title=input('title','POST',true);
			$desc=input('desc','POST',true);
			$content=input('content','POST',true);
			$thumb=$_FILES['thumb']['name'];
			$active=input('active','POST');
			if(!$title || !$desc || !$content || !$thumb){
				$err='Lỗi : Chưa điền đầy đủ thông tin cần thiết !';
			}else{
				$img_name=time().'_'.$thumb;
				if($thumb){
					$upl=new upl();
					$upl->MAX_SIZE = 500;
					$upl->FILENAME_SAVE =$img_name;
					$upl->UPL_INPUT = "thumb";
					$upl->PATH = PATH_ROOT.'/uploads/news';
					$upl->upl_process();
					if($upl->ERROR_RETURN != null) $err = $upl->ERROR_RETURN;
				}
				if(!$err){
					  $DB->exec_insert('post',array(
							array('post_title','post_desc','post_detail','post_date','post_status','post_img'),
							array($title,$desc,$content,time(),$active,$img_name)));
					  header("location: index.php?act=news");
				}
			}
		}
	}else{
		$news=$DB->query_first("SELECT * FROM post WHERE `post_id`=".$edit);
		$TPL->assign('news',$news);
		$oFCKeditor = new FCKeditor('content') ;
		$oFCKeditor->BasePath	=  'wysiwyg/' ;
		$oFCKeditor->Value		= $news['post_detail'];
		$TPL->assign('textarea',$oFCKeditor->Create());
		if($submit=='editnew'){
			$title=input('title','POST',true);
			$desc=input('desc','POST',true);
			$content=input('content','POST',true);
			$thumb=$_FILES['thumb']['name'];
			$active=input('active','POST');
			if(!$title || !$desc || !$content){
				$err='Lỗi : Chưa điền đầy đủ thông tin cần thiết !';
			}else{
				$img_name=time().'_'.$thumb;
				if($thumb){
					$upl=new upl();
					$upl->MAX_SIZE = 500;
					$upl->FILENAME_SAVE =$img_name;
					$upl->UPL_INPUT = "thumb";
					$upl->PATH = PATH_ROOT.'/uploads/news';
					$upl->upl_process();
					if($upl->ERROR_RETURN != null) $err = $upl->ERROR_RETURN;
				}
				if(!$err){
					if($thumb){
						 $DB->exec_update('post',array(
							array('post_title','post_desc','post_detail','post_status','post_img'),
							array($title,$desc,$content,$active,$img_name)),'post_id='.$edit);
					     header("location: index.php?act=news");
					}else{
					   $DB->exec_update('post',array(
							array('post_title','post_desc','post_detail','post_status'),
							array($title,$desc,$content,$active)),'post_id='.$edit);
					    header("location: index.php?act=news");
					}
				}
			}
		}
	}
}
$TPL->assign('err',$err);
$TPL->assign('edit',$edit);
$TPL->assign('Body',$TPL->output('news',true));
?>