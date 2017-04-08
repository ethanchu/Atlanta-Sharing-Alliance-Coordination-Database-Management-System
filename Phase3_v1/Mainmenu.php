<?php

include 'dbh.php';

$uname =$_POST['UserName'];
$pwd =$_POST['Passward'];

echo $uname."<br>";
echo $pwd."<br>";

$sql ="SELECT * FROM user WHERE userID = '$uname' AND passward = '$pwd' ";
$result = mysqli_query($conn,$sql);

if(!$row = mysqli_fetch_assoc($result)){
	echo "Your username or passward is incorrect!";
else {
	$_SESSION['id']=$row['id']
	
}

?>