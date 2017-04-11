

 <?php
session_start();
include ("dbh.php");

?>
<html> 
	<title>Client Report</title>
	<link rel="stylesheet" type="text/css" href="style.css"
    <body>
  	Welcome to Atlanta Sharing Alliance Coordination System!<br>
    Please enter new client log information below!

    <?php   
                
    $clientid = $_GET['logID'];
    
    if(isset($_POST['add'])){
        $site = $_POST['lsite'];
        $descri = $_POST['ldescription'];
    
        $note = $_POST['lnote'];
        echo $clientid;
        echo $descri;
        if (empty(trim($descri))) {
        $_SESSION['Error1'] = "Please enter a description.";   
    }
    if (empty(trim($site))) {
        $_SESSION['Error2'] = "Please enter an site id.";   
    }
    
    $sql="INSERT INTO log (client_id, site_id, description, note) ".
     "VALUES ('$clientid', $site, '$descri', '$note')";
    $queryID = mysqli_query($con, $sql);
    $count =mysqli_affected_rows($con); 
    echo $count;


    }
    ?>  
    <div id="frm1"> 
        <form action ="" method = "POST">
        <table>                             

            <tr>
                <td class="item_label">service site id</td>
                <td><input type="text" name="lsite" /></td>
            </tr>
            <tr>
                <td class="item_label">service description</td>
                <td><input type="text" name="ldescription" /></td>
            </tr>   
            <tr>
                <td class="item_label">additional note</td>
                <td><input type="text" name="lnote" /></td>
            </tr>                     
                                    
        </table>
            <p> 
                <input type="submit" id = "add" name="add" value = "add log entry" />
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

