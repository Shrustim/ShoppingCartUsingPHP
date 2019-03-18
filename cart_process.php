<?php
session_start();
 $pid=$_GET['pid'];
 $qty=$_GET['qty'];
 

 if(isset($_SESSION['productcart']))
 {
   $currentno= $_SESSION['counter']+1;
   $_SESSION['productcart'][$currentno]=$pid;
   $_SESSION['qtycart'][$currentno]=$qty;
 
   $_SESSION['counter']=$currentno;
 }
else
{

 $productcart=array();
 $qtycart=array();
 $_SESSION['productcart'][0]=$pid;
  $_SESSION['qtycart'][0]=$qty;
  $_SESSION['counter']=0;
}
header("location:viewcart.php");
?>

