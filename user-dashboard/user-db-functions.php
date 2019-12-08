<?php
$db = mysqli_connect("localhost","root","","bigtree"); 
// or die('unable to connect');
    
// check password function for profile page
function check_password($password)
	{
		$response = "OK";	
		$uppercase = preg_match('`[A-Z]`',$password);  // at least one upper case
		$lowercase = preg_match('`[a-z]`',$password); // at least one lower case 
		$numbers = preg_match('`[0-9]`',$password); // at least one digit
		$special_Char = preg_match('/[^a-zA-Z\d]/', $password); //atleast one special char
		if(strlen($password)<7)
		{
			//$response = '<script type = "text/javascript"> alert("Password must be atleast 7 characters") </script>';
			$response = "Password must be 7 characters";
		}
		else if(!$uppercase)
		{
			//$response = '<script type = "text/javascript"> alert("Password must have atleast 1 capital letter") </script>';
			$response = "Password must have 1 capital letter";
		}
		else if(!$lowercase)
		{
			//$response = '<script type = "text/javascript"> alert("Password must have atleast 1 lower case letter") </script>';
			$response = "Password must have 1 lower case letter";
		}
		else if(!$numbers)
		{
			//$response = '<script type = "text/javascript"> alert("Password must have atleast 1 number") </script>';
			$response = "Password must have atleast 1 number";
		}
		else if(!$special_Char)
		{
			//$response = '<script type = "text/javascript"> alert("Password must have atleast 1 special character") </script>';
			$response = "Password must have atleast 1 special character";
		}
		return $response;
	}

	if(isset($_POST['pswd_btn']))
    {
	$email = $_POST['email'];
	$password = $_POST['pswd'];
	$conf_new_password = $_POST['conpswd'];
    if ($password == $conf_new_password) 
    {
        $password = md5($password);
        echo '<script type = "text/javascript"> alert(" id already registered try another Email id ") </script>';
            $sql_update = "UPDATE users SET password='$password' WHERE email='$email'";
            mysqli_query($db,$sql_update);
            //echo '<script type = "text/javascript"> alert("Password has been updated. Please login with updated credentials.") </script>';
            header("location: user-dashboard1.php");
    }
    else
    {
        echo '<script type = "text/javascript"> alert("New Password and confirm new password does not match ") </script>';
    }	
}

// Add Home block

if(isset($_POST['add-home-btn']))
{
    $home_name = $_POST['home-name'];	
    $address = $_POST['address'];
    $email=$_SESSION['email'];

    $sqlu ="SELECT id FROM users WHERE email='$email'";
    $q_run_user = mysqli_query($db,$sqlu);
    $user = mysqli_fetch_array($q_run_user);

    $sql = "INSERT into homes (home_name, address, user_id) values ('$home_name','$address',$user[id])";
    $user_res=mysqli_query($db,$sql);
    if(! $user_res ) {
        die('Could not get data: ' . mysqli_error($db));
     }
     else{
        header('location: user-dashboard1.php');
     }
}

// Add Room block

if(isset($_POST['add-room-btn']))
{ 
    $room_name = $_POST['room-name'];	
    $room_type = $_POST['room-type'];
    $home_id = $_POST['home-id'];

    $sqlr = "INSERT into rooms (room_name, room_type, home_id) values ('$room_name','$room_type','$home_id')";
    $room_res=mysqli_query($db,$sqlr);
    if(! $room_res ) {
        die('Could not get data: ' . mysqli_error($db));
        echo  mysqli_error($db);
    }else{
        header('location: user-dashboard1.php');
     }
}  

// Add Sensor block
if(isset($_POST['add-sensor-btn']))
{ 
    $sensor_name = $_POST['sensor-name'];	
    $sensor_status = $_POST['sensor-status'];
    $sensor_type = $_POST['sensor-type'];
    $room_id = $_POST['room-id'];
    
    $sqls = "INSERT into sensors (sensor_name, sensor_status, sensor_type, room_id) values ('$sensor_name','$sensor_status','$sensor_type','$room_id')";
    $room_res=mysqli_query($db,$sqls);
    if(! $room_res ) {
        die('Could not get data: ' . mysqli_error($db));
        echo  mysqli_error($db);
    }else{
        header('location: user-dashboard1.php');
     }
} 

// Update Sensor status
if(isset($_POST['update-sensor'])){

    $sensor_result= $_POST['update-sensor'];
    $sensor_result_decoded = json_decode($sensor_result, true);
    $sensorId = $sensor_result_decoded["id"];
    $sensorStatus = $sensor_result_decoded["status"];

    $sqlSensorUpdate = "UPDATE sensors SET sensor_status='$sensorStatus' WHERE sensor_id='$sensorId'";
    $update=mysqli_query($db,$sqlSensorUpdate);
        if($update) {
            header('location: user-dashboard1.php');
        }else{
            die('Could not get data: ' . mysqli_error($db));
            echo  mysqli_error($db);
        }
}

?>