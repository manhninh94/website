<div class="box" style="margin:20px 0px 0px 0px;padding:10px 0px 20px 10px;">
	<?php 
	// Đếm lượt view của bài viết............
	if(isset($_GET["id"]))
	{
		$con_id=$_GET["id"];
		//echo $con_id;
		$sql="UPDATE `tintuc` SET `LuotXem`=`LuotXem`+1 WHERE ID='$con_id'";// mỗi lần load từ csdl lên thì tăng biến đếm lên 1 đơn vị, 
		mysql_query($sql);
	}
		$sql="select * from tintuc where ID='$con_id'";
		$query=mysql_query($sql);
		$rows=mysql_fetch_array($query);
		?>
		<div class="detail_content">
            <h3 class="detail_title"><?php  echo $rows['TieuDe'];?></h3>
            <div class="fb-like" data-href="http://fb.me" data-send="true" data-width="450" data-show-faces="true"></div>
            <div class="intro" ><i>
                <?php
                    $str = html_entity_decode($rows['TomTat']); //Tạo chuỗi
                    $str = strip_tags($str); //Lược bỏ các tags HTML
                    echo $str;
                ?>
            </i></div><br/>
			<div class="fulltext" >
                <?php
				$fulltext=$rows['NoiDung']; /*** remove (/) slashes ***/
				 echo html_entity_decode($fulltext);?>
			</div>
            <div class="author" >Tác giả:  <?php   echo $rows['TacGia'];?></div>
            <div class="clearfix"></div>
				<hr>

				<div class="more">
				<h4>Bài viết có liên quan</h4>
                <ul>
                 <?php
                 $nhom=$rows['MaNhom'];
                 //echo $nhom;
                    $sql="select ID,TieuDe from tintuc where MaNhom='$nhom'";
                    $query=mysql_query($sql);
                    $count=mysql_num_rows($query);
                    ?>
                    <?php
                    while($row=mysql_fetch_array($query)){
                    $url_content="index.php?com=chitiettintuc&id=".$row['ID'];
                    ?>
                    <li><a href="<?php echo $url_content;?>"><?php  echo $row['TieuDe']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

	</div>

<div style="margin-top: 15px">
    <img src="images/banner.png" class="img-full">
</div>
