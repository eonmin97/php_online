<div id='ARAP' class="w3-content" style="max-width:1100px;">
<!-- AR/AP-->

<div class="w3-row w3-padding-64"  style="max-width:1100px ;">
  <div style='padding:20px;'><h1>忆品串-Accounts AP/AR</h1>
<div style='padding:10px;border:1px solid black; width:600px;'>
<form method='post' action=''>
<table style="width:100%">
<caption><h5>AR/AP</h5></caption>
<tr>
    <td>
        Accounts Type ：
</td>
<td>
<select name='accountstype' onchange="accounttype(this.value)">
        <option value=''>Select a Type:</option>
        <option value='AP'>Accounts Payable</option>
        <option value='AR'>Accounts Receivable</option>
</select>
</td>
</tr>
<tr>
    <td >
        <span id='acctype'></span> Name ：
</td>
<td>
        <input type='text' name='companyname'/>
</td>
</tr>
<tr>
    <td>
        Payment Mode ：
</td>
<td>
<select name='paymentmode' >
        <option value=''>Select a Type:</option>
        <option value='bank'>Bank</option>
        <option value='cash'>Cash</option>
</select>
</td>
</tr>

<tr>
    <td>
    <span id='acctype1'></span> Amount：
</td>
<td>
        <input type='text' name='paidvalue'/>
</td>
</tr>

<tr>
    <td>
    Due Date ：
</td>
<td>
        <input type='date' name='duedate'/>
</td>

</tr>
<tr>
    <td>
    Discount Date :
</td>
<td>
        <input type='date' name='discountdate'/>
</td>

</tr>
<tr>
    <td>
    Discount Rate(%) ：
</td>
<td>
<select name='discountrate' >
        <option value=''>Select a Rate:</option>
        <option value='0.10'>10%</option>
        <option value='0.15'>15%</option>
</select>
</td>

</tr>
<tr>
    <td>
    Note.
</td>
<td>
        <input type='text' name='note'/>
</td>

</tr>
<td>
       <button>Submit</button>
</td>
</table>
</form>
</div>


</div></div>
</div>

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

?>