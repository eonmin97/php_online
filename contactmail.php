<?php 
$csname=$_GET['Name'];
$people=$_GET['People'];
$phone=$_GET['phone'];
$date=$_GET['date'];
$message=$_GET['Message'];
$email=$_GET['email'];

session_start();
$_SESSION['csname']=$csname;
$_SESSION['people']=$people;
$_SESSION['phone']=$phone;
$_SESSION['email']=$email;
$_SESSION['date']=$date;
$_SESSION['message']=$message;
require('..\PHPMailer-FE_v4.11\_lib\class.phpmailer.php');
require('..\PHPMailer-FE_v4.11\_lib\class.smtp.php');
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->Charset="UTF-8";
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";

$mail->Port = 465;
$mail->SMTPSecure='tls';
$mail->SMTPAuth = true; // turn on SMTP authentication
mb_internal_encoding('UTF-8');
//這幾行是必須的
$mail->Username ="cym.stylebbq@gmail.com";
$mail->Password = "xxxxxx";
$mail->FromName = "CYM STYLE BBQ ORDER";
// 寄件者名稱(你自己要顯示的名稱)
$webmaster_email ="xxx@gmail.com"; 
//回覆信件至此信箱


$email="email";
// 收件者信箱
$name="CYM";
// 收件者的名稱or暱稱
$mail->From = $webmaster_email;


$mail->AddAddress($email,$name);
$mail->AddReplyTo($webmaster_email,"Squall.f");
//這不用改

$mail->WordWrap = 50;
//每50行斷一次行

//$mail->AddAttachment("/XXX.rar");
// 附加檔案可以用這種語法(記得把上一行的//去掉)

$mail->IsHTML(true); // send as HTML
$mail->Subject = "=?UTF-8?B?".base64_encode("CYM Style BBQ 通知您，有新的訂單")."?="; 
// 信件標題




//$mail->Body = '您的顧客訂單'; 
//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
$mail->Body = '<h1>您的顧客訂單~~</h1></br>'.'<h3>名字：'.$csname.'<br>電話：'.$phone.'<br>人數:'.$people.'<br>日期:'.$date.'<br>備注:'.$message.'</h3>';
//$mail->AltBody = '訊息：'.$message; 
//$pdffile = $_SERVER['DOCUMENT_ROOT'] . "./ReturnLabel.pdf";
//$mail->addAttachment($pdffile);
//$mail->AddAttachment($pdffile, $name = 'test', $encoding = 'base64', $type = 'application/pdf');


$mail->AltBody = '訊息：'.$message;  
//信件內容(純文字版)
//$mail->AltBody = MsgHTML("信件內容");
//$mail->addStringAttachment(file_get_contents('http://localhost/bbq/logo/1.jpg'), 'myfile.jpg');
//$pdffile = $_SERVER['DOCUMENT_ROOT'] . "./ReturnLabel.pdf";
//$mail->AddAttachment('http://localhost/bbq/ReturnLabel.pdf', $name = 'Name_for_pdf',  $encoding = 'base64', $type = 'application/pdf');
//$mail->addAttachment($_SERVER['DOCUMENT_ROOT'].'/ReturnLabel.pdf' ,$name123 = 'Return',  $encoding = 'base64', $type = 'application/pdf');

if(!$mail->Send()){
echo "寄信發生錯誤：" . $mail->ErrorInfo;
//如果有錯誤會印出原因
}
else{ 
echo "預訂成功<br><br>";
//echo'<button onClick="openTab(this)" href="#" name="pdf.php">Download Pdf</button>';
}


?>

<html>
    <head>
        <script type="text/javascript">
            function openTab(th)
            {
                window.open(th.name,'_blank');
            }
        </script>
    </head>
    <body>
        
    </body>
</html>
