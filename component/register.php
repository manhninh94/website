<script>
  $(document).ready(function(){
        $('#submit').click(function(){
		var fullname=$('.fullname').val();
		var address=$('.address').val();
		var email=$('.email').val();
		var phone=$('.phone').val();
		if(fullname== '' || address== ''|| email== '' || phone== '') 
		{
			alert('Bạn chưa nhập đầy đủ nội dung!');
			return false;
		}
	 
		
	});
});
</script>
<div class="NewItem">
    	
            <div class="ListNewItem">
			<h3 class="title">Đăng ký tài khoản</h3>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8 /">
	<style type="text/css">
		.register-form {
	border:1px solid #eee;
	width:555px;
	margin:15px  auto
		}


		.hint {
			color: red;
			font-family: Arial; 
			
		}

		.clear {
			clear: both;
		}

		.submit_button {
			background-color: #ccc; 
			width: 130px;
			height: 30px;
			font-weight: bold;
		}

		.title-form h4 {
			color: #333;
			font-family: Arial;
			padding: 0 10px; 
		}

		.tbl-form table {
			float: left;
		}



		.tbl-form .info-form {
			width: 290px;
			float: left;
		}


		.wrapper-form {
			
		}

		.hr{
			width: 530px; 
			text-align: left;
			margin-left: 10px;
background:#eee;
border-top:1px solid #eee;
margin-bottom:10px

		}

		.month {
			width: 150px; 
		}

		.city {
			width: 300px; 
		}

		#registerFrm {

		}

		.code_phone {
			width: 300px; 		
		}

		.right {
			text-align: right; 
			width: 150px;
		}



		.tbl-form table td {
			padding: 0 5px;
		}
