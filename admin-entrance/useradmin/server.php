<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'bigtree');


	// initialize variables
	$id = 0;
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";
	$address = "";
	$type = "";
	$update = false;
	$update_terms = false;
	$change_password = true;
	
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
		
if(isset($_POST['update_btn']))
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
				header("location: show-user.php");
				
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
	

	// edit FAQ
	if (isset($_POST['save_post'])) {
		$faq_text = $_POST['faq_text'];
	
		mysqli_query($db, "INSERT INTO faq (id, faq_text) VALUES ('$id','$faq_text')");
		$_SESSION['message'] = "FAQ information saved";
		header('location: show-faq.php');
	}
	if (isset($_POST['update_post'])) {
		$faq_text = $_POST['faq_text'];
	
		mysqli_query($db, "UPDATE faq SET (id, faq_text) VALUES ('$id','$faq_text')");
		$_SESSION['message'] = "FAQ information saved";
		header('location: show-faq.php');
	}
	if (isset($_GET['delete_post'])){
	    $id = $_GET['delete_post'];
        mysqli_query($db, "DELETE FROM faq WHERE id=$id");
        $_SESSION['message'] = "FAQ information deleted";
        header('location: show-faq.php');
    }

	// edit terms and conditions
	if (isset($_POST['save_terms'])) {
		$terms_text = $_POST['terms_text'];
	
		mysqli_query($db, "INSERT INTO terms (id, terms_text) VALUES ('$id','$terms_text')");
		$_SESSION['message'] = "Terms information saved";
		header('location: show-conditions.php');
	}
	if (isset($_POST['update_terms'])) {
		$faq_text = $_POST['terms_text'];
	
		mysqli_query($db, "UPDATE terms SET (id, terms_text) VALUES ('$id','$terms_text')");
		$_SESSION['message'] = "Terms information saved";
		header('location: show-conditions.php');
	}
    if (isset($_GET['delete_terms'])){
        $id = $_GET['delete_terms'];
        mysqli_query($db, "DELETE FROM terms WHERE id=$id");
        $_SESSION['message'] = "Terms deleted";
        header('location: show-conditions.php');
    }

	if (isset($_POST['save'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		// $password = md5($_POST['password']);
		$password = $_POST['password'];
		$address = $_POST['address'];
		$type = $_POST['type'];

		mysqli_query($db, "INSERT INTO users (first_name,last_name,email,password,type) VALUES ('$first_name','$last_name','$email','$password','$type')");
		$_SESSION['message'] = "User infomation saved";
		header('location: show-user.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		// $con_pswd = md5($_POST['con_pswd']);
		$type = $_POST['type'];

		mysqli_query($db, "UPDATE users SET first_name='$first_name',last_name='$last_name',email='$email',password='$password',type='$type' WHERE id=$id");
		$_SESSION['message'] = "Profile infomation updated!"; 
		header('location: show-user.php');
	}

	/*if (isset($_POST['change_password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		mysqli_query($db, "UPDATE users SET new_password='$password' WHERE id=$id");
		$_SESSION['message'] = "Password successfully changed!"; 
		header('location: show-user.php');
	}*/

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM users WHERE id=$id");
		$_SESSION['message'] = "User has been deleted!";
		header('location: show-user.php');
	}
	if (isset($_GET['page'])) {
    		$page = (int) $_GET['page'];
		} else {
   		 	$page = 1;
	}

	//Delete  conditions and faq

	if(isset($_POST['Delete_last_btn'])){
	$id = $_GET['Delete_last_btn'];
	mysqli_query($db, "DELETE FROM faq WHERE id=$id");
	$_SESSION['message'] = "FAQ has been deleted!";

//	$delete = "DELETE FROM terms ORDER BY id DESC LIMIT 1"; // "Insert into terms (value) values ('$Terms')";
//	mysqli_query($db,$delete);
	
	header("location: show-faq.php");
	}


	if(isset($_POST['Delete_all_btn'])){

	$delete = "TRUNCATE TABLE terms"; // "Insert into terms (value) values ('$Terms')";
	mysqli_query($db,$delete);

	header("location: show-faq.php");
	}

	$results = mysqli_query($db, "SELECT * FROM users ORDER BY id DESC");


?>