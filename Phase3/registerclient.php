<?php require_once("lib/db_connection.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>

 <?php
if(isset($_POST['submit'])){

    $name = $_POST['nname'];
    $head_of_household = $_POST['nhead_of_household'];
    $phone_number = $_POST['nphone_number'];
    $description = $_POST['ndescription'];

    if (empty(trim($name))) {
        $_SESSION['Error1'] = "Please enter a name.";   
    }
    if (empty(trim($description))) {
        $_SESSION['Error2'] = "Please enter an ID description.";   
    }
    
    $sql="INSERT INTO client (client_id, phone_number, head_of_household, name, description) ".
     "VALUES (NULL, '$phone_number', '$head_of_household', '$name', '$description')";
    $queryID = mysqli_query($connection, $sql);
    $count =mysqli_affected_rows($connection);
    if($count >0) {
        $_SESSION['success']= "New client has been successfully registered!";
        

    }      
    else 
    {
        $_SESSION['Error3'] = "New client failed to be registered!"; 
    }
    

}    


?>
<html> 
	<title>Client Registration</title>
	<link rel="stylesheet" type="text/css" href="site.css">
    <body>Welcome to Atlanta Sharing Alliance Coordination System!<br>
   <div style="text-align: center; margin-top: 50;"> Please enter new client information below!</div><br>

    <div id="frm1">	
        <form action ="" method = "POST">
        <table style="margin-top: 20;">                             
            <tr>
                <td style="text-align:left;" class="item_label">Name:</td>
                <td><input style="width:150px;" type="text" name="nname" /></td>
            </tr>
            <tr>
                <td style="text-align:left;" class="item_label">Head of Household:</td>
                <td><input style="width:150px;" type="text" name="nhead_of_household" /></td>
            </tr>
            <tr>
                <td style="text-align:left;" class="item_label">Phone Number:</td>
                <td><input style="width:150px;" type="text" name="nphone_number" /></td>
            </tr>
            <tr>
                <td style="text-align:left;" class="item_label">ID Description:</td>
                <td><input style="width:150px;" type="text" name="ndescription" /></td>
            </tr>
                                    
                                    
        </table>
           
            <p> 
                <input type="submit" id = "submit" name="submit" value = "REGISTER" />
            </p>
            <div style="text-align: center;"> <a href="client.php?servicetype=<?php echo $servicetype;?>">Go back to Client</a></div>
        </form> 
        <?php 
            if( isset($_SESSION['Error1']) ){
    
                echo $_SESSION['Error1'];

                unset($_SESSION['Error1']);
            }
            if( isset($_SESSION['Error2']) ){
    
                echo $_SESSION['Error2'];

                unset($_SESSION['Error2']);
            }
             if( isset($_SESSION['Error3']) ){
    
                echo $_SESSION['Error3'];

                unset($_SESSION['Error3']);
            }
             if( isset($_SESSION['success']) ){
    
                echo $_SESSION['success'];

                unset($_SESSION['success']);
            }
        ?>
</div>

    <?php include("lib/footer.php"); ?>