table.tbl_register tr{
height:35px;
padding-right:15px
}
input, select{
border:1px solid #ccc;
height:25px
}

	</style>
	<script type="text/javascript">


		window.onload = function() {
			// body...

			var selectCity = document.registerFrm.city; 
			for(index in jsonCity) {
				selectCity.options[selectCity.options.length] = new Option(index, jsonCity[index]); 
			}
			document.registerFrm.city.onchange = function () {
				// body...
				var postal_code = document.registerFrm.postal_code;
				postal_code.value = selectCity.options[selectCity.selectedIndex].value; 
			}

			var selectCountry = document.registerFrm.code_phone; 
			for(index in jsonCountry) {
				selectCountry.options[selectCountry.options.length] = new Option(index, jsonCountry[index]);
			}
		}


		
		var jsonCity = {
			"Tp.HCM": 8, "An Giang": 76, "Bạc Liêu": 781, "Bà Rịa - Vũng Tàu": 64, "Bắc Cạn": 281, "Hà Nội": 4, 
			"Bắc Giang": 240, "Bắc Ninh": 241, "Bến Tre": 75, "Bình Dương": 650, "Bình Định": 56, "Bình Phước": 651, 
			"Bình Thuận": 62, "Cao Bằng": 26, "Cà Mau": 780, "Cần Thơ": 71, "Đà Nẵng": 511, "Nam Định": 350, "Nghệ An": 38, 
			"Ninh Bình": 30, "Hà Tây": 34, "Hà Tĩnh": 39, "Hải Phòng": 31, "Hưng Yên": 321
		}; 


		var jsonCountry =  {
			"USA (+1)": 1, "Việt Nam (+84)":  84, "United Kingdom (+44)": 44, "Russia (+7)": 7, "Qatar (+974)": 974, "Poland (+48)": 48, 
			"Thailand (+66)": 66, "Singapore (+65)": 65 
		}; 

		


		function isEmail(str) {
			var pattern = /^[0-9A-Za-z]+[0-9A-Za-z_]*@[\w\d.]+.\w{2,4}$/; 
			return pattern.test(str); 

		}

		function isNickname(str) {
			var pattern = /^[A-Za-z0-9_.]+$/;
			return pattern.test(str); 
		}


		


		function checkPassword () {
			// body...
			document.getElementById('password').innerHTML = "Mật khẩu đăng nhập phải > 5 ký tự";
		}


		function checkNickname () {
			// body...
			//alert("1234"); 
			var nickname = document.getElementById('nickname');
			nickname.innerHTML = "Tài khoản đăng nhập của bạn."; 

			//nickname.innerHTML += "1234";
		}

		function checkrePassword () {
			// body...
			var password = document.registerFrm.password; 
			var repass = document.registerFrm.repassword;
			if(password.value != repass.value) {
				document.getElementById("repass").innerHTML = "Mật khẩu không trùng khớp. Vui lòng nhập lại";
			}  else
				document.getElementById("repass").innerHTML = "";
		}

		function clearPassword () {
			// body...

			var password = document.registerFrm.password; 
			if(password.value.length < 5) {
				document.getElementById('password').innerHTML = "Mật khẩu nhập vào phải có ít nhất 5 ký tự. Mời nhập lại"; 
			} else 
				document.getElementById('password').innerHTML = "";
		}

		function clearNickname() {
			var nicknameValue = document.registerFrm.nickname; 
			/*alert(isNickname(nicknameValue.value));
			document.getElementById('nickname').innerHTML = ""; */
			if(isNickname(nicknameValue.value)) {
				document.getElementById('nickname').innerHTML = ""; 
			}else {
				document.getElementById('nickname').innerHTML = "Nickname không hợp lệ, mời nhập lại";

			}
		}

		function checkEmail() {
			var emailValue = document.registerFrm.email; 
			if(!isEmail(emailValue.value)) {
				document.getElementById('email').innerHTML = "Email không hợp lệ. Vui lòng nhập lại"; 
			} else
				document.getElementById('email').innerHTML = "Email hợp lệ"; 
		}


		function checkInput () {
			// body...
			var firstname = document.registerFrm.first_name; 
			var lastname = document.registerFrm.last_name; 
			var nickname = document.registerFrm.nickname;
			var password = document.registerFrm.password; 
			var repassword = document.registerFrm.repassword; 
			var date = document.registerFrm.date; 
			var month = document.registerFrm.month; 
			var year = document.registerFrm.year; 
			var gender = document.registerFrm.gender; 
			var city = document.registerFrm.city; 
			var code_phone = document.registerFrm.code_phone; 
			var phone = document.registerFrm.phone; 
			var email = document.registerFrm.email; 
			if(firstname.value == "" || lastname.value == "") {
				alert("First name và last name không được để trống");
				return false;  
			}
			if(nickname.value == "") {
				alert("Tên đăng nhập không được để trống");
				return false; 
			}
			if(!isNickname(nickname.value) ) {
				alert("Tên đăng nhập không hợp lệ");
				return false;  
			}

			if(password.value == "" || repassword.value == "") {
				alert("Mật khẩu không được để trống");
				return false;  
			} 
			
			if(password.value.length < 5 || repassword.value.length < 5) {
				alert("Mật khẩu phải nhiều hơn 5 ký tự"); 
				return false;
			}

			if(password.value != repassword.value) {
				alert("Mật khẩu không trùng nhau");
				return false;  
			}

			if(date.value == "" || month.value == "" || year.value == "" || month.value == -1) {
				alert("Ngày tháng năm không hợp lệ");
				return false;  
			}

			if(gender.value == "" || gender.value == -1) {
				alert("Lựa chọn giới tính không hợp lệ. Vui lòng chọn lại.");
				return false;  
			}
			if(city.value == "" || city.value == -1){
				alert("Lựa chọn thành phố không hợp lệ. Vui lòng chọn lại."); 
				return false; 
			}

			if(code_phone.value == "" || phone.value == "") {
				alert("Số điện thoại không hợp lệ");
				return false;
			}

			if(email.value == "" || !isEmail(email.value)) {
				alert("Email không hợp lệ");
				return false; 
			}


			alert("Đăng nhập thành công"); 

			
		}

	</script>

	<title>Register form</title>
