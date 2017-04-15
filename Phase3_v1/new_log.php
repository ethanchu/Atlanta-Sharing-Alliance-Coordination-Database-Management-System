<?php require_once("lib/db_connection.php"); ?>

<html> 
    <title>Client Report</title>
   <link rel="stylesheet" type="text/css" href="site.css">
    <body>
    Welcome to Atlanta Sharing Alliance Coordination System!<br>
     <div style="text-align: center; margin-top: 50;"> Please enter new client information below!</div><br>

    <?php   
                
    $clientid = $_GET['logID'];
    
    if(isset($_POST['add'])){
        $site = $_POST['lsite'];
        $descri = $_POST['ldescription'];
    
        $note = $_POST['lnote'];
        if (empty(trim($descri))) {
        $_SESSION['Error1'] = "Please enter a description.";   
    }
    if (empty(trim($site))) {
        $_SESSION['Error2'] = "Please enter an site id.";   
    }
    
    $sql="INSERT INTO log (client_id, site_id, description, field_modified) ".
     "VALUES ($clientid, $site, '$descri', '$note')";
    $queryID = mysqli_query($connection, $sql);
    $count =mysqli_affected_rows($connection);
    if($count >0) {
        $_SESSION['success'] = "A new log entry has been added for client!";
    }
 


    }
    ?>  
    <div id="frm1"> 
        <form action ="" method = "POST">
        <table>                             

            <tr>
                <td style="text-align: left;" class="item_label">Service Site-id : </td>
                <td><input style="width: 150px;" type="text" name="lsite" /></td>
            </tr>
            <tr>
                <td style="text-align: left;" class="item_label">Service Description : </td>
                <td><input style="width: 150px;" type="text" name="ldescription" /></td>
            </tr>   
            <tr>
                <td style="text-align: left;" class="item_label">Additional Note : </td>
                <td><input style="width: 150px;" type="text" name="lnote" /></td>
            </tr>                     
                                    
        </table>
            <p> 
                <input type="submit" id = "add" name="add" value = "ADD LOG ENTRY" />
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
            if( isset($_SESSION['success']) ){
    
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>      
                                  
</div> 

        <div style="text-align: center;"><a href="client.php">Go back to Client</a></div>

    <?php include("lib/footer.php"); ?>

