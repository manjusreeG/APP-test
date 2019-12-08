<?php
include "Register/index_register.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login/Registration - BigTree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login_styles.css">
    <style>
    </style>
    <script>
    </script>
</head>

<body>
<!--<div class="content">-->
    <div class="bg-image"></div>

    <img src="imgs/final.JPG" alt="Bigtree_logo">

    <div id="signupModal" class="modal">
        <form class="modal-content animate" action="index.php" method="POST">
            <div>
                <span style="text-align: center;" class="registration_title input-field">
                    Registration
                </span>
                <span class="close" onclick="document.getElementById('signupModal').style.display='none'">&times;</span></div>
            <div class="container">
                <div class="input-field">
                    <!-- <label for="fname"><b>First Name:</b></label><br /> -->
                    <input type="text" placeholder="First Name" name="first_name" required>
                </div>

                <div class="input-field">
                    <!-- <label for="lname"><b>Last Name:</b></label><br /> -->
                    <input type="text" placeholder="Last Name" name="last_name" required>
                </div>

                <div class="input-field">
                    <!-- <label for="mailid"><b>E-mail:</b></label><br /> -->
                    <input type="text" placeholder="Email" name="email" required>
                </div>

                <div class="input-field">
                    <!-- <label for="pswd"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <div class="input-field">
                    <!-- <label for="con-pswd"><b>Confirm Password</b></label><br /> -->
                    <input type="password" placeholder="Confirm Password" name="con_pswd" required>
                </div> 
				
				<div class="check">
                     <!--<label for="con-pswd"><b>Confirm Password</b></label><br /> -->
                    <input type="checkbox" name="terms" required> I agree to the <a href="TnC/conditions.php">Terms & Conditions</a></input>
                </div>

                <button class="signupBtn" type="submit" name="submit_btn">Sign Up</button>

            </div>
        </form>
    </div>
<!--</div>-->	

    <div class="login">
        <h1>Log In</h1>
        <form action="index.php" method="POST"> 
            <div class="login-parameters">
                <div class="input-field">
                    <!-- <label for="name"><b>Email</b></label><br /> -->
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Password" name="pswd" required>
                </div>
                <div style="margin-top: 10px; margin-left: 8%">
                    <a href="Forgot_Password.php">Forgot Password?</a>
                </div>
            </div>
            <button class="signInBtn" type="submit" name="login_btn" >Sign In</button>
            <div style="margin-top: 20px;"> Haven't registered yet? <button class="clickBtn" onclick="document.getElementById('signupModal').style.display='block'"
                    style="width:auto;" href="" id="signupBtn">Click
                    here</button>
                <!-- <button id="signupBtn" type="submit">Sign Up</button> -->
            </div>
        </form>
    </div>
	
	<div class="footer">
	<h4 style="text-align: center; font-family: Hei; ">Login/Registration - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h4>
	</div>

</body>

</html>