</head>
<div class="bor_chuyenmuc">
<div class="box_register">
	<div class="register-form">
		<form method="POST" name="registerFrm" action="" id="registerFrm" onsubmit="return checkInput();">
			<div class="wrapper-form">
				<div class="title-form">
					<h4>Thông tin tài khoản</h4>
				</div>
				<div class="hr"></div>
				
					<table class="tbl_register" border=0 cellspacing="0" cellpadding="0">
						<tr>
							<td class="right">Tên tôi là</td>
							<td>
								<input type="text" class='fullname' name="last_name" placeholder="Họ và tên" size="46" />
							</td>
						</tr>
						<tr>
							<td class="right">Nickname </td>
							<td><input type="text" placeholder="Tài khoản đăng nhập" name="nickname" size="15" onfocus="checkNickname();" onblur="clearNickname(); " /> <div id="nickname" class="hint"></div> </td>
						</tr>
						<tr>
						
							<td class="right">Chọn mật khẩu </td>
							<td>
								<input type="password" name="password" size="46" onfocus="checkPassword();" onblur="clearPassword();" /> <div id="password" class="hint"></div>
							</td>
						</tr>
						<tr>
							<td class="right"> Nhập lại mật khẩu </td>
							<td>
								<input type="password" name="repassword" size="46" onblur="checkrePassword(); " /><div id="repass" class="hint"></div>
							</td>
						</tr>
					</table>
	
			</div>

			<div class="wrapper-form">
				<div class="title-form">
					<h4>Thông tin chi tiết để phục vụ bạn tốt hơn</h4>
				</div>
				<div class="hr"></div>
				
					<table class="tbl_register" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="right">Tôi sinh vào</td>
							<td>
								<input type="text" name="date" placeholder="Ngày" size="7" />
								<select name="month" class="month">
									<option value="-1" size="30"> Chọn tháng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
								<input type="text" name="year" placeholder="Năm" size="7" />
							</td>
						</tr>
						<tr>
							<td class="right">Giới tính</td>
							<td>
								<select name="gender">
									<option value="-1">Chọn một</option>
									<option value="0">Nam</option>
									<option value="1">Nữ</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="right">Địa chỉ</td>
							<td>
								<input type="thanhpho" class="address" name="thanhpho" size="46" /><div id="repass" class="hint">
							</td>
						</tr>
						<tr>
							<td class="right">Email</td>
							<td>
								<input type="text" class="email" name="email" placeholder="" size="46" />
							</td>
						</tr>
						<tr>
							<td class="right">Phone</td>
							<td>
								<input type="text" class="phone" name="phone" placeholder="" size="46" />
							</td>
						</tr>
					</table>
		
					<div class="info-form">
					</div>
					<div class="clear">&nbsp; </div>
				</div>
			</div>
			<div class="submit-form">
				<div class="tbl-form">
					<table class="tbl_register" cellspacing='0' cellpadding='0' border='0'>
						<tr>
							<td class="right"> &nbsp; </td>
							<td>
								<input type="submit" value="Tạo tài khoản" name="submit" class="submit_button" id="submit"/> 
							</td>
						</tr>
					</table>
				</div>
				
			</div>
		</form>
		
		</div>
	</div>

<?
 if(isset($_POST["submit"]))
 {
 $last_name=$_POST["last_name"];
 $nickname=$_POST["nickname"];
$password=$_POST["password"];
$date=$_POST["date"];
$month=$_POST["month"];
$year=$_POST["year"];
$gender=$_POST["gender"];
$thanhpho=$_POST["thanhpho"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$pass=md5($password);
$sql="INSERT INTO `user` (`Id`, `Hoten`, `Diachi`, `Email`, `Username`, `Password`, `Phone`) VALUES ('','$last_name','$thanhpho','$email','$nickname','$pass','$phone')";
mysql_query($sql);
//echo $sql;
echo"<script>alert('Đăng ký thành viên thành công!')</script>";
echo"<script>document.location.href='?com=home' </script>";
 }?>
</div>
</div>
