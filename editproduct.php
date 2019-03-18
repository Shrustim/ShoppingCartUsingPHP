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
<h1 align="center" c style="text-shadow:5px 5px 9px yellow; color:#FFFFFF">Upload Product</h1> 
<center>
<div style="background:#001e2d; height:400px; width:500px; color:#FFFFFF">
 
 <br/>
 <form action="" method="POST"  enctype="multipart/form-data"  >
      <h4> Product Name:<br/>     
         <center><input type="text" size="40" maxlength="40" name="name" value="<?php echo $_GET['pname']; ?>" /></center>
		     <br/><br/>
			 
	  
	  <br/>
			 Description:<br/><center>
          <textarea name="desc" cols="40"><?php echo $_GET['desc']; ?></textarea> </center>
		    <br/>
	        Price:<br/>     
         <center><input type="text" size="40" maxlength="40" name="price" value="<?php echo $_GET['price']; ?>" /></center>
		     <br/>
	
        <center><input class="button" type="submit" value="Upload"
      name="submit" /></center>
    </h4>
   
   </form>
</div>
</center>
</body>
</html>

<?php
$id=$_GET['id'];

if(isset($_POST['submit']))
{
       
           $name=($_POST['name'] ); 
		   $price=($_POST['price'] ); 
           $desc=($_POST['desc'] ); 
         
           
		   
          if(!empty($name) && !empty($price) && !empty($desc) )
		  {
		    
			   if(strlen($name)<4)
                {   //basic name validation
                   $error=true;
                        echo "<script type='text/javascript'>alert('Product name must have atlaest 4 characters!')
                       </script>";

                        echo "<script language='javascript' type='text/javascript'>location.href='admin.php'
                         </script>";
                 }
              
			       
                 //price validation
                    if(!preg_match("/^[0-9]+$/",$price))
                 {  
                     $error=true;
                     echo "<script type='text/javascript'>alert('price must contain numbers!')
                    </script>";

                     echo "<script language='javascript' type='text/javascript'>location.href='admin.php'
                   </script>";
                  }
           
		    
                      if(!$error)
         {

        
              $query="UPDATE `product` SET productname='$name',description='$desc',price='$price' WHERE id='$id'";





                      if($is_query_run=mysqli_query($conn,$query))
                       {  //Insert into database Query
                          // echo " query executed";
                         echo "<script type='text/javascript'>alert('UPDATE PRODUCT WAS DONE SEUCCESFULLY!')
                         </script>";

                         
                echo "<script language='javascript' type='text/javascript'>location.href='admin.php'
               </script>";


                        }
                    
            


             
                }


		  }		   
		   
		   
}     

?>
