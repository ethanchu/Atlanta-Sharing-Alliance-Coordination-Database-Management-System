<?php
   include("db_conn.php");
   $error='';
   if(isset($_POST['username'])) {
      // username and password sent from form 
      
      $query = mysql_query("SELECT * FROM USER WHERE UserName = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error()); 
      $row = mysql_fetch_array($query) or die(mysql_error());
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if(!empty($row['UserName'])) {
      	 //$_SESSION['login_user'] = $row['UserName'];
         
         header("location: welcome.php");
      }else {
      	 $error = "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
      }
   }
?>
<html>
<style>
	input[type=text], input[type=password]{
		width: 30%;
		padding: 12px 20px;
		margin: 8px 0;
		display:inline-block;
		box-sizing: border-box;
	}

	button{
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 10%;
	}
	
	button: hover{
		opacity:0.8;
	}
	
	.cancelbtn{
		background-color: red;
		margin-left: 25px;
	}
	
	span.psw {
    	float: right;
    	padding-top: 16px;
	}
	.container{
	  text-align: center;
	}
	
</style>
<body>

<h2 class="container"> Login</h2>

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
     <button type="button" class="cancelbtn">Cancel</button>
  </div>
  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		
</form>
</body>
</html>
