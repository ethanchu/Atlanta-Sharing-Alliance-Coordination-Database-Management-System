<?php
	include("db_conn.php");
  // $error='';
   //ini_set('display_errors',"1");
   //error_reporting(~0);
   if(isset($_POST['username'])) {
      // username and password sent from form 
      
      $query = mysql_query("SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error()); 
      $row = mysql_fetch_array($query) or die(mysql_error());
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(!empty($row['username'])) {
      	
      	$_SESSION['username'] = $row['username'];
      	$_SESSION['user_id'] = $row['user_id'];
         
         header("location: welcome.php");
      }else {
      	 $error = "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
      }
   } else {
   	session_unset();
   	session_destroy();
   }
?>
<html>
<head>
<title>Login </title>

<link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>

<a href="Home.php">HOME</a>

<h2 class="container"> Login </h2>

<form action="" method="post">
<div class="container">
  <div>
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
</div>
<div>
	<label style="text-align: center;"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    </div>
     <button type="submit">Login</button>
    <!-- <button type="button" class="cancelbtn">Cancel</button>-->
 </div>
  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		
</form>
</body>
</html>
