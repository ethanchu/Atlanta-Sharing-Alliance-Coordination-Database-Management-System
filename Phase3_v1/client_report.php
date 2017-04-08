

 <?php
session_start();
include ("dbh.php");

?>
<html> 
	<title>Client Report</title>
	<link rel="stylesheet" type="text/css" href="style.css"
    <body>
  	Welcome to Atlanta Sharing Alliance Coordination System!
         <div class="profile_section">
            <div class="subtitle">Client Information</div>  
            <table>
                <tr>
                    <td class="heading">client_id</td>
                    <td class="heading">phone_number</td>
                    <td class="heading">head_of_household</td>
                    <td class="heading">name</td>
                    <td class="heading">ID description</td>
                    
                </tr>                           
                        
            <?php   
                $request_id1 = $_GET['selectID']; 
        
                //Query the database for user
                $sql="SELECT * FROM client where client_id=$request_id1 ";//need to use single quote for variables
                $query= mysqli_query($con,$sql);
        
                while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                    $ename =urlencode($row[3]);
                    print "<tr>";
                    print "<td>" . $row[0] . "</td>";
                    print "<td>" . $row[1] . "</td>";
                    print "<td>" . $row[2] . "</td>";
                    print "<td>{$row[3]}</td>";
                    print "<td>" . $row[4] . "</td>";
                    print '<td><a href="edit_client.php?editID=' . urlencode($row[0]) . '">edit name/ID</a></td>';
                    print "</tr>";  
                }
            ?>                
            </table>                        
        </div> 

         <div class="profile_section">
            <div class="subtitle">Client Log Information</div>  
            <table>
                <tr>
                    <td class="heading">client_id</td>

                    <td class="heading">datetime</td>
                    <td class="heading">site_id</td>
                    <td class="heading">service description</td>
                    <td class="heading">field_modified</td>
                    <td><a href="new_log.php?logID=<?php echo $_GET['selectID'] ?> ">add new log</a></td>
                    
                </tr>                           
                        
            <?php   
                $request_id2 = $_GET['selectID']; 
                
                //Query the database for user
                $sql="SELECT * FROM log where client_id=$request_id2 ";//need to use single quote for variables
                $query= mysqli_query($con,$sql);
        
                while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                    
                    print "<tr>";
                    print "<td>" . $row[0] . "</td>";
                    print "<td>" . $row[1] . "</td>";
                    print "<td>" . $row[2] . "</td>";
                    print "<td>{$row[3]}</td>";
                    print "<td>" . $row[4] . "</td>";
                    
                    print "</tr>";  
                }
                
            ?>                
            </table>                        
        </div>         

	</body>
</html>

