<?php require_once("lib/db_connection.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>
<html> 
<head>
<link rel="stylesheet" type="text/css" href="site.css">

<title>Client Report</title>
</head>
<body>
    Welcome to Atlanta Sharing Alliance Coordination System!<br>
    <br>
    <div style="text-align: center; margin-top:50px"> Please enter new client information below!</div><br>

    <?php   
                
    $clientid = $_GET['editID'];
    
    if(isset($_POST['modname'])){
        $nname = $_POST['newname'];
        if (empty(trim($nname))) {
            $_SESSION['Error2'] = "Please enter a new name.";   
        }
        $sql="select name from client where client_id = $clientid";
        $queryID = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldname = $row[0];
        

        //retrieve old field_modified from log
        $sql="select field_modified from log where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        
        if(mysqli_num_rows($queryID)>0){
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldfield = $row[0];
        $oldname .= $oldfield;
        
        }

        
        //add old name to log field_modified
        $sql="update log set field_modified ='$oldname' where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        $count =mysqli_affected_rows($connection);
        
        
        //update client name as new name
        $sql="update client set name = '$nname' where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        $count =mysqli_affected_rows($connection);
        if($count >0) {
            $_SESSION['success'] = "New name has been updated for client!";
        }
        
        
    }
    if(isset($_POST['modID'])){
        $ndescri = $_POST['newdescription'];
        if (empty(trim($ndescri))) {
            $_SESSION['Error2'] = "Please enter a new ID description.";   
        }
        $sql="select description from client where client_id = $clientid";
        $queryID = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $olddescription = $row[0];
        
        //retrieve old field_modified from log
        $sql="select field_modified from log where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldfield = $row[0];
        
        //add old field to log field_modified
        $sql="update log set field_modified = '$oldfield $olddescription' where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        
        //update client name as new name
        $sql="update client set description = '$ndescri' where client_id = $clientid ";
        $queryID = mysqli_query($connection, $sql);
        $count =mysqli_affected_rows($connection);
        if($count >0) {
            $_SESSION['success'] = "New ID has been updated for client!";
        }
        
    
    }
    ?>  
    <div id="frm1"> 
        <form action ="" method = "POST">
 
                <div style="text-align: center; margin-left: 50">    Enter new name: <input  type="text" name="newname" /> 
                     <input style="margin-left: 30;" type="submit" id = "modname" name="modname" value = "update name" /></div>
               <br><div style="text-align: center;">Enter new ID description: <input type="text" name="newdescription" />
                    <input style="margin-left: 20;" type="submit" id = "modID" name="modID" value = "update ID" /></div>
            
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

        
<div style="text-align: center;"> <a href="client.php?servicetype=<?php echo $servicetype?>">Go back to Client</a></div>

    <?php include("lib/footer.php"); ?>
