<?php  session_start();
if(isset($_SESSION['user']))
{
	?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css">
		<?php  
			function admin()
			{
			$quyen=$_SESSION["level"];
			if($quyen==1) return true;
			}
		?>
		<?php  include("../config.php");?>
		<?php  include("includes/func.numpages.php");?>
		<div class="box-nav">
		<div id="nav">
			<ul>
				<li class="system">Hệ thống
                    <ul>
                        <li><a href="?task=system">Bảng điều khiển</a></li>

                        <?php  if(admin()){?>
                            <li><a href="?task=nguoidung">QL-Người dùng</a></li>

                        <?php }?>

                    </ul>
                <li>Sim số
                    <ul>
                        <li><a href="?task=nhomsp">QL-Nhóm sim</a></li>
                        <li><a href="?task=simso">QL-Sim số</a></li>
                    </ul>
                </li>
                <li class="system">Chuyên mục tin tức
                    <ul>
                        <li><a href="?task=them_tintuc">Thêm bài viết</a></li>
                        <li><a href="?task=nhomtin">Quản lý nhóm tin</a></li>
                        <li><a href="?task=tintuc">Quản lý tin tức</a></li>
                    </ul>
                </li>

                <?php  if(admin()){?>
                    <li><a href="?task=donhang">Đơn hàng</a></li>
                    <li><a href="?task=thongke">Thống kê doanh số</a></li>

                <?php }?>
                <li class="system">Dạng sim
                    <ul>
                        <li><a href="?task=dauso">Đầu số</a></li>
                        <li><a href="?task=namsinh">Năm sinh</a></li>
                    </ul>
                </li>
				<li><a href="component/thoat.php?unset">Thoát</a></li>
			</ul>
		</div>
		</div>
		<div class="wapper">

	<div id="body">
	
				<?php  
				$task="";
				if(isset($_GET["task"]))
				{
					$task=$_GET["task"];
				}
			?>
	
	<div id="main">

	<?php  
				$task="";
				if(isset($_GET["task"]))
				{
				$task=$_GET["task"];
				switch($task){
				case "chuyenmuc": include("component/xuly_chuyenmuc.php"); break;
				case "them_chuyenmuc": include("component/them_chuyenmuc.php"); break;
                case "nhomsp": include("ckfinder/component/xuly_nhomsp.php"); break;
                case "them_nhomsp": include("ckfinder/component/them_nhomsp.php"); break;
                case "thongke": include("ckfinder/component/thongke.php"); break;
                case "dauso": include("ckfinder/component/xuly_dauso.php"); break;
                case "them_dauso": include("ckfinder/component/them_dauso.php"); break;
                case "namsinh": include("ckfinder/component/xuly_namsinh.php"); break;
                case "them_namsinh": include("ckfinder/component/them_namsinh.php"); break;

                    case "them_simso": include("ckfinder/component/them_simso.php");break;
                case "simso": include("ckfinder/component/xuly_simso.php");break;
                case "them_tintuc": include("ckfinder/component/themtt.php");break;
                case "tintuc": include("ckfinder/component/tintuc.php");break;
                case "them_nhomtin": include("ckfinder/component/them_nhomtin.php");break;
                case "nhomtin": include("ckfinder/component/xuly_nhomtin.php");break;

                case "nguoidung": include("ckfinder/component/xuly_nguoidung.php");break;
                case "doimk": include("component/doimk.php");break;
				case "cart": include("component/xulycart.php"); break;
				case "suport": include("component/xuly_suport.php"); break;
				case "add_suport": include("component/them_suport.php"); break;
				case "login": include("component/login.php");break;
				case "system": include("ckfinder/component/system.php");break;

				case "donhang": include("ckfinder/component/xuly_donhang.php");break;
				case "chitietdonhang": include("ckfinder/component/chitietdonhang.php");break;
				//case "a_mem": include("C:/xampp/htdocs/TTTN/admin/ckfinder/component/themuser.php");break;
				case "a_mem": include("ckfinder/component/themuser.php");break;
				case "add_contents": include("ckfinder/component/themtt.php"); break;
				case "exit": include("thoat.php");break;
				case "info_ac": include("component/info_ac.php");break;
				case "user": include("component/xulyuser.php");break;
				case "search": include("component/search.php");break;
				case "a_user": include("component/themuser.php");break;
				default: include("ckfinder/component/system.php"); break;
				
			}
			}
		else
	{
		include("ckfinder/component/system.php");	
	}
			?>
			</div>
			</div>
		<div class="clear"></div>
			<div id="footer">
<p class="footer">CopyRight @ - Allright revented</p>
</div>
</div>
<?php
}
else
{
    include("ckfinder/component/dangnhap.php");
}
?>
