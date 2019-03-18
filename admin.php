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
<h1 align="center" c style="text-shadow:5px 5px 9px yellow; color:#FFFFFF">Upload Product</h1> 
<center>
<div style="background:#001e2d; height:400px; width:500px; color:#FFFFFF">
 
 <br/>
 <form action="addproduct.php" method="POST"  enctype="multipart/form-data"  >
      <h4> Product Name:<br/>     
         <center><input type="text" size="40" maxlength="40" name="name" value="" /></center>
		     <br/><br/>
			 
     Images of Product:<br/><br/>
	  <center>
      <input type="file" name="uploadfile" value=""/> 
	   </center>
	  
	  <br/>
			 Description:<br/><center>
          <textarea name="desc" cols="40"></textarea> </center>
		    <br/>
	        Price:<br/>     
         <center><input type="text" size="40" maxlength="40" name="price" value="" /></center>
		     <br/>
	
        <center><input class="button" type="submit" value="Upload"
      name="submit" /></center>
    
   
   </form>
</div>


<div style="margin-left:30px; margin-right:30px;">

<?php 
$query="SELECT * FROM  `product` ";
         
  $data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

?>
<br/>
<table width="0px" height="300px"  border="4px" bordercolor="#FFFFFF" style="color:#FFFF99; font-size:17px;">

<tr bgcolor=#FFCCFF style="color:#000000;">
  <td>Id</td>
  <td>Product Name</td>
  <td>Image</td>
  <td>Description</td>
  <td>Price</td>
  <td>Delete</td>
<td>Edit</td>


</tr>
<?php while($result=mysqli_fetch_assoc($data))
   {
   echo "
   <tr style=color:#FFFF99>
  <td> ".$result['id']." </td>
  <td>  ".$result['productname']." </td>
  <td> <img src=". $result['image']." height='300px' width='300px' /> </td>
  <td> ".$result['description']." </td>
  <td> ".$result['price']." </td>
  
  <td><a href='editproduct.php?id=$result[id]&pname=$result[productname]&desc=$result[description]&price=$result[price]'>Edit</a></td>
<td><a href='deleteproduct.php?id=$result[id]' onclick='return checkdelete()'>Delete</a></td>


</tr>";
  }?>   
</table>

<script>
function checkdelete()
{
 return confirm('Are you sure you want to delete this users data???');
}

</script>
</div>
</body>
</html>
