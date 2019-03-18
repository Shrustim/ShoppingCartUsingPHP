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
 $cardno=$_POST['cardno'];
 $cardholder=$_POST['cardholder'];
 $cvv=$_POST['cvv'];
 $expiredate=$_POST['expiredate'];
 $currentdate=$_POST['currentdate'];

   if(!empty($cardno) && !empty($cardholder) && !empty($cvv) && !empty($expiredate) )
   {
            if(!(date('Y-m-d',strtotime($expiredate)) == $expiredate))
             {
               
			   $error=true;
            echo "<script type='text/javascript'>alert('Expire date formate is                   Incorrect,Please enter valid format of expire date!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>               location.href='credit.php'
               </script>";

              }
			  //card number validation
			  if(strlen($cardno) != 16)
          {  
            $error=true;
            echo "<script type='text/javascript'>alert('Card number must contain 16            numbers!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>                     location.href='credit.php'
               </script>";
          }
          else 
               if(!preg_match("/^[0-9]+$/",$cardno))
          {  
             $error=true;
            echo "<script type='text/javascript'>alert('Card Number must contain                  number!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>                  location.href='credit.php'
               </script>";
          }     
         
		      //cardholder validation
			   if(strlen($cardholder)<4)
          {    
            $error=true;
            echo "<script type='text/javascript'>alert('Card holder must have atlaest            4 characters!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>                  location.href='credit.php'
               </script>";
          }
          else 
               if(!preg_match("/^[a-z A-Z]+$/",$cardholder))
          {   
             $error=true;
            echo "<script type='text/javascript'>alert('Card holder must contain                 alphabets!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>              location.href='credit.php'
               </script>";
          }
         
		    //cvv validation
                 if(strlen($cvv) != 3)
          {  
            $error=true;
            echo "<script type='text/javascript'>alert('CVV number must contain 3                numbers!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>                    location.href='credit.php'
               </script>";
          }
          else 
               if(!preg_match("/^[0-9]+$/",$cvv))
          {  
             $error=true;
            echo "<script type='text/javascript'>alert('CVV Number must contain           number!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>                         location.href='credit.php'
               </script>";
          } 
		  
		   if(!$error)
         {
		    $query2="INSERT INTO  `ecomerce`.`creditorders` (
`fname` ,
`lname` ,
`add` ,
`email` ,
`mobileno` ,
`productnmqty` ,
`sum` ,
`cardno` ,
`cardholder` ,
`cvv` ,
`expiredate` ,
`currentdate`
)
VALUES (
 '$fname',  '$lname',  '$add',  '$email',  '$mobileno',  '$productnmandqty',  '$sum',  '$cardno',  '$cardholder',  '$cvv',  '$expiredate',  '$currentdate'
)";
              
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