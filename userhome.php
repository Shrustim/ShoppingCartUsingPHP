<?php
  session_start();
include_once 'connt.php';
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>online Shoping of Mobiles</title>
<style type="text/css">
  body{
  margin:0;
  padding:0;
  background:black;
  font-family:sans-sarif;
  }</style>

</head>

<body>
<h1 align="center" style="color:#CCFF99">Online Shoping of Mobiles</h1>
<div style="background-color:#FFFFFF; height:60px; font-size:30px; padding-left:20px;  ">
<a href="userhome.php" style="color:#000000">Home</a>
<a href="viewcart.php" style="margin-left:20px;color:#000000">Add To Cart</a>
<a href="viewuserorders.php" style="margin-left:20px;color:#000000">View Orders</a>
<a href="logout.php"style="margin-left:20px;color:#000000">Logout</a>
</div>

<h1 align="center"  style="text-shadow:5px 5px 9px yellow; color:#FFFFFF; color:#FFFFFF">Products</h1>

<br/> 
<?php 
$query="SELECT * FROM  `product` ";
         
  $data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

?>
<?php while($result=mysqli_fetch_assoc($data))
   {
   $result['id'];
   echo "<center>
   <div style='background:#001e2d; height:400px; width:300px; color:#FFFFFF;float:left;margin:50px;font-size:24px;padding:20px;'> 
    Product Name:".$result['productname']." <br/><br/>
   <img src=". $result['image']." height='300px' width='260px' /> 
  <br/>
 Price:  ".$result['price']."
  <br/>
  <a href='displayproduct.php?id=$result[id]'>Details</a> 
  </div> </center>  ";
  }?>
   

</body>
</html>
