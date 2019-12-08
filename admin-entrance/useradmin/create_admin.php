<?php include('../functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Admin admin</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	 <!-- 添加控制show-users的样式代码 -->
    <link rel="stylesheet" type="text/css" href="../useradmin/style.css">
    <link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

    <link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
    <script type="text/javascript" src="../useradmin/searchbox/function.js"></script>
</head>
</head>
<body>
<div class="header">
    <!-- start: Header Menu Team logo -->
    <div class="logo">
        <a href="show-user.php"><img src="logo.jpg" style="float: left;width: 75px;height: 75px;"></a>
        <span style="float:left;color:white;padding:20px 20px;position:relative;font-family: Arial;font-size: 24px;margin-top: 10px;">ADMIN-DOMISEP</span>
    </div>
    <!-- end: Header Menu Team logo -->
    <ul class="top-nav" style="width: 75%;float: left;display: inline-block;">
        <?php //$row = mysqli_fetch_array($results) ?>
        <li><a href="show-user.php">User Management</a></li>
        <li><a href="create_admin.php">Add Admin</a></li>
        <li><a href="edit-faq.php">Edit FAQ</a></li>
        <li><a href="edit-condition.php">Privacy&Terms</a></li>
        <li><img src="../images/boss.png" style="margin:0px 0px 0px 280px;"></li>
       <div style="margin: 2px 2px;">
           

 <?php  //if (isset($_SESSION['first_name'])) : 
			
                $email=$_SESSION['email'];

                $sqlu ="SELECT * FROM users WHERE email='$email'";
                $q_run_user = mysqli_query($db,$sqlu);
                $user = mysqli_fetch_array($q_run_user);
				//$email=$_SESSION['email'];
                
			
			?>	
                <strong style="font-size: x-large;"><?php echo $user['first_name']; ?></strong>
                <small>
                    <i  style="color: #888;margin-right: 1px;">(<?php echo ucfirst($user['type']); ?>)</i>
                    <button class="logout_btn"><a href="../../index.php?logout='1'" style="text-decoration: none;">logout</a></button>
                 
                </small>

        </div>
        <?php ?>
    </ul>
</div>
	<h2 style="text-align: center;margin-top: 50px;">Add Admin</h2>
	<form method="post" action="create_admin.php">

		<?php //echo display_error(); ?>

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="first_name"  placeholder=""> 
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last_name" placeholder=""> 
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder=""> 
		</div>
		<!--<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<!-- <option value=""></option> 
				<option value="admin">Admin</option>
				<!-- <option value="user">User</option> 
			</select>
		</div>-->
		<div class="input-group">
			<label>Password</label>
			<input type="password" placeholder="" name="password">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" placeholder="" name="con_pswd">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Create admin</button>
		</div>
	</form>
	<div class="footer">
	<h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h5>
</div>
</body>
</html>