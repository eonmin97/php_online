<?php
session_start();
require("bbqdata.php");
if(isset($_POST['user'])){
$user=$_POST['user'];
$password=$_POST['password'];
$result=mysqli_query($link,"SELECT * FROM clientac where client_email='$user'");
$row=mysqli_fetch_array($result);
if(@$row['client_email'] ==$user && @$row['client_password'] == $password){
    $_SESSION['client']=$row['client_email'];
    $_SESSION['name']=$row['client_name'];
    $_SESSION['fbid']=$row['client_fbid'];
    header("location:clientid.php");
}else{
    echo"<script>alert('賬號或密碼錯誤! ')</script>";
    //echo "<script>documentgetElementByID('td').html(<input type='password'><font>密碼錯誤!</font>)</script>";
}
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>忆品串-小館 Member Login</title>
    <style>
        body{
            background-color: azure;
        }
        .loginbox{
            border:2px solid black;
            padding:10px;
            width: 300px;
            background-color: beige;
        }
        .loginbutton:hover{
            color:green;
        }
    </style>


    </head>
        <body>
            <button style='color:black' onclick="window.location='index.html'">Home Page</button><h2>會員登錄系統</h2>
            <hr>
    <div class='loginbox'>
            <form method='post' action=''>
            <p>Email : <input type='text' name='user'></p>
            <p>Password:<input type='password' name='password'></p>
        <p><button class='loginbutton'>Login</button></p></form>
    <h1 >OR</h1>
<?php
require_once('./facebooklogin.php');?>
    </div>
        </body>
</html>

