<html>
<head>
    <meta charset="UTF-8">
    <title>忆品串-小館 Admin Login</title>
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
    <head>
        <body>
            <button style='color:black' onclick="window.location='index.html'">Home Page</button><h2>管理員登錄系統</h2>
            <hr>
    <div class='loginbox'>
            <form method='post' action=''>
            <p>User : <input type='text' name='user'></p>
            <p>Password:<input type='password' name='password'></p>
        <p><button class='loginbutton'>Login</button></p></form>
    
    </div>
        </body>
</html>
<?php

session_start();
require("bbqdata.php");
if(isset($_POST['user'])){
$user=$_POST['user'];
$password=$_POST['password'];
$result=mysqli_query($link,"SELECT * FROM user where username='$user'");
$row=mysqli_fetch_array($result);
if(@$row['username'] ==$user && @$row['password'] == $password){
    $_SESSION['admin']=$row['username'];
    header("location:adminid.php");
}else{
    echo"<script>alert('賬號或密碼錯誤! ')</script>";
    //echo "<script>documentgetElementByID('td').html(<input type='password'><font>密碼錯誤!</font>)</script>";
}
}
?>