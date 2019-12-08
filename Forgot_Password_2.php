<?php
include "register/index_forgot_password_2.php";

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
    <script type="text/javascript">
		
    </script>
</head>

<body>

    <div class="bg-image"></div>
    <!-- <div class="header">
            <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"><h1> BIGTREE</h1>
        </div> -->

    <img src="imgs/final.JPG" alt="Bigtree_logo">


    <div class="login">
        <h2>Create New Password</h2>
        <form action="Forgot_Password_2.php" method="POST"> 
            <div class="login-parameters">
                 <div class="input-field">
                    <!--<label for="name"><b>Email</b></label><br /> -->
					<input type="email" value="<?php echo $_SESSION['email'];?>" name="email" required>
                </div>
                <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="New Password" name="pswd" required>
                </div>
				    <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Confirm New Password" name="conpswd" required>
                </div>

            </div>
			<?php
				if(isset($_SESSION['message']))
				{
					display_message($_SESSION['message']);
				}
			?>
			
            <button class="signInBtn" type="submit" name="frgt_btn"> <!--onclick="show_confirm()" value="Show confirm box"--> Save</button>
			
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