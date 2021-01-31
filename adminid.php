<?php
session_start();
if(!$_SESSION['admin']){
    header("location:admin.php");
}
?>


<!DOCTYPE html>
<html>
<title>忆品串燒烤online</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

body{
            background-color: azure;
        }


table, th,td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}

#changemenu{
  border: 5px solid black;
  width:340px;
  border-collapse: collapse;
  display:none;}

#ARAP{
  display:none;
}

</style>
<script>
  function show_ARAP(){
    var bodydoc= document.getElementById("bodydoc");
    var ARAPdoc= document.getElementById("ARAP");
    var menubtn= document.getElementById("bodymenu");
    var menubtn2= document.getElementById("bodymenu2");
    if(bodydoc.style.display=="none"){
      bodydoc.style.display="block";
      menubtn.style.display="block";
      menubtn2.style.display="block";
      ARAPdoc.style.display="none";
      document.getElementById("arapmenu").innerHTML="Accounts AR/AP";
      }
    else{
      menubtn.style.display="none";
      menubtn2.style.display="none";
      bodydoc.style.display="none";
      ARAPdoc.style.display="block";
      document.getElementById("arapmenu").innerHTML="新增產品";
    }  
  }


  function changemenu(){
    var changeclose= document.getElementById("changeclose");
    var changemenu= document.getElementById("changemenu");

    if(changemenu.style.display=="block"){
    changemenu.style.display="none";
    changeclose.innerHTML="菜單更改";}
    else{
        changemenu.style.display="block";
        changeclose.innerHTML="關閉(X)";
    }
  
  }

  

    function showfood(str) {
  if (str=="") 
  {
    document.getElementById("txtfood").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtfood").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getfood.php?q="+str,true);
  xmlhttp.send();

}


     function openTab(th)
            {
                window.open(th.name,'_blank');
            }



    function clicked() {
       if (confirm('Do you want to submit?')) {
           yourformelement.submit();
       } else {
           return false;
       }
    }

    function accounttype(str){
      if (str=="AR"){
        document.getElementById("acctype").innerHTML="Customer Company";
        document.getElementById("acctype1").innerHTML="Accounts Receivable ";
        
      }else{
        document.getElementById("acctype").innerHTML="Supplier Company";
        document.getElementById("acctype1").innerHTML="Accounts Payable";
        
      }

    }
</script>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top" >
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;" >
    <a href="#home" class="w3-bar-item w3-button">忆品串-小館 </a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a  onclick='show_ARAP(); 'id='arapmenu' class="w3-bar-item w3-button">Accounts AP/AR</a>
      <a href="#about" id='bodymenu' class="w3-bar-item w3-button">新增產品</a>
      <a href="#menu"  id='bodymenu2' class="w3-bar-item w3-button">Menu</a>
      <a href="session_destroy.php" class="w3-bar-item w3-button">Log Out</a>
    </div>
  </div>
</div>
</header>
<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
<br><br>


<?php require_once('aparaddin.php')?>
<!-- Page content -->
<div id='bodydoc' class="w3-content" style="max-width:1100px;">
<!-- AR/AP-->

<div class="w3-row w3-padding-64" id="ARAP" style="max-width:1100px ;">
  <div style='padding:20px;'><h1>忆品串-食品</h1>
<div style='padding:10px;border:1px solid black; width:600px;'>
<form method='post' action=''>
<table style="width:100%">
<caption><h5>新增食品</h5></caption>
<tr>
    <td>
        食品種類：
</td>
<td>
<select name='foodtype'>
        <option value=''>Select a food:</option>
        <option value='1'>BBQ 燒烤</option>
        <option value='2'>SIDE 小菜</option>
</select>
</td>
</tr>
<tr>
    <td>
        食品名稱：
</td>
<td>
        <input type='text' name='foodname'/>
</td>
</tr>
<tr>
    <td>
        食品名稱(英文)：
</td>
<td>
        <input type='text' name='foodenname'/>
</td>
</tr>
<tr>
    <td>
        食品價格(RM)：
