<div id="vertical-menu" class="DefaultModule cate-menu">

	 <div class="title">
		<h3 class="title">Danh mục sản phẩm</h3>
		<div class="shadow"></div>

 <div class="defaultContent cate-menu-content">
        <ul>
		<?php 
		$sql="select * FROM `chungloai`";
		$query=mysql_query($sql);
		mysql_query("SET NAMES 'UTF8'");
		while($rows=mysql_fetch_array($query))
			{
			$id=$rows['MaCL'];
			?>
			<li class="catalog">
			<a href="chung-loai-san-pham/<?php  echo $rows['MaCL']?>.html" alt="<?php  echo $rows['TenCL'];?>" title="<?php  echo $rows['TenCL'];?>">
			<?php  echo $rows['TenCL'];?></a>
			
				<div style="display: block">
                    <ul>
					<?php  
					$sql1="SELECT *
					FROM `chungloai`, tbl_catalog WHERE tbl_catalog.MaCL = chungloai.MaCL AND tbl_catalog.MaCL='$id'";
					$query1=mysql_query($sql1);
					mysql_query("SET NAMES 'UTF8'");
					while($row=mysql_fetch_array($query1))
					{ 
					?>
	 
                       <li>
						<a href="<?php   echo $row['Url']?>/<?php  echo $row['id']?>.html" alt="<?php  echo $row['Name'];?>" title="<?php  echo $row['Name'];?>">
						<?php  echo $row['Name']; ?> 
						</a>
					</li>
					
                    <?php 
					}
					 ?>
				</ul>
			</div>
			 <?php 
				}
				?>

	</div>
