
			<div id="header">
                <div class="logo"><img src="img/gtonline_logo.png" style="opacity:0.5;background-color:E9E5E2;" border="0" alt="" title="GT Online Logo"/></div>
			</div>
			
			<div class="nav_bar">
				<ul>    
                    <li><a href="view_bunks.php" <?php if($current_filename=='view_bunks.php') echo "class='active'"; ?>>View Bunks</a></li>                       
					<li><a href="view_meals.php" <?php if(strpos($current_filename, 'view_meals.php') !== false) echo "class='active'"; ?>>View Meals</a></li>  
                    <li><a href="view_service.php" <?php if($current_filename=='view_service.php') echo "class='active'"; ?>>View Service</a></li>  
                    <li><a href="search_client.php" <?php if($current_filename=='search_client.php') echo "class='active'"; ?>>Search Client</a></li>  
                    <li><a href="register_client.php" <?php if($current_filename=='register_client.php') echo "class='active'"; ?>>Register Client</a></li>  
                    <li><a href="search_item.php" <?php if($current_filename=='search_item.php') echo "class='active'"; ?>>Search Item</a></li>  
                    <li><a href="request_item.php" <?php if($current_filename=='request_item.php') echo "class='active'"; ?>>Request Item</a></li>  
                    <li><a href="logout.php" <?php if($current_filename=='logout.php') echo "class='active'"; ?>>Log Out</a></li>              
				</ul>
			</div>