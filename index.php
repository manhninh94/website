
<?php

 require_once('component/connect.php');
?>
<html>
<head>
    <title>
        VNPT Thái Nguyên
    </title>
    <meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="GallerySoft.info" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="Stylesheet" type="text/css" href="css/style-index.css"/>
    <!--[if lt IE 10]>
    <link rel="stylesheet" type="text/css" href="css/style-ie.css" />
    <![endif]-->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script language="javascript">

        $(document).ready(function()
        {
            initSlideShow();

        });

        function initSlideShow()
        {
            if($(".slideshow div").length > 1) //Only run slideshow if have the slideshow element and have more than one image.
            {
                var transationTime = 3000;//5000 mili seconds i.e 5 second
                $(".slideshow div:first").addClass('active'); //Make the first image become active i.e on the top of other images
                setInterval(slideChangeImage, transationTime); //set timer to run the slide show.
            }
        }


        function slideChangeImage()
        {
            var active = $(".slideshow div.active"); //Get the current active element.
            if(active.length == 0)
            {
                active = $(".slideshow div:last"); //If do not see the active element is the last image.
            }

            var next = active.next().length ? active.next() : $(".slideshow div:first"); //get the next element to do the transition
            active.addClass('lastactive');
            next.css({opacity:0.0}) //do the fade in fade out transition
                .addClass('active')
                .animate({opacity:1.0}, 2000, function()
                {
                    active.removeClass("active lastactive");
                });

        }

    </script>

    <script type="text/javascript">
        $(function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > 500) $('#goTop').fadeIn();
                else $('#goTop').fadeOut();
            });
            $('#goTop').click(function () {
                $('body,html').animate({scrollTop: 0}, 'slow');
            });
        });
    </script>
</head>
<body>
<?php   session_start(); ?>
<?php
include("config.php");
include("libraries/func.numpages.php");
?>
<div class="container" style="width: 980px">
    <div id="header-top">
            <div id="logo"><h1>SIM SỐ ĐẸP</h1></div>
            <div id="menu">
                <ul>
                    <li style="margin-left:0px;"><a style="background: url(images/home.png) no-repeat left center #FF7F27;height:36px;width:38px;padding: 0px;"  href="index.php"></a></li>
                    <li><a style="" href="index.php?com=simsodep">Kho sim số đẹp</a></li>
                    <!--<li style="border-left: none;"><a style="" href="index.php">Danh mục dịch vụ </a>
                        <?php
/*                        echo'<ul id="submenu">';
                        echo'</ul>';
                        */?>
                    </li>-->
                    <li><a style="" href="index.php?com=gioithieu">Giới thiệu</a></li>
                    <li><a style="" href="index.php?com=huongdan">Hướng dẫn</a></li>
                   <!-- <li><a style="" href="gioithieu.php">Thanh toán</a></li>-->
                    <li><a style="" href="index.php?com=tintuc">Tin tức</a></li>
                    <li><a style="" href="index.php?com=lienhe">Liên hệ</a></li>
                </ul>

                <div class="search">
                    <form action="" method="post">
                        <input class="inputsearch" type="text" name="search" placeholder="Tìm kiếm" />
                        <input class="inputsubmit" type="submit" name="timkiem" value="Search" />
                    </form>
                </div> <!-- end search -->
            </div>

        </div><!-- end header-top -->
    <div class="page clearfix ">
        <div class="row">
            <div class="col-item col-md-8">
                <div class="slidebanner">
                    <div class="slideshow">
                        <div><a href="#"><img src="images/vnpt2.jpg"  class="img-full"/></a></div>
                        <div><a href="#"><img src="images/vnpt3.jpg" class="img-full"/></a></div>
                        <div><a href="#"><img src="images/vnpt4.gif" class="img-full"/></a></div>
                        <div><a href="#"><img src="images/vnpt6.jpg" class="img-full"/></a></div>
                    </div>
                </div> <!-- end slidebanner -->
