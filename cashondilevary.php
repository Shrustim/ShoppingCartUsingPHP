<?php
include_once 'connt.php';
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Payment Option Cash On Delivary</title>
<style type="text/css">
  body{
  margin:0;
  padding:0;
  background:black;
  font-family:sans-sarif;
  }</style>

</head>

<body>

<h1 align="center"  style="text-shadow:5px 5px 9px yellow; color:#FFFFFF; color:#FFFFFF">Payment Option CashOnDelivary</h1>

<?php
$sum=$_GET['finalsum'];
$email=$_SESSION['emailid'];
if($email==true)
{
}
else
 {
 echo "<script type='text/javascript'>alert('YOU ARE FIRST LOGIN PLEASE!!!!!!')
               </script>";  
 echo "<script language='javascript' type='text/javascript'>location.href='ulogin.php'
               </script>";
			  
}



$query1="SELECT * FROM customer WHERE email='$email'";
$data1=mysqli_query($conn,$query1);
$userdetails=mysqli_fetch_array($data1);
?>
<center>
<div style="color:#FFFF99; background-color:#003333; width:600px; height:400px;" align="center">
<br/><br/><br/>
<form action="cashondilevary2.php" method="post">
<input type="hidden" name="fname" value="<?php echo $userdetails['fname'];?>" />
<input type="hidden" name="lname" value="<?php echo $userdetails['lname'];?>" />
<input type="hidden" name="add" value="<?php echo $userdetails['add'];?>"  />
<input type="hidden" name="email" value="<?php echo $userdetails['email'];?>" />
<input type="hidden" name="mobileno" value="<?php echo $userdetails['mobileno'];?>" />
Products Name & Quantity: <input type="text" name="productnmandqty" value="
<?php

foreach($_SESSION['productcart'] as $key =>$value )
{

$query="SELECT * FROM  `product` WHERE id='{$value}'";
         
  $data=mysqli_query($conn,$query);
$productdetails=mysqli_fetch_array($data);
$qty=$_SESSION['qtycart'][$key];

$subtotaltemp=$productdetails['price'] * $qty;



echo "{$productdetails['productname']}";
echo "{$qty}";


}


?> "/>
<br/><br/>
Total Amount:<input type="text" name="sum" value="<?php echo $sum;  ?>" /><br/><br/>
Adhar No:<input type="text" size="40" maxlength="16" name="adharno" value="" /><br/><br/>
Pincode:<input type="text" size="40" maxlength="50" name="pincode" value=""  /><br/><br/>
<input type="hidden" name="currentdate" value="<?php echo date("Y-m-d");?>" /><br/><br/>
<input class="button" type="submit" value="BUY"
      name="buy" />
</form>
</div>
</center>
</body>
</html>
