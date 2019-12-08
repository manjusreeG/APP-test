<?php

/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Forgot Password - Updating password 

*/

//session_start();

$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');


//Fucntion to check strength of password
	function check_password($password)
	{
		$response = "OK";	
		$uppercase = preg_match('`[A-Z]`',$password);  // at least one upper case
		$lowercase = preg_match('`[a-z]`',$password); // at least one lower case 
		$numbers = preg_match('`[0-9]`',$password); // at least one digit
		$special_Char = preg_match('/[^a-zA-Z\d]/', $password); //atleast one special char
		if(strlen($password)<7)
		{
			$response = '<script type = "text/javascript"> alert("Password must be atleast 7 characters") </script>';
			//$response = "Password must be 7 characters";
		}
		else if(!$uppercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 capital letter") </script>';
			//$response = "Password must have 1 capital letter";
		}
		else if(!$lowercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 lower case letter") </script>';
			//$response = "Password must have 1 lower case letter";
		}
		else if(!$numbers)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 number") </script>';
			//$response = "Password must have atleast 1 number";
		}
		else if(!$special_Char)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 special character") </script>';
			//$response = "Password must have atleast 1 special character";
		}
		return $response;
	}

	
	//Forgot Password
		
if(isset($_POST['pswd_btn']))
{

	/*$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	$password = !empty($_POST['pswd']) ? trim($_POST['pswd']) : null;
	$conf_new_password = !empty($_POST['conpswd']) ? trim($_POST['conpswd']) : null;
*/

	$email = $_POST['email'];
	$password = $_POST['pswd'];
	$conf_new_password = $_POST['conpswd'];
	
		if ($password == $conf_new_password) 
		{
			$response = check_password($password);
			if($response == "OK")
			{
				$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);

				$sql = "UPDATE users SET password='$hash_password' WHERE email='$email'";
				mysqli_query($db,$sql);
				header("location: user-dashboard1.php");
				
			}
			else
			{
					echo $response;
				//$_SESSION['message'] = $response;
			}	
		}
		else	
		{
			
			echo '<script type = "text/javascript"> alert("New Password and confirm new password does not match ") </script>';
				//$_SESSION['message'] = "New Password and confirm new password does not match";
		
		}
	
}	

//update profile section

if(isset($_POST['save_btn']))
{
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
			
	$sql = "UPDATE users SET first_name='$first_name',last_name='$last_name' WHERE email='$email'";
	mysqli_query($db,$sql);
	
	
	header("location: user-dashboard1.php");
					/*$stmt = $pdo->prepare($sql);
					$stmt->bindValue(':first_name', $first_name);
					$stmt->bindValue(':last_name', $last_name);
					$stmt->bindValue(':email', $email);
					$stmt->execute();
					//$user = $stmt->fetch(PDO::FETCH_ASSOC);
					//mysqli_query($db,$sql);
					//echo '<script type = "text/javascript"> alert("Password has been updated. Please login with updated credentials.") </script>';*/
					
			
}	
	
?>