</td>
<td>
        <input type='text' name='price'/>
</td>
<td>
       <button>Add</button>
</td>
</tr>
</table>
</form>
</div>


</div></div>

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
  <div style='padding:20px;'><h1>忆品串-食品</h1>
<div style='padding:10px;border:1px solid black; width:600px;'>
<form method='post' action=''>
<table style="width:100%">
<caption><h5>新增食品</h5></caption>
<tr>
    <td>
        食品種類：
</td>
<td>
<select name='foodtype'>
        <option value=''>Select a food:</option>
        <option value='1'>BBQ 燒烤</option>
        <option value='2'>SIDE 小菜</option>
</select>
</td>
</tr>
<tr>
    <td>
        食品名稱：
</td>
<td>
        <input type='text' name='foodname'/>
</td>
</tr>
<tr>
    <td>
        食品名稱(英文)：
</td>
<td>
        <input type='text' name='foodenname'/>
</td>
</tr>
<tr>
    <td>
        食品價格(RM)：
</td>
<td>
        <input type='text' name='price'/>
</td>
<td>
       <button>Add</button>
</td>
</tr>
</table>
</form>
</div>


</div>

    <h5>&nbsp;&nbsp;&nbsp;所有菜單--><button onClick="openTab(this)" href="#" name="pdf.php">PDF</button></h5>
    
  </div>
<?php
require("bbqdata.php");
echo"<hr>";
echo "<button onclick='changemenu();'><h4><div id='changeclose'>菜單更改</div></h4></button>";
$i=1;
echo"<table id='changemenu' class='changemenu'>";
while($i<=2){
$sql="SELECT*FROM food Where type=$i ";
$result=mysqli_query($link,$sql);
$no=1;

while($row=mysqli_fetch_assoc($result)){
  echo"<tr><td>".$no."</td>";
  echo"<td>{$row['foodcn']}</td>&nbsp";
  echo"<td>{$row['fooden']}</td>&nbsp";
  echo"<td>{$row['price']}</td><br>";

  echo"<td><form method='post' onsubmit='return clicked()' action=''>";
  echo "<input name='deleteid' type='hidden' value='{$row['id']}'/>";
  echo "<input type='submit'  value='Delete'/>";
  echo "</form></td></tr>";
  $no++;
}

$i++;

}
echo'</table>';


  ?>
  <hr>
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">忆品串-小館 菜單 Menu</h1><br>
      <form><select name='food' onchange='showfood(this.value)'>
        <option value=''>Select a food:</option>
        <option value='1'>BBQ 燒烤</option>
        <option value='2'>SIDE 小菜</option>
        </select>
        </form>
      <div id="txtfood"><b></b></div>
         
    </div>
    
  </div>

  <hr>


</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by 忆品串-小館</p>
</footer>

</body>
</html>

<?php
if(isset($_POST['foodname'])){
  require("bbqdata.php"); 
  $foodtype=$_POST['foodtype'];
  $foodname=$_POST['foodname'];
  $foodenname=$_POST['foodenname'];
  $price=$_POST['price'];
  $fdn=mysqli_query($link,"SELECT * FROM food where foodcn='$foodname'");
  $row=mysqli_fetch_array($fdn);
if(@$row['foodcn'] ==$foodname){
  echo"<script>alert('已經有該產品了！ ')</script>";
}else{
  $sql="INSERT INTO food VALUE ('','$foodtype','$foodname','$foodenname','$price')";
  $result = mysqli_query($link,$sql);
  if($result){
    echo"<script>alert('新增產品成功！')</script>";
  }else{
    echo"<script>alert('新增產品失敗！')</script>";
  }

}
}

if(isset($_POST['deleteid'])){
  $deleteid=$_POST['deleteid'];
  require("bbqdata.php"); 
  $result=mysqli_query($link,"DELETE FROM food WHERE id='$deleteid'") or die("刪除失敗");
  echo"<script>alert('產品刪除成功！');</script>";
}
?>