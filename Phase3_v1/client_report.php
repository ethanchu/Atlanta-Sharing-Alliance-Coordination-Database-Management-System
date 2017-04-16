<?php require_once("lib/db_connection.php"); ?>
<?php
$servicetype =  $_GET["servicetype"];
?>
<html> 
	<title>Client Report</title>
	<link rel="stylesheet" type="text/css" href="site.css">
    <body>
  	Welcome to Atlanta Sharing Alliance Coordination System!
         <div class="profile_section">
         <div style="text-align:center; color: #4CAF50;">Client Information</div>  
         <table border="1">
			<thead>
			<tr>
			<th>client_id</th>
			<th>phone_number</th>
			<th>head_of_household</th>
			<th>name</th>
			<th>ID description</th>
            </tr>    
            </thead>
	                        
                        
            <?php   
                $request_id1 = $_GET['selectID']; 
        
                //Query the database for user
                $sql="SELECT * FROM client where client_id=$request_id1 ";//need to use single quote for variables
                $query= mysqli_query($connection,$sql);
        
                while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                    $ename =urlencode($row[3]);
                    print "<tr>";
                    print "<td>" . $row[0] . "</td>";
                    print "<td>" . $row[1] . "</td>";
                    print "<td>" . $row[2] . "</td>";
                    print "<td>{$row[3]}</td>";
                    print "<td>" . $row[4] . "</td>";
                    print '<td><a href="edit_client.php?servicetype='.urlencode($servicetype).'&editID=' . urlencode($row[0]) . '">edit name/ID</a></td>';
                    print "</tr>";  
                }
            ?>                
            </table>                        
        </div> 

          <div class="profile_section">
            <div style="text-align:center; margin-top:100px; color: #4CAF50;">Client Log Information</div>  
            <table border="1">
                <tr>
                    <td>client_id</td>

                    <td>datetime</td>
                    <td>site_id</td>
                    <td>service description</td>
                    <td>field_modified</td>
                    <td><a href="new_log.php?servicetype=<?php echo$servicetype ?>&logID=<?php echo $_GET['selectID'] ?> ">add new log</a></td>

                </tr>                           
                        
            <?php   
                $request_id2 = $_GET['selectID']; 
                
                //Query the database for user
                $sql="SELECT * FROM log where client_id=$request_id2 ";//need to use single quote for variables
                $query= mysqli_query($connection,$sql);
        
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


    <div class="Waitlist_section">
        <div style="text-align:center; margin-top:100px; color: #4CAF50;">Client Waitlist Information</div>
        <table border="1">
            <tr>
                <td>Site ID</td>
                <td>Service Nmae</td>
                <td>Waitlist Ranking</td>
                <td>Date & Time</td>
            </tr>

            <?php
            $request_id3 = $_GET['selectID'];

            //Query the database for user
            $sql="SELECT site_id, service_name, waitinglist_ranking, datetime FROM waitlist Where Client_id = $request_id3";//need to use single quote for variables
            $query= mysqli_query($connection,$sql);

            while($row = mysqli_fetch_array($query,MYSQLI_NUM)){

                print "<tr>";
                print "<td>" . $row[0] . "</td>";
                print "<td>" . $row[1] . "</td>";
                print "<td>" . $row[2] . "</td>";
                print "<td>{$row[3]}</td>";
                print "</tr>";
            }

            ?>
        </table>
    </div>

    <div style="text-align:center; margin-top:50px;"> <a href="client.php?servicetype=<?php echo $servicetype?>">Go back to Client</a></div>

    <?php include("lib/footer.php"); ?>

