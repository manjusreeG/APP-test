<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Forgot Password - Email verification

*/

session_start();

//$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

require 'dbConn.php';


function display_message()
{
	echo '<div class="msg" style=color:red;margin-right:28px;font-weight:normal;">';
	echo '<p>'.$_SESSION['message'].'</p>';
	unset($_SESSION['message']);
	echo '</div>';
}
	
	//Forgot Password - verifying if email id already exists.
		
if(isset($_POST['frgt_btn']))
{
	//$email = $_POST['email'];
	$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	
	$validate_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
	//check if email id already exists in DB
			if($validate_mail)
			{
				$sql = "SELECT * FROM users WHERE email= :email";
				$stmt = $pdo->prepare($sql);
    
				//Bind value.
				$stmt->bindValue(':email', $email);
    
				//Execute.
				$stmt->execute();
    
				//Fetch row.
				$user = $stmt->fetch(PDO::FETCH_ASSOC);

				if($user == true)
				{
					//$_SESSION['email'] = $email;
					$_SESSION['email'] = $user['email'];
					header("location:Forgot_Password_2.php");
				}
				else
				{
					//echo '<script type = "text/javascript"> alert("Email ID does not exist. Please register first.") </script>';
					$_SESSION['message'] = "Email ID does not exist. Please register first.";
				}
			}
			else
			{
				$_SESSION['message'] = "Email ID is invalid. Please enter a valid email ID.";
				//echo '<script type = "text/javascript"> alert("Email ID is invalid. Please enter a valid email ID. ") </script>';
			}			
}	
	
?>