<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Login and Registration
*/
session_start();

require 'dbConn.php';

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
			$response = '<script type = "text/javascript"> alert("Password must be 7 characters.") </script>';
		}
		else if(!$uppercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 capital letter.") </script>';
		}
		else if(!$lowercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 lower case letter.") </script>';
		}
		else if(!$numbers)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 number.") </script>';
		}
		else if(!$special_Char)
		{
			$response = '<script type = "text/javascript"> alert("Password must have atleast 1 special character.") </script>';
		}
		return $response;
	}

//Registration Code

if(isset($_POST['submit_btn']))
{
	/*$first_name = mysqli_real_escape_string($db,$_POST['first_name']);	
	$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$conf_password = mysqli_real_escape_string($db,$_POST['con_pswd']);*/
	//$user_type = $_POST['type'];
	
	$first_name = !empty($_POST['first_name']) ? trim($_POST['first_name']) : null;
	$last_name = !empty($_POST['last_name']) ? trim($_POST['last_name']) : null;
	$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
	$conf_password = !empty($_POST['con_pswd']) ? trim($_POST['con_pswd']) : null;
	$user_type = !empty($_POST['type']) ? trim($_POST['type']) : null;
	
	$validate_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	$response = check_password($password);
	if($response == "OK")
	{
		if ($password == $conf_password)
		{
			$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);
			if($validate_mail)
			{
				//check for unique email

				$sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
				$stmt = $pdo->prepare($sql);
    
				//Bind the provided email to our prepared statement.
				$stmt->bindValue(':email', $email);
    
				//Execute.
				$stmt->execute();
    
				//Fetch the row.
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
				if($row['num'] > 0)
				{
					echo '<script type = "text/javascript"> alert("Email id already registered try another Email id.") </script>';
				}
				else
				{
					//create users
					
					//$sql = "Insert into users (first_name, last_name, email, password) values (:first_name, :last_name, :email, :password)";
					$sql = "Insert into users (first_name, last_name, email, password, type) values (:first_name, :last_name, :email, :password, :type)";
					
					$stmt = $pdo->prepare($sql);
    
					//Bind our variables.
					$stmt->bindValue(':first_name', $first_name);
					$stmt->bindValue(':last_name', $last_name);
					$stmt->bindValue(':email', $email);
					$stmt->bindValue(':password', $hash_password);
					$stmt->bindValue(':type', 'User');
 
					//Execute the statement and insert the new account.
					$result = $stmt->execute();
					$_SESSION['email'] = $email;
					header("location: index.php");
										
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("Email ID is invalid. Please enter a valid email ID. ") </script>';
			}
		}	
		else
		{
		//failed
			echo '<script type = "text/javascript"> alert("Password and confirm password does not match.") </script>';
		}
	}	
	else
	{
		echo $response;
	}	
	
}

//login code
		
		if(isset($_POST['login_btn']))
		{	
			
			/*$email = mysqli_real_escape_string($db,$_POST['email']);	
			$password = mysqli_real_escape_string($db,$_POST['pswd']);
			$email = $_POST['email'];
			$password = $_POST['pswd'];	
			*/
			
			$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
			$passwordAttempt = !empty($_POST['pswd']) ? trim($_POST['pswd']) : null;
			
			//Retrieve the user account information for the given email.
			$sql = "SELECT id,password FROM users WHERE email = :email";
			$stmt = $pdo->prepare($sql);
    
			$stmt->bindValue(':email', $email);

			$stmt->execute();

			$user = $stmt->fetch(PDO::FETCH_ASSOC);
				

				/*$sqli = "SELECT * FROM users WHERE email='$email' AND password='$password'";	
				$sqli = "SELECT id,password FROM users WHERE email='$email'";
				$qrun = mysqli_query($db,$sqli);
				$qcheck = mysqli_num_rows($qrun); */

				if($user == true)
				{
					//$data = mysqli_fetch_array($qrun);
					if(password_verify($passwordAttempt, $user['password']))
					{	
						$_SESSION['email'] = $email;
						/*$check_user = "SELECT * FROM users WHERE email='$email'";
						$connect = mysqli_query($db,$check_user);	
						$navigate = mysqli_fetch_array($connect);*/
						$sql = "SELECT * FROM users WHERE email = :email";
						$stmt = $pdo->prepare($sql);
						$stmt->bindValue(':email', $email);
						
						$stmt->execute();
						$user = $stmt->fetch(PDO::FETCH_ASSOC);
						
						if($user['type'] == 'User')
						{
							//Navigating to user page
							header('location: user-dashboard/user-dashboard1.php'); //redirecting to user's home page.
						}
						else
						{	
							//Navigating to admin page
							header('location: admin-entrance/useradmin/show-user.php');
						}
					}
					else
					{
						echo '<script type = "text/javascript"> alert("Incorrect password.") </script>';
					}	
				}	
				else
				{
					echo '<script type = "text/javascript"> alert("Invalid email address or password. You might have to register first.") </script>';
				}
		}

?>