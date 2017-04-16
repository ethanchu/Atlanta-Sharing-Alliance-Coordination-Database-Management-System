<?php require_once("lib/db_connection.php"); ?>
<?php
    $error='';

   //ini_set('display_errors',"1");
   //error_reporting(~0);
   if(isset($_POST['username'])) {
      // username and password sent from form 
      

      $query = "SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[password]'"; 
      $result = mysqli_query($connection, $query);
      $row = mysqli_fetch_array($result);

      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(!empty($row['username'])) {
      	
      	$_SESSION['username'] = $row['username'];
      	$_SESSION['user_id'] = $row['user_id'];
      	$_SESSION['site_id'] = $row['site_id'];
         
         header("location: siteservice.php");
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
    <input type="password" placeholder="Enter Password" name="password" value ="gatech123" required>
    </div>
     <button type="submit">Login</button>
    <!-- <button type="button" class="cancelbtn">Cancel</button>-->
 </div>
  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		
</form>


<?php include("lib/footer.php"); ?>
