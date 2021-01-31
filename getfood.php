
<!DOCTYPE html>
<html>
<head>

<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require("bbqdata.php");
$q = intval($_GET['q']);
if ($q==1){
echo "<h4>燒烤類 BBQ</h4>";
echo"<hr>";
$sql="SELECT*FROM food Where type=$q ";
$result=mysqli_query($link,$sql);
$no=1;
echo'<table>';
while($row=mysqli_fetch_assoc($result)){
  echo"<tr><td>".$no."</td>";
  echo"<td>{$row['foodcn']}</td>&nbsp";
  echo"<td>{$row['fooden']}</td>&nbsp";
  echo"<td>{$row['price']}</td></tr><br>";
  $no++;
}}else{
  echo "<h4>小菜 SIDE</h4>";
echo"<hr>";
$sql="SELECT*FROM food Where type=$q ";
$result=mysqli_query($link,$sql);
$no=1;
echo'<table>';
while($row=mysqli_fetch_assoc($result)){
  echo"<tr><td>".$no."</td>";
  echo"<td>{$row['foodcn']}</td>&nbsp";
  echo"<td>{$row['fooden']}</td>&nbsp";
  echo"<td>{$row['price']}</td></tr><br>";
  $no++;
}
}
echo'</table>';
?>
</body>
</html>