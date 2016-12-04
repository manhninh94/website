<div class="backlink">
	<ul>
	<li class="tit">
			<span>Liên kết Website:</span>
	</li>
	  <?php
		$sql="select * from tbl_backlink";
		$query=mysql_query($sql);
		$stt=0;
		while($row=mysql_fetch_array($query))
		{?>
		<li>
			<a href="<?echo $row['link']?>" title="<?echo $row['title']?>"><?echo $row['title']?></a>
		</li>
		<?}?>
	</ul>
</div>
