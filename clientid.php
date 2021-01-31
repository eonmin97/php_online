
<?php
session_start();

if (isset($_GET['id'])) { 
require_once("bbqdata.php");
$client_fbid=$_GET['id'];
$client_name=$_GET['name'];
$client_email=$_GET['email'];
$client_password=$_GET['id'];
$_SESSION['client']=$_GET['email'];
$_SESSION['name']=$_GET['name'];
$_SESSION['fbid']=$_GET['id'];
$_SESSION['timelogin']=1; 
$result=mysqli_query($link,"SELECT * FROM clientac where client_fbid='$client_fbid'");
if($result){
$row=mysqli_fetch_array($result);
if(@$row['client_fbid'] ==$client_fbid && $row['client_email'] ==$client_email) {
    //$_SESSION['username']=$username;
    //$_SESSION['password']=$password;
    //$_SESSION['email']=$row['email'];
    //header("location:index.php");
}else{
    $sql="INSERT INTO clientac VALUES ('','$client_fbid','$client_name','$client_email','$client_password')";
    $result1 = mysqli_query($link,$sql);
    if($result1){
        echo"<script>alert('新增成功！')</script>";
      }else{
        echo"<script>alert('新增失敗！')</script>";
      }
    //header("refresh:0;url=login.html");
    //echo "<script>documentgetElementByID('td').html(<input type='password'><font>密碼錯誤!</font>)</script>";
}
}
}else{
  $client_email=$_SESSION['client'];
  require_once("bbqdata.php");
  $result=mysqli_query($link,"SELECT * FROM clientac where client_email='$client_email'");
if($result){
$row=mysqli_fetch_array($result);
if(@$row['client_email'] ==$client_email) {
  $client_fbid=$row['client_fbid'];
  $client_name=$row['client_name'];
  $_SESSION['fbid']=$client_fbid;
  $_SESSION['name']=$client_name;

}

}}

if(!$_SESSION['client']){
    header("location:client.php");
}

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>忆品串-小館</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
            
            function audiomp3(){
            document.getElementById("audiomp3").innerHTML="<audio controls autoplay style='display:none'><source src='/bbq/mp3/order.mp3' type='audio/mp3'></audio>";
            }
              
            </script>
  <style>  
   body {
  height: 150%;
  width:100%;
  background-image: linear-gradient(yellow,red,black);

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}  
      .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: black;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">忆品串-小館</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
      </ul>

      <form class="navbar-form navbar-left" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>



      <ul class="nav navbar-nav navbar-right">
        <li><a href="clientaccount.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <li><a data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
if ($_SESSION['timelogin']==1){
  echo"<span id='audiomp3'  onclick='audiomp3()' style='color:red;'><b><h1>開始下單</h1></b></span>";
  $_SESSION['timelogin']=$_SESSION['timelogin']+1;
}
?>
  
<?php require_once('product.php') ?>

 


<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					模态框（Modal）标题
				</h4>
			</div>
			<div class="modal-body">
				点击关闭按钮检查事件功能。
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					关闭
				</button>
				<button type="button" class="btn btn-primary">
					提交更改
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
   $(function () { $('#myModal').modal('hide')});
</script>

<footer class="container-fluid text-center">
  <p>忆品串燒烤 Online</p>
</footer>

</body>
</html>

