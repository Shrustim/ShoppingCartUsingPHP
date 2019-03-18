<?php
include_once 'connt.php';
session_start();

if(isset($_POST['buy']))
{
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $add=$_POST['add'];
 $email=$_POST['email'];
 $mobileno=$_POST['mobileno'];
 $productnmandqty=$_POST['productnmandqty'];
 $sum=$_POST['sum'];
 $adharno=$_POST['adharno'];
 $pincode=$_POST['pincode'];
 
 $currentdate=$_POST['currentdate'];

   if(!empty($adharno) && !empty($pincode)  )
   {
               if(!preg_match("/^[0-9]+$/",$pincode))
          {  
             $error=true;
            echo "<script type='text/javascript'>alert('Pincode Number must contain   number!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>  location.href='cashondilevary.php'
               </script>";
          }     
         
		      //cardholder validation
			   if(strlen($adharno) != 12)
          {    
            $error=true;
            echo "<script type='text/javascript'>alert('Adhar Number must have  12 numbers!')
               </script>";

                echo "<script language='javascript' type='text/javascript'> location.href='cashondilevary.php'
               </script>";
          }
		  
		   if(!$error)
         {
		    $query2="INSERT INTO  `ecomerce`.`cashondelivar` (
`fname` ,
`lname` ,
`add` ,
`email` ,
`mobileno` ,
`productnmqty` ,
`sum` ,
`adharno` ,
`pincode` ,
`currentdate`
)
VALUES (
 '$fname',  '$lname',  '$add',  '$email',  '$mobileno',  '$productnmandqty',  '$sum',  '$adharno',  '$pincode', '$currentdate')";
              
			  if($is_query_run=mysqli_query($conn,$query2))
                       {  //Insert into database Query
                          // echo " query executed";
                         echo "<script type='text/javascript'>alert('YOUR BUYING ORDER WAS DONE SEUCCESFULLY!')
                         </script>";
                       
                           echo "<script language='javascript' type='text/javascript'>location.href='userhome.php'
                           </script>";


                        }
						else echo "query is not executed";

		 }
	  
   }
   else
   {
               echo "<script type='text/javascript'>alert('Fields are not Empty!')
               </script>";

                echo "<script language='javascript' type='text/javascript'> location.href='credit.php'
               </script>";
  
   }
}

?>