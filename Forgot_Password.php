<?php
Include "register/index_forgot_password.php";
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create New Password - Bigtree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login_styles_second.css">
    <style>
    </style>
    <script>

    </script>
</head>

<body>

    <div class="bg-image"></div>
    <!-- <div class="header">
            <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"><h1> BIGTREE</h1>
        </div> -->

    <img src="imgs/final.JPG" alt="Bigtree_logo">

    <div class="login">
        <h2>Email Verification</h2>
        <form action="Forgot_Password.php" method="POST"> 
            <div class="login-parameters">
                <div class="input-field">
                    <!-- <label for="name"><b>Email</b></label><br /> -->
					<p>Enter your Email ID</p>
					<input id="email" type="text" placeholder="Email" name="email" required>
                </div>
             </div>
			<?php
				if(isset($_SESSION['message']))
				{
					display_message($_SESSION['message']);
				}
			?>
			 
            <button class="signInBtn" type="submit" name="frgt_btn">Confirm</button>
			
			<div style="margin-top: 20px;"> Login/Register? <button class="clickBtn" style="width:auto;" id="signupBtn"><a href="index.php">Click here</a></button>
                <!-- <button id="signupBtn" type="submit">Sign Up</button> -->
            </div>
			
        </form>
    </div>
	
	<div class="footer">
	<h4 style="text-align: center; font-family: Hei; ">Login/Registration - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h4>
	</div>
</body>

</html>