<?php

$conn = mysqli_connect("localhost", "root", "12345678", "cs6400_sp17_team001");

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
