<html>
<head><title>Online shoping</title>
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

<h1 align="center"  style="text-shadow:5px 5px 9px yellow; color:#FFFFFF; color:#FFFFFF">Added To Cart Products</h1>



<?php
include_once 'connt.php';
session_start();
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




echo "<pre>";
//print_r($_SESSION);

if(isset($_GET['id']))
{
 $id=$_GET['id'];
 unset($_SESSION['productcart'][$id]);
 unset($_SESSION['qtycart'][$id]);
}



if(isset($_SESSION['productcart']) &&  !empty($_SESSION['productcart']))
{
echo "<table border='0' align='center' width='600px' style='color:#FFFFCC;'>";
echo "<tr>
     <th>SrNo</th>
	 <th>Product Name</th>
	 <th>Price</th>
	 <th>Quantity</th>
	 <th>Image</th>
	 <th>Total Price</th>
      </tr>";


$i=0;
$subtotal=array();
$grandtotal=array();

foreach($_SESSION['productcart'] as $key =>$value )
{
 $i++;
$query="SELECT * FROM  `product` WHERE id='{$value}'";
         
  $data=mysqli_query($conn,$query);
$productdetails=mysqli_fetch_array($data);
$qty=$_SESSION['qtycart'][$key];

$subtotaltemp=$productdetails['price'] * $qty;

echo "<tr>";
echo "<td>$i</td>";
echo "<td>{$productdetails['productname']}</td>";
echo "<td>{$productdetails['price']}</td>";
echo "<td>{$qty}</td>";
echo " <td><img src='{$productdetails['image']}' height='200px' width='150px' /></td>";
echo "<td>{$subtotaltemp}</td>";
echo "<td><a href='?id=$key'>Remove</a></td>";

echo "</tr>";
$grandtotal[]=$subtotaltemp;
}

$finalsum=array_sum($grandtotal);
echo "<tr></tr><tr>
       <td></td>
	   <td></td>
	   <td></td>
	   <td></td><td>ToTal Price</td>
	   <td>$finalsum</td>
    </tr>";

echo "</table>";
echo "<h1 align='center'>Payment Option</h1><br/>";
echo "<h2 align='center'><a href='cashondilevary.php?finalsum=$finalsum'>CashOnDelivary</a>
        <br/> <a href='credit.php?finalsum=$finalsum'>Credit Card</a>
		 <br/><a href='debit.php?finalsum=$finalsum'>Debit Card</a></h2>";
echo "<a href='userhome.php'>Get a Product in Cart</a>";

}

else {
echo "<script type='text/javascript'>alert('Cart is Empty !! You Should Buy first Product!!')
               </script>";  
 echo "<script language='javascript' type='text/javascript'>location.href='userhome.php'
               </script>";
  
 }
?>



</body>
</html>
