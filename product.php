
<div class="container">    
<div class="row">


   
<?php
require("bbqdata.php");

for ($i = 1; $i <= 2; $i++){
  if($i==1){
    echo"<div id='bbq' ><h1 style='color:white;'>燒烤 BBQ</h1></div><hr>";
  }else{
    
    echo"</div><div id='cool' ><h1 style='color:white;'>涼拌小菜 SIDE</h1></div><hr>";
  }
  
$sql="SELECT*FROM food  Where type=$i";
$result2=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result2)){

  echo"<div class='col-sm-3'  >";
  echo"<div class='panel panel-primary' >";
  echo"<div class='panel-heading' style='color:white ; background-color:black;'><h4>{$row['foodcn']}  {$row['fooden']}</h4></div>";
  echo"<div class='panel-body'><img src='logo/3.JPG' class='img-responsive' style='width:100%' alt='Image'></div>";
  echo"<div class='panel-footer'>RM {$row['price']}<br><button>BUY</button></div>";
  echo"</div>";
  echo"</div>";
}
}?>




  <div class="container">    
<div class="row">



</div><br><br><br><br>
  </div>

