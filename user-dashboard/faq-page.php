<?php 
session_start();
require('dbConn.php');
$db = mysqli_connect("localhost","root","","bigtree"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bigtree</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="user-dashboard4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <!-- <div class="bg-image"></div> -->
    <!-- <div class="bg-img"></div> -->
    <div class="header">
        <img class="logo" src="logo.jpg" alt="logo" width="75" height="75"><span style="color:white;padding-top: 20px;position: absolute;font-size: 24px;">DOMISEP</span>
        <ul>
        <li><a class="home_link" href="user-dashboard1.php" class="home-click" >
                    Home</a></li>
            <li><a class="faq_link" href="faq-page.php">
                    FAQ </a></li> 
            <li><a class="support_link" href="support-page.php">
                    Support</a></li>
            <li><a class="home_link" href="profile-page.php">
                    Profile</a></li>
            <li><a class="home_link" href="logout.php">Logout</a></li>
    </div>
    <div class="main">
        <div id="faq-content" class="span10" >
            <ul class="breadcrumb">
                <li><a href="index.html">FAQ</a><i class="icon-angle-right"></i></li>
            </ul>
            <div class="center-part" style="width:80%; overflow: hidden;">
                <h1 class="welcome-user">Frequently Asked Questions</h1>
                <div class="faq-block">
                <?php
                    
					$sql = "SELECT * FROM faq";
					$query_run = mysqli_query($db,$sql);
					$query_check = mysqli_num_rows($query_run);
					if($query_check > 0 )
					{	
						while($row = mysqli_fetch_assoc($query_run))
						{
							// $id = $row['id'];
							$faq_text = $row['faq_text'];

							// echo "<div class='tnc'><p class='display'>$id</p></div>";
							echo "<div class='tnc'><p class='display'>$faq_text</p></div>";
							
						}
					}
				?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>