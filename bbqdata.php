<?php
//require("bbqdata.php");
$servername = "port";
$uname = "username";
$pass = "pass";
$link=new mysqli($servername, $uname, $pass);
mysqli_select_db($link,'bbq');        
mysqli_query($link,"SET NAMES'utf8'");
?>