<?php
include_once 'connt.php';

if(isset($_POST['submit']))
{
       
           $fname=($_POST['fname'] ); 
		   $lname=($_POST['lname'] ); 
           $add=($_POST['add'] );
		     $email=($_POST['email'] ); 
		   $mobileno=($_POST['mobileno'] ); 
           $pass=($_POST['pass'] );
		   $pass2=($_POST['pass2'] );
         		   
          if(!empty($fname) && !empty($lname) && !empty($add) && !empty($email) && !empty($mobileno) && !empty($pass) && !empty($pass2))
		  {
		    
			  if(strlen($fname)<4)
          {   //basic firstname validation
            $error=true;
            echo "<script type='text/javascript'>alert('Firstname must have atlaest 4 characters!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }
          else 
               if(!preg_match("/^[a-zA-Z]+$/",$fname))
          {   //check alphabets or not
             $error=true;
            echo "<script type='text/javascript'>alert('Firstname must contain alphabets!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }



          if(strlen($lname)<4)
          {    //basic middlename validation
            $error=true;
            echo "<script type='text/javascript'>alert('Lastname must have atlaest 4 characters!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }
          else 
               if(!preg_match("/^[a-z A-Z]+$/",lname))
          {    //check alphabets or not
             $error=true;
            echo "<script type='text/javascript'>alert('Lastname must contain alphabets!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }
                 if(strlen($add)<10)
          {   //basic firstname validation
            $error=true;
            echo "<script type='text/javascript'>alert(' Address must have atlaest 10 characters!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }
                  //price validation
                    if(!preg_match("/^[0-9]+$/",$mobileno))
                 {  
                     $error=true;
                     echo "<script type='text/javascript'>alert('moblie number must contain numbers!')
                    </script>";

                     echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
                   </script>";
                  }
				  else {
				  if(strlen($mobileno) != 10)
          {   //basic firstname validation
            $error=true;
            echo "<script type='text/javascript'>alert(' Mobile Number must have  10  Numbers!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }}



          if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          {     //Check  validation of email
             $error=true;
            echo "<script type='text/javascript'>alert('please enter valid email address!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";
          }           
             if($pass!==$pass2)
              {  //check password matching or not
               $error=true;
                echo "<script type='text/javascript'>alert('Password does not  Match!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";

          }
          else
          {  
             if(strlen($pass)<6)
             {    
               $error=true;
               echo "<script type='text/javascript'>alert('password must have atlaest 6 characters!')
               </script>";

                echo "<script language='javascript' type='text/javascript'>location.href='registration.php'
               </script>";

              }
         
           }
		  
		    
                      if(!$error)
         {

        
              $query="INSERT INTO  `ecomerce`.`customer` (`fname` ,`lname` ,`add` ,`email`,`mobileno`,`pass`,`pass2` ) 
			  VALUES ('$fname', '$lname','$add','$email','$mobileno','$pass','$pass2')";





                      if($is_query_run=mysqli_query($conn,$query))
                       {  //Insert into database Query
                          // echo " query executed";
                      
                         
                echo "<script language='javascript' type='text/javascript'>location.href='ulogin.php'
               </script>";


                        }
                     else
                        echo "query not executed";
      
            


             
                }


		  }		   
		   
		   
}     
 ?>