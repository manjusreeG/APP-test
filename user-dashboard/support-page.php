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
        </ul>
    </div>
    <div class="main">
        <div id="support-content">
            <ul class="breadcrumb">
                <li><a href="#">Support</a></li>
            </ul>
            <div class="center-part">
                <div class="support-title">
                    We are always here to serve you!
                </div>
                <div class="support-form">
                    <form id="support-form" action="support_page.php" method="POST">
                        <input name="name" type="text" class="form-control" placeholder="Your Name" required><br>
                        <input name="email" type="text" class="form-control" placeholder="Your Email Address" required><br>
                        <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
                        <input type="submit" class="form-control submit" value="Send Message" name="submit_button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>