<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Online shoping Login</title>

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
<a href="index.php" style="color:#000000">Home</a>
<a href="ulogin.php" style="margin-left:20px;color:#000000">Login</a>
<a href="registration.php"style="margin-left:20px;color:#000000">Registration</a>
</div>

<h1 align="center" c style="text-shadow:5px 5px 9px yellow; color:#FFFFFF"> ADMIN LOGIN</h1> 
<center>
<div style="background:#001e2d; height:400px; width:400px; color:#FFFFFF">
     <br/>
    <form  action="adlog.php" method="POST">
        <div>
	      <h4> Admin :</h4>
	       <input type="text" name="name" size="40" maxlength="40"  />
      </div>
      <div >
	  	     <h4>Password :</h4>
             <input  type="password" name="pass" size="40" maxlength="40"  />
      </div>
	  <div><br /><br/><br/>
	      <center><input class="button" type="submit" value="login"
	    name="submit" /></center>
	  </div>
    </form>

	</div>
	</center>
 

</body>
</html>
