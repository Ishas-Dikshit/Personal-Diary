<?php

    session_start();
	$diarycontent = "";

    if (array_key_exists("id", $_COOKIE) && $_COOKIE['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION) && $_SESSION['id']) {
        
        
		
		include("connection.php");
		
		$query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1 ";
		$row = mysqli_fetch_array(mysqli_query($link,$query));
		$diarycontent = $row['diary'];
        
    } else {
        
        header("Location: index.php");
        
    }
include("header.php");
?>
<nav class="navbar navbar-light bg-light navbar-fixed-top">
  <a class="navbar-brand" id = "logo">Your Personal Diary</a>
  
    <div class="pull-xs-right">
       <a href='index.php?logout=1'><button class="btn btn-success-outline" type="submit">Log out</button></a>
   
  </div>
</nav>
<div class = "container-fluid" id = "containerloggedinpage">
    <textarea id = "diary" class = "form-control"><?php 
	echo $diarycontent; 
	?></textarea>
    
</div>
    
<?php
include("footer.php");

?>