<?php
include_once 'connt.php';

if(isset($_POST['submit']))
{
       
           $name=($_POST['name'] ); 
		   $price=($_POST['price'] ); 
           $desc=($_POST['desc'] ); 
         
           $filesname=($_FILES["uploadfile"]["name"]);
           $tempname=($_FILES["uploadfile"]["tmp_name"]);
           $folder="product/". $filesname;
          
          
           move_uploaded_file($tempname, $folder);
		   
          if(!empty($name) && !empty($price) && !empty($desc) && !empty($folder))
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

        
              $query="INSERT INTO  `ecomerce`.`product` (`productname` ,`image` ,`description` ,`price` ) VALUES ('$name', '$folder', '$desc',  '$price')";





                      if($is_query_run=mysqli_query($conn,$query))
                       {  //Insert into database Query
                          // echo " query executed";
                         echo "<script type='text/javascript'>alert('ADD PRODUCT WAS DONE SEUCCESFULLY!')
                         </script>";

                         
                echo "<script language='javascript' type='text/javascript'>location.href='admin.php'
               </script>";


                        }
                     else
                        echo "query not executed";
      
            


             
                }


		  }		   
		   
		   
}     
 ?>