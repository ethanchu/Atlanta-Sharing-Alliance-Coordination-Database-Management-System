

 <?php
session_start();
include ("dbh.php");
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
    $queryID = mysqli_query($con, $sql);
    $count =mysqli_affected_rows($con);        
    

}    


?>
<html> 
	<title>Client Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css"
    <body>Welcome to Atlanta Sharing Alliance Coordination System!

  	Please enter new client information below!
    <div id="frm1">	
        <form action ="registerclient.php" method = "POST">
        <table>                             
            <tr>
                <td class="item_label">name</td>
                <td><input type="text" name="nname" /></td>
            </tr>
            <tr>
                <td class="item_label">head of household</td>
                <td><input type="text" name="nhead_of_household" /></td>
            </tr>
            <tr>
                <td class="item_label">phone number</td>
                <td><input type="text" name="nphone_number" /></td>
            </tr>
            <tr>
                <td class="item_label">ID description</td>
                <td><input type="text" name="ndescription" /></td>
            </tr>
                                    
                                    
        </table>
           
            <p> 
                <input type="submit" id = "submit" name="submit" value = "register" />
            </p>
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
        ?>
</div>
	</body>
</html>

