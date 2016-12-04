<?php 
require_once('PHPMailer/class.phpmailer.php');  
 if(isset($_POST["sendmail"]))
{
$mail             = new PHPMailer();

$body             = $_POST["detail"];
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "bestkitchen.107@gmail.com";  // GMAIL username
$mail->Password   = "";            // GMAIL password

$mail->SetFrom('xuanhuan2812@gmail.com', 'Do Huan');
$mail->SetFrom('xuanhuan2812@gmail.com', 'Do Huan');

$mail->Subject    = $_POST["subject"];

$mail->AltBody    = $_POST["detail"];

$mail->MsgHTML($body);

$address = "bestkitchen.107@gmail.com";
$mail->AddAddress($address, "Chien Phan");

//$mail->AddAttachment("component/images/phpmailer.gif");      // attachment
//$mail->AddAttachment("component/images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
?>
<h3 style="font-weight:bold; color:#333;font-size:14px">Gửi mail thành công. Cám ơn quý khách đã sử dụng dịch vụ của chúng tôi ! </h3>
<?php 
}
}
?>