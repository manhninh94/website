<script type="text/javascript">
function check_frmdangnhap(){
		if(document.frmdangnhap.username.value == ""){
			alert("Hãy nhập Tên Đăng nhập!");
			document.frmdangnhap.username.focus();
			return false;
		}
		if(document.frmdangnhap.username.value == ""){
			alert("Hãy nhập Tên Đăng nhập!");
			document.frmdangnhap.username.focus();
			return false;
		}
		if(document.frmdangnhap.pass_old.value == ""){
			alert("Hãy nhập Mật khẩu cũ!");
			document.frmdangnhap.pass_old.focus();
			return false;
		}
		if(document.frmdangnhap.newpass1.value == ""){
			alert("Hãy nhập Mật khẩu mới!");
			document.frmdangnhap.newpass1.focus();
			return false;
		}
		if(document.frmdangnhap.newpass2.value == ""){
			alert("Hãy nhập lại Mật khẩu mới!");
			document.frmdangnhap.newpass2.focus();
			return false;
		}
}
</script>
<div id="tit_list">
<div id="txt"><p>Changes Password</p></div>
</div>
<div class="box_upload">
<form action="?task=doimk" name="frmdangnhap" onsubmit="return check_frmdangnhap()" method="post" enctype="multipart/form-data">
	<table class="tbl2">
		<tr>
			<td class="tbltitle">Username: </td>
			<td><input type="text" name="username" value="" /></td>
		</tr>
		<tr>
			<td class="tbltitle">Password: </td>
			<td><input type="password" name="pass_old" value="" /></td>
		</tr>
		</table>
	<table class="tbl1">
		<tr>
			<td class="tbltitle">New Password: </td>
			<td><input type="password" name="newpass1" value="" /></td>
		</tr>
		<tr>
			<td class="tbltitle">Reply Pass: </td>
			<td><input type="password" name="newpass2" value="" /></td>
		</tr>
	</table>
	 <div class="but">
<input type="submit" class="buttom" name="ok" value="Ok" />
<input type="reset" class="reset" name="huy" value="Hủy" />
</div>
</form>
	<? 
	if(isset($_POST["ok"]))
	{
	$user=$_POST["username"];
	$pass=md5($_POST["pass_old"]);
	$npass1=md5($_POST["newpass1"]);
	$npass2=md5($_POST["newpass2"]);
	 $sql="select * from nguoidung where Username='".$user."' and Password='".$pass."'";
	$query=mysql_query($sql);
	$count=mysql_num_rows($query);
	if($count>0)
	{
		if($npass1==$npass2)
		{
			$sql="UPDATE `nguoidung` SET  `Password` =  '".$npass2."' WHERE `Username` =  '".$user."'";
			mysql_query($sql);
			echo "đổi thành công";
			echo "<script>alert('Đổi Mật khẩu thành công!');</script>";
			echo"<script>document.location.href='?task=doimk' </script>";
		}//end if($npass1==$npass2)
		else{
			echo "<script>alert('Mật khẩu mới chưa trùng khớp!');</script>";
			echo"<script>document.location.href='?task=doimk' </script>";
		}
	}
	else{
	echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu!');</script>";
		echo"<script>document.location.href='?task=doimk' </script>";
	}
}
?>
</div>