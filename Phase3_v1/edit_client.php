

 <?php
session_start();
include ("dbh.php");

?>
<html> 
    <title>Client Report</title>
    <link rel="stylesheet" type="text/css" href="style.css"
    <body>
    Welcome to Atlanta Sharing Alliance Coordination System!<br>
    Please enter new client information below!<br>

    <?php   
                
    $clientid = $_GET['editID'];
    
    if(isset($_POST['modname'])){
        $nname = $_POST['newname'];
        if (empty(trim($nname))) {
            $_SESSION['Error2'] = "Please enter a new name.";   
        }
        $sql="select name from client where client_id = $clientid";
        $queryID = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldname = $row[0];
        echo $oldname;

        //retrieve old field_modified from log
        $sql="select field_modified from log where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldfield = $row[0];
        echo $oldfield;

        //add old name to log field_modified
        $sql="update log set field_modified ='$oldfield $oldname' where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        
        //update client name as new name
        $sql="update client set name = '$nname' where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        $count =mysqli_affected_rows($con); 
        echo $count;

        
    }

    if(isset($_POST['modID'])){
        $ndescri = $_POST['newdescription'];
        if (empty(trim($ndescri))) {
            $_SESSION['Error2'] = "Please enter a new ID description.";   
        }

        $sql="select description from client where client_id = $clientid";
        $queryID = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $olddescription = $row[0];
        echo $olddescription;


        //retrieve old field_modified from log
        $sql="select field_modified from log where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($queryID,MYSQLI_NUM);
        $oldfield = $row[0];
        echo $oldfield;

        //add old field to log field_modified
        $sql="update log set field_modified = '$oldfield $olddescription' where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        

        //update client name as new name
        $sql="update client set description = '$ndescri' where client_id = $clientid ";
        $queryID = mysqli_query($con, $sql);
        $count =mysqli_affected_rows($con); 
        echo $count;

    
    }

    ?>  
    <div id="frm1"> 
        <form action ="" method = "POST">
 
                Enter new name<input type="text" name="newname" />
                     <input type="submit" id = "modname" name="modname" value = "update name" />
               <br>Enter new ID description<input type="text" name="newdescription" />
                    <input type="submit" id = "modID" name="modID" value = "update ID" />
            
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

