<?php
  session_start();
include_once 'connt.php';
$name=$_SESSION['name'];
if($name==true)
{
#echo '<font color="#FFFFFF">'."Welcome".$useremail.'</font>';
}
else
 {
 echo "<script type='text/javascript'>alert('YOU ARE FIRST LOGIN PLEASE!!!!!!')
               </script>";  
 echo "<script language='javascript' type='text/javascript'>location.href='adminlogin.php'
               </script>";
			  
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Online Shoping</title>

<style type="text/css">
  body{
  margin:0;
  padding:0;
  background:black;
  font-family:sans-sarif;
  }</style>
</head>

<body>

<h1 align="center" style="color:#CCFF99">Online Shoping</h1>
<div style="background-color:#FFFFFF; height:60px; font-size:30px; padding-left:20px;  ">
<a href="admin.php" style="color:#000000">Home</a>
<a href="viewusers.php" style="margin-left:20px;color:#000000">View Customer</a>
<a href="vieworders.php" style="margin-left:20px;color:#000000">View Orders</a>
<a href="logout.php"style="margin-left:20px;color:#000000">Logout</a>
</div>
<h1 align="center"  style="text-shadow:5px 5px 9px yellow; color:#FFFFFF"> View Orders by Using Credit/Debit Card</h1> 
<h2 style=" color:#FFFFCC; float:right; " ><a href="view_cashondilever.php" >Orders of CashOnDelivary</a></h2>

<div style="margin-left:30px; margin-right:30px;">

<?php 
$query="SELECT * FROM  `creditorders` ";
         
  $data=mysqli_query($conn,$query);

$query1="SELECT * FROM  `debitorders` ";
         
  $data1=mysqli_query($conn,$query1);


?>
<br/>
<table width="0px" height="300px"  border="4px" bordercolor="#FFFFFF" style="color:#FFFF99; font-size:17px;">

<tr bgcolor=#FFCCFF style="color:#000000;">
  <td>first Name</td>
  <td>Last Name</td>
  <td>Address</td>
  <td>Email Id</td>
  <td>Mobile No</td>
  <td> Products Name and Quantity</td>
  <td> Total Amount </td>
  <td>Buying Date</td>
  <td>Delete</td>



</tr>
<?php while($result=mysqli_fetch_assoc($data))
   {
    $result['id'];
   echo "
   <tr style=color:#FFFF99>
  <td> ".$result['fname']." </td>
  <td>  ".$result['lname']." </td>
  <td>  ".$result['add']." </td>
  <td> ".$result['email']." </td>
  <td>  ".$result['mobileno']." </td>
  <td>  ".$result['productnmqty']." </td>
  <td> ".$result['sum']." </td>
  <td> ".$result['currentdate']." </td>
  
 
<td><a href='delordercedit.php?id=$result[id]' onclick='return checkdelete()'>Delete</a></td>


</tr>";
  }?> 
  
<?php while($result1=mysqli_fetch_assoc($data1))
   {
    $result1['id'];
   echo "
   <tr style=color:#FFFF99>
  <td> ".$result1['fname']." </td>
  <td>  ".$result1['lname']." </td>
  <td>  ".$result1['add']." </td>
  <td> ".$result1['email']." </td>
  <td>  ".$result1['mobileno']." </td>
  <td>  ".$result1['productnmqty']." </td>
  <td> ".$result1['sum']." </td>
  <td> ".$result1['currentdate']." </td>
  
 
<td><a href='delorderdebit.php?id=$result1[id]' onclick='return checkdelete()'>Delete</a></td>


</tr>";
  }?>   
    
</table>

<script>
function checkdelete()
{
 return confirm('Are you sure you want to delete this users data???');
}

</script>


</body>
</html>