<!--
                --><?php
                $com="";
                if(isset($_GET["com"]))
                {
                    $com=$_GET["com"];
                }
                switch($com){
                    case "reset": include("component/reset.php"); break;
                    case "detail": include("component/chitiettintuc.php"); break;
                    case "blocksim": include("component/blocksim.php"); break;
                    case "chitiettintuc": include("component/chitiettintuc.php"); break;
                    case "tintuc": include("component/tintuc.php"); break;
                    case "giohang": include("component/giohang.php"); break;
                    case "hoanthanh": include("component/hoanthanh.php"); break;
                    case "gioithieu": include("component/gioithieu.php"); break;
                    case "huongdan": include("component/huongdan.php"); break;
                    case "lienhe": include("component/lienhe.php"); break;
                    case "simsodep": include("component/simsodep.php"); break;
                    default: include("component/home.php"); break;
                }

                ?>
            </div>
            <div class="col-item col-md-4">
			   <div class="module">
                    <h3 class="head">Sim theo thể loại</h3>
                    <ul>
                        <?php
                        $stt='';
                        $sql="select * FROM `nhomsim` LIMIT 0,8";
                        $query=mysql_query($sql);
                        mysql_query("SET NAMES 'UTF8'");
                        while($row=mysql_fetch_array($query)){
							$url="index.php?com=blocksim&cata_id=".$row['ID'];
                            $stt++;
                            ?>
                            <li><a href="<?php echo $url;?>"><?php echo $row['TenNhom'];?></a></li>
                        <?php }?>
                    </ul>
                </div>

                <div class="module">
                    <img src="images/banner-1.jpg" class="img-full">
                </div>

                <div class="module">
                    <h3 class="head">Chọn đầu số</h3>
                    <ul>
                        <?php
                        $stt='';
                        $sql="select * FROM `dauso` LIMIT 0,8";
                        $query=mysql_query($sql);
                        mysql_query("SET NAMES 'UTF8'");
                        while($row=mysql_fetch_array($query)){
                            $stt++;
                            $url="index.php?com=blocksim&tag=".$row['DauSo'];
                            ?>
                            <li><a href="<?php echo $url;?>"><?php echo $row['DauSo'];?></a> </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="module">
                    <h3 class="head">Video Clip</h3>
                    <iframe  width="100%" height="auto" src="https://www.youtube.com/embed/wDde6W3O9d4" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="module">
                    <h3 class="head">Sim năm sinh</h3>
                    <ul>
                        <?php
                        $stt='';
                        $sql="select * FROM `namsinh` LIMIT 0,8";
                        $query=mysql_query($sql);
                        mysql_query("SET NAMES 'UTF8'");
                        while($row=mysql_fetch_array($query)){
                            $stt++;
                            $url="index.php?com=blocksim&tag=".$row['NamSinh'];
                            ?>
                            <li><a href="<?php echo $url;?>"><?php echo $row['NamSinh'];?></a> </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="module">
                    <h3 class="head">Sim Số Vip</h3>
                    <ul class="list">
                        <?php
                        $stt='';
                        $sql="select * FROM `simso` ORDER BY `DonGia` AND DaBan='0' DESC LIMIT 0,15";
                        $query=mysql_query($sql);
                        mysql_query("SET NAMES 'UTF8'");
                        while($row=mysql_fetch_array($query)){
                            $stt++;
                            $url_cart="index.php?com=giohang&add=".$row['ID'];
                            ?>
                            <li>
                                <a href="<?php echo $url_cart;?>" class="pull-left txt-number"><?php echo $row['So'];?></a>
                                <span class="pull-right"><?php echo number_format ($row['DonGia'],0,'','.'). " VND";?></span>
                                <div class="clearfix"></div>
                            </li>
                        <?php }?>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>

        </div> <!-- end content -->
        <div id="footer">
            <div id="footer-top">
                <div class="left-footer">
                    <p style="color:red;font-size: 16px;">VNPT - THÁI NGUYÊN</p>
                    <p>Điện thoại:<span style="color: #0690D7;"> 0280 3 842000</span> </p>
                    <p>Địa Chỉ:<span style="color: #0690D7;"> 108 Lương Ngọc Quyến - Thái Nguyên </span></p>
                    <p>Bản quyền:<span style="color: #0690D7;"> VNPT - Thái Nguyên</span></p>
                    <p>Ghi rõ nguồn từ khi phát hành lại thông tin từ website này</p>
                </div>
            </div>
            <div id="menu-bottom">

            </div>

        </div>
    </div> <!-- end main -->
</div> <!-- end auto-center -->
<p id="goTop">
    <a href="#"></a>
</p>
</body>
</html>

