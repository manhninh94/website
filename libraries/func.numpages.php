<?php
function getNumPages($total, $url,$num_record_show='',$page=''){
		$total_pages=floor($total/$num_record_show);
		$i='';
		if($total>$num_record_show)
		{
		?>
			<ul class="pagination">
			<?php
			settype($page, "int"); 
			$num_page_show=5; // Số trang hiển thị ở phân trang
			if($total_pages>=$num_page_show)
			{
				
			if($page>1)
			{
				 echo '<li class="but_nextprew"><a href="?com='.$url.'&page='.($page-1).'" >Prew</a></li>';
			}
			if($page>=4)
			{
			echo '<li><a href="">...</a></li>';
			}
			if($page>2&& $page+2<=$total_pages)
			{
				$i = $page - 2; 
				$n = $page + 2; 
				for($i;$i <= $n;$i++){ 
				if($i!=$page) { 
					    echo '<li><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} else { 
						echo '<li class="active" ><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} 
				 
				}  
			}	
			elseif($page==$total_pages||$page==$total_pages-1)
			{
				for($i=$total_pages-4;$i <= $total_pages;$i++){ 
				if($i!=$page) { 
					    echo '<li><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} else { 
						echo '<a href="?com='.$url.'&page='.$i.'" ><li class="active" >'.$i.'</a></li>';
					} 
					}
			}
			else
			{
				for($i=1;$i <=$num_page_show;$i++){ 
				if($i!=$page) { 
					    echo '<li><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} else { 
						echo '<a href="?com='.$url.'&page='.$i.'" ><li class="active" >'.$i.'</a></li>';
					} 
				}  
			}
			if($page>=5&&$page<$total_pages-2)
			{
			echo '<li><a href="">...</a></li>';
			}
			if($page<$total_pages)
			{
				 echo '<li  class="but_nextprew"><a href="?com='.$url.'&page='.($page+1).'">Next</a></li>';
			}
			}
			else
			{
				for($i=1;$i <=$total_pages;$i++){ 
				if($i!=$page) { 
					   echo '<li><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} else { 
						echo '<li class="active" ><a href="?com='.$url.'&page='.$i.'" >'.$i.'</a></li>';
					} 
				}  
			}
			?>
			</ul>
			<?php
		}
	}
?>