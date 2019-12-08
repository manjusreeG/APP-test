<?php 
session_start();
require('functions.php');
//$db = mysqli_connect("localhost","root","","bigtree"); 

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
        <li><a class="home_link" href="user-dashboard1.php" class="home-click">
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
    <div id="profile-content" class="span10" >
            <ul class="breadcrumb">
                <li><a href="#">My Profile</a></li>
            </ul>

            <div class="center-part">
                <?php 
                $email=$_SESSION['email'];

                $sqlFetchUserID ="SELECT * FROM users WHERE email='$email'";
                $q_run_user = mysqli_query($db,$sqlFetchUserID);
                $user = mysqli_fetch_array($q_run_user);
                
                $user_id=$user['id'];

                $sqlFetchAddress = "SELECT address FROM homes WHERE user_id='$user_id'";
                $query_address = mysqli_query($db,$sqlFetchAddress);
                $address_user = mysqli_fetch_array($query_address); 
                // var_dump($address_user);               
                if($address_user == null || $address_user == 'undefined'){
                    $address_display = '';
                }else{
                    $address_display = array_unique($address_user);
                }         
                // $address_user = mysqli_fetch_array($query_address);
                // var_dump($address_user); 

                ?>
                <form id="change-pswd-form" method="post" action="">
                    <div style="font-size: 18px; margin-bottom: 15px; margin-top: 5px; font-weight: 600;">Change Password</div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="text" value="<?php echo $user['email']?>" name="email">
                    </div>
                    <div class="input-group">
                        <label>New password</label>
                        <input type="password" name="pswd">
                    </div>
                    <div class="input-group">
                        <label>Confirm passwod</label>
                        <input type="password" name="conpswd">
                    </div>
                    <div class="submitbutton">
                        <!-- <button type="submit" name="edit" class="btn">Edit</button> -->
                        <button type="submit" name="pswd_btn" class="btn">Save</button>
                    </div>
                </form>
                <form id="profile-form" method="post" action="user-dashboard1.php">
                    <div class="input-group">
                        <label>Firstname</label>
                        <input type="text" value="<?php echo $user['first_name']?>" name="first_name">
                    </div>
                    <div class="input-group">
                        <label>Lastname</label>
                        <input type="text" value="<?php echo $user['last_name']?>" name="last_name">
                    </div>
                    <!-- <div class="input-group">
                        <label>Email</label>
                        <input type="text" value="<?php echo $user['email']?>" name="email">
                    </div> -->
                    <div class="input-group">
                        <label>Address</label>
                        <!-- <input type="text" name="address"> -->
                        <textarea name="address" class="form-control" placeholder="Address" rows="3" required>
                            <?php 
                            if($address_display == ''){
                                echo "$address_display";
                            }else{
                                foreach($address_display as $user_address ){
                                    echo "\r\n";                                
                                    echo "$user_address";
                                    echo "\r\n";
                                }
                            }
                             ?>
                        </textarea>
                    </div>
                    <p> Make sure all the information is right!</p>
                    <div class="submitbutton">
                        <button type="submit" name="save_btn" class="btn">Save</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
</html>