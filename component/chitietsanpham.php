<div class="container">
<div class="products-page">
<div class="products">
    <div class="product-listy">
        <?php
        $sql="select * FROM `chuyenmucsanpham`";
        $query=mysql_query($sql);
        mysql_query("SET NAMES 'UTF8'");
        $stt=0;
        while($rows=mysql_fetch_array($query)){
            $stt++;
            $id=$rows['ID'];
            ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $id;?>">
                    <h2>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $rows['ID']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $rows['ID']; ?>">
                            <?php echo $rows['TenCM'];?>
                        </a>
                    </h2>
                </div>
                <!-- <div id="heading<?php /*echo $id;*/?>" class="panel-collapse collapse <?php /*if($stt==1) echo "in";*/?>" role="tabpanel" aria-labelledby="heading<?php /*echo $id;*/?>">-->
                <div id="collapse<?php echo $id;?>" class="panel-collapse collapse <?php if($stt==1) echo "in";?>" role="tabpanel" aria-labelledby="heading<?php echo $id;?>">
                    <ul class="product-list">
                    <?php
                    $sql1="select * FROM `nhomsanpham` WHERE MaCM='$id'";
                    $query1=mysql_query($sql1);
                    mysql_query("SET NAMES 'UTF8'");
                    $stt=0;
                    while($row=mysql_fetch_array($query1)){
                        $stt++;
                        $url='index.php?com=blocksanpham&cateid='.$row['ID'];
                        ?>
                        <li>
                            <a class="" href="<?php echo $url;?>">
                                <?php echo $row['TenNhom'];?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <div class="latest-bis">
        <img src="images/l4.jpg" class="img-responsive" alt="" />
        <div class="offer">
            <p>40%</p>
            <small>Top Offer</small>
        </div>
    </div>
    <div class="tags">
        <h4 class="tag_head">Tags Widget</h4>
        <ul class="tags_links">
            <?php $sql="select * FROM `tag` LIMIT 0,10";
            //echo $sql;
            $query=mysql_query($sql);
            mysql_query("SET NAMES 'UTF8'");
            while($row=mysql_fetch_array($query)){
            $url='index.php?com=danhsachsanpham&tag='.$row['TenTag'];
            ?>
            <li><a href="#"><?php echo $row['TenTag'];?></a></li>
           <?php }?>
        </ul>

    </div>

</div>
<div class="new-product">
<div class="col-md-5 zoom-grid">
    <div class="flexslider">
        <ul class="slides">
            <li data-thumb="images/si.jpg">
                <div class="thumb-image"> <img src="images/si.jpg" data-imagezoom="true" class="img-responsive" alt="" /> </div>
            </li>
            <li data-thumb="images/si1.jpg">
                <div class="thumb-image"> <img src="images/si1.jpg" data-imagezoom="true" class="img-responsive" alt="" /> </div>
            </li>
            <li data-thumb="images/si2.jpg">
                <div class="thumb-image"> <img src="images/si2.jpg" data-imagezoom="true" class="img-responsive" alt="" /> </div>
            </li>
        </ul>
    </div>
</div>
<div class="col-md-7 dress-info">
<?php
// Đếm lượt view của bài viết............
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $sql="UPDATE `sanpham` SET `LuotXem`= `LuotXem`+1 WHERE MaSP='$id'";// mỗi lần load từ csdl lên thì tăng biến đếm lên 1 đơn vị,
    mysql_query($sql);
}
$sql="SELECT * FROM `sanpham` WHERE MaSP='$id'";
$query=mysql_query($sql);
$count=mysql_num_rows($query);
?>
<?php $row=mysql_fetch_array($query);?>

    <div class="dress-name">
        <h3><?php echo $row['TenSP'];?></h3>
        <span><?php  if($row['DonGia']==0){echo"Liên hệ";}else{echo number_format ($row['DonGia'],0,'','.'). " VNĐ";}?></span>
        <div class="clearfix"></div>
        <p><?php echo $row['TomTat'];?></p>
    </div>
    <div class="span span1">
        <p class="left">Xuất xứ</p>
        <p class="right"><?php echo $row['XuatXu'];?></p>
        <div class="clearfix"></div>
    </div>
    <div class="span span2">
        <p class="left">Màu sắc</p>
        <p class="right"><?php echo $row['MauSac'];?></p>
        <div class="clearfix"></div>
    </div>
    <div class="span span3">
        <p class="left">Chất liệu</p>
        <p class="right"><?php echo $row['ChatLieu'];?></p>
        <div class="clearfix"></div>
    </div>
    <div class="span span4">
        <p class="left">SIZE</p>
        <p class="right"><span class="selection-box"><select class="domains valid" name="domains">
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>FS</option>
                    <option>S</option>
                </select></span></p>
        <div class="clearfix"></div>
    </div>
    <div class="purchase">
        <a href="index.php?com=giohang&add=<?php echo $row['MaSP'];?>" class="btn btn-success">Purchase Now</a>
        <div class="social-icons">
            <ul>
                <li><a class="facebook1" href="#"></a></li>
                <li><a class="twitter1" href="#"></a></li>
                <li><a class="googleplus1" href="#"></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <script src="js/imagezoom.js"></script>
    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
</div>
<div class="clearfix"></div>
<div class="reviews-tabs">
    <!-- Main component for a primary marketing message or call to action -->
    <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
        <li class="test-class active"><a class="deco-none misc-class" href="#how-to"> Chi tiết sản phẩm</a></li>
        <li class="test-class"><a href="#features">Bình luận</a></li>
    </ul>

    <div class="tab-content responsive hidden-xs hidden-sm">
        <div class="tab-pane active" id="how-to">
            <p class="tab-text"><?php echo $row['ThongTinSP'];?></p>
        </div>
        <div class="tab-pane" id="features">
            <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
            <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="tab-pane" id="source">
            <div class="response">
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MARCH 21, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MARCH 26, 2054</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>MAY 25, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>FEB 13, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>JAN 28, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>APR 18, 2015</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="images/icon1.png" alt="" />
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>DEC 25, 2014</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="clearfix"></div>
</div>
</div>
<div class="other-products products-grid">
    <div class="container">
        <header>
            <h3 class="like text-center">Sản phẩm liên quan</h3>
        </header>
        <?php $sql="select * FROM `sanpham` ORDER BY `sanpham`.`LuotXem` DESC LIMIT 0,8";
        //echo $sql;
        $query=mysql_query($sql);
        mysql_query("SET NAMES 'UTF8'");
        while($row=mysql_fetch_array($query)){
        $url='index.php?com=chitietsanpham&id='.$row['MaSP'];
        ?>
        <div class="col-md-4 product simpleCart_shelfItem text-center">
            <a href="<?php echo $url?>" title="<?php echo $row['TenSP'];?>">
                <img src="<?php echo $row['HinhAnh'];?>" alt="<?php echo $row['TenSP'];?>" title="<?php echo $row['TenSP'];?>" border="0">
            </a>
            <div class="mask">
                <a href="<?php echo $url;?>">Quick View</a>
            </div>
            <a class="product_name" href="single.html"><?php echo $row['TenSP'];?></a>
            <p><a class="item_add" href="#"><i></i> <span class="item_price"><?php  if($row['DonGia']==0){echo"Liên hệ";}else{echo number_format ($row['DonGia'],0,'','.'). " VNĐ";}?></span></a></p>
        </div>
        <?php }?>
        <div class="clearfix"></div>
    </div>
</div>
<!-- content-section-ends -->
<div class="news-letter">
    <div class="container">
        <div class="join">
            <h6>JOIN OUR MAILING LIST</h6>
            <div class="sub-left-right">
                <form>
                    <input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
                    <input type="submit" value="SUBSCRIBE" />
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