</div>	 
</div>	
		   <!--Start item-->
			 <div class="title">
				<h3 class="title">Dịch vụ</h3>
				<div class="shadow"></div>
					  <?php 
						$sql = "select * from tbl_contents WHERE active=1 AND `manhom`=75 ORDER BY `view` DESC LIMIT 0,5";
						//echo $sql;
						$query1 = mysql_query($sql);
						while($row = mysql_fetch_array($query1)){
						?>
						<div class ="boxNews" >		 
							<div class="imgNews">
					<a href="<?php  echo $row['get_url'];?>-<?php  echo $row['con_id'];?>.html" title="<?php  echo $row['title']?>"><img src="<?php  echo $row['icon']?>" style="margin:2px; width:55px;padding:2px; border:1px solid #eee"></a>
							</div>
							<div class="infoNews">
							<a href="<?php  echo $row['get_url'];?>-<?php  echo $row['con_id'];?>.html" title="<?php  echo $row['title']?>">
								<?php 
											$str = html_entity_decode($row['title']); //Tạo chuỗi
											$str = strip_tags($str); //Lược bỏ các tags HTML
											if(strlen($str)>60) { //Đếm kí tự chuỗi $str, 300 ở đây là chiều dài bạn cần quy định
											$strCut = substr($str, 0, 60); //Cắt 100 kí tự đầu
											$str = substr($strCut, 0, strrpos($strCut, ' ')).'...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
											}
											echo $str;
									?>
							</a>
								</div>
							<div class="clear"></div>
					</div>   
        
            <?php }?>
          
			 </div>
			  <!--End item-->
		
		
			   <!--Start item-->
			 <div class="title">
				<h3 class="title">Tin tức nổi bật</h3>
				<div class="shadow"></div>
					  <?php 
						$sql = "select * from tbl_contents WHERE active=1 AND `manhom`!=75 ORDER BY `view` DESC LIMIT 0,5";
						//echo $sql;
						$query1 = mysql_query($sql);
						while($row = mysql_fetch_array($query1)){
						?>
						<div class ="boxNews" >		 
							<div class="imgNews">
					<a href="<?php  echo $row['get_url'];?>-<?php  echo $row['con_id'];?>.html" title="<?php  echo $row['title']?>"><img src="<?php  echo $row['icon']?>" style="margin:2px; width:55px;padding:2px; border:1px solid #eee"></a>
							</div>
							<div class="infoNews">
							<a href="<?php  echo $row['get_url'];?>-<?php  echo $row['con_id'];?>.html" title="<?php  echo $row['title']?>">
								<?php 
											$str = html_entity_decode($row['title']); //Tạo chuỗi
											$str = strip_tags($str); //Lược bỏ các tags HTML
											if(strlen($str)>60) { //Đếm kí tự chuỗi $str, 300 ở đây là chiều dài bạn cần quy định
											$strCut = substr($str, 0, 60); //Cắt 100 kí tự đầu
											$str = substr($strCut, 0, strrpos($strCut, ' ')).'...'; //Tránh trường hợp cắt dang dở như "nội d... Read More"
											}
											echo $str;
									?>
							</a>
								</div>
							<div class="clear"></div>
					</div>   
        
            <?php }?>
          
			 </div>
			  <!--End item-->
			   
			   <!--Start item-->
			 <div class="title">
				<h3 class="title">Hỗ trợ trực tuyến</h3>
				<div class="shadow"></div>
					 <?php 
					$sql = "select * from  tbl_suport";
					$query1 = mysql_query($sql);
					while($row = mysql_fetch_array($query1)){
						?>
					 <div class="suport">
					 <h3><?php  echo $row['title']?></h3>
						<ul>
						<li ><img src="images/user.png" ></li>
							<li>Yahoo:</li>
							<li>
							
							<a href="ymsgr:sendim?<?php  echo $row['yahoo']?>">
							<img border="0"  src="http://opi.yahoo.com/online?u=<?php  echo $row['yahoo']?>&t=1"  mce_src="http://opi.yahoo.com/online?u=<?php  echo $row['yahoo']?>&t=1"  width="80"></a>
							</li>
							
						</ul>
					 </div>
					 <div style="
					 clear:both;margin:0px 0px 10px 0px;"></div>
					 <div class="suport">
						<ul>
						<li><img src="images/phone.png" ></li>
						<li>Phone: </li>
							<li><?php  echo $row['phone']?></li>
			
							
						</ul>
					 </div>
					 <div class="suport">
						<ul>
						<li><img src="images/skype.png" width=16px></li>
						<li>Skype: </li>
							<li><?php  echo $row['skype']?></li>
						</ul>
					 </div>
					 <div class="gachcham1"></div>
					<?php }?>
				</div>
	 <div class="title">
		<h3 class="title">Sản phẩm nổi bật</h3>	
		<div class="shadow"></div>
			<MARQUEE onmouseover=this.stop() onmouseout=this.start() 
			scrollAmount=2 direction="up" style="height:200px;width:235px;margin:5px 0px 10px 0px;"> 
			<div align=center > 
				<?php 
						$sql = "select * from sanpham WHERE active=1";
						//echo $sql;
						$query1 = mysql_query($sql);
						while($row = mysql_fetch_array($query1)){
						?>
						<img src="<?php  echo $row['HinhAnh']?>" width="215" hspace=6 vspace=1 align=left class=Images title="<?php  echo $row['TenSP']?>"> 
						<?php  echo $row['TenSP']?>
				
					<?php }?>
			</div></MARQUEE>
		</div>		
<div class="title">
		<h3 class="title">Hình ảnh công ty</h3>	
		<div class="shadow"></div>
			<MARQUEE onmouseover=this.stop() onmouseout=this.start() 
			scrollAmount=2 direction="left" style="height:200px;width:235px;margin:5px 0px 10px 0px;"> 
			<div align=center > 
				<?php 
						$sql = "select * from tbl_images_marquee WHERE active=1";
						//echo $sql;
						$query1 = mysql_query($sql);
						while($row = mysql_fetch_array($query1)){
						?>
						<img src="<?php  echo $row['image']?>" width="215" hspace=6 vspace=1 align=left class=Images title="<?php  echo $row['info']?>"> 
				
					<?php 
					}?>
			</div></MARQUEE>
		</div>					
 </div>
			 
			 
			  <!--End item-->
			  