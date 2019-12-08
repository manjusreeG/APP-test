<?php
/*
* Project : DOMISEP
* Developer/s : Manjusree
* Date : 20/12/2018
* version : 1
* name: 

*/

session_start();

require('user-db-functions.php');
require('dbConn.php');

$db = mysqli_connect("localhost","root","","bigtree"); 

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
    <script type="text/javascript" src="user-db.js" defer></script>   
</head>

<body>
    <div class="header">
        <a href="logout.php"><img class="logo" src="logo.jpg" alt="logo" width="75" height="75"><span style="color:white;padding-top: 20px;position: absolute;font-size: 24px;">DOMISEP</span>
        </a>
        <ul>
            <li><a class="home_link" href="user-dashboard1.php" class="home-click" >
                    Home</a></li>
            <li><a class="faq_link" href="faq-page.php">
                    FAQ </a></li> 
            <li><a class="support_link" href="support-page.php">
                    Support</a></li>
            <li><a class="home_link" href="profile-page.php">
                    Profile</a></li>
            <li><a class="home_link" href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <?php
            $email=$_SESSION['email'];
            $sqlFetchUserID ="SELECT * FROM users WHERE email='$email'";
            $q_run_user = mysqli_query($db,$sqlFetchUserID);
            $user = mysqli_fetch_array($q_run_user);
        ?>
        <!-- Home content code  -->
        <div id="home-content" class="span10">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a><i class="icon-angle-right"></i></li>
            </ul>
            <div class="center-part">
                <h1 class="welcome-user">Hi <?php echo $user['first_name']; ?>, Welcome to your smart home!</h1>
                <div class="addHomeButton">
                    <a href="#fgj;jsdlg;sj" onclick="document.getElementById('addHomeModal').style.display='block'">
                        <span>
                            <img class="add-home" src="images\add-home.png" alt="Add home button" style="width:40px; height:40px; margin-right: 5px; margin-bottom: -15px;">
                        </span>
                        <span> Add new home </span>
                    </a>
                </div>
                
        <?php 
        // Fetch Home data from DB                            
        $sqlh = "SELECT * FROM homes WHERE user_id='$user[id]'";
        $result =  mysqli_query($db,$sqlh);
        
        if(! $result ) {
            die('Could not get data: ' . mysql_error());
        };
        foreach($result as ["home_id" => $home_id, "home_name" => $home_name])
        {
            echo '<div id="home-block" class="addHomeBlock custom_block" style="display: block;">
                <div class="thumbnail">';
            echo'<div class="addHomeHeading">'.$home_name.'</div>';
            // Fetch Room data from DB
            $sqlr = "SELECT * FROM rooms WHERE home_id='$home_id'";
            $result_room =  mysqli_query($db,$sqlr);
            if(! $result_room ) {
                die('Could not get data: ' . mysql_error());
            };
            echo '<div style="display: flex; flex-wrap: wrap;">';                
                foreach($result_room as ["room_id" => $room_id, "room_name" => $room_name, "room_type" => $room_type]){
                    echo '<div class="add-home-temp">';
                        echo '<div class="add-home-bck" style="background: whitesmoke; border: 1px solid;display: flex; width: 130px;">
                                <a href="#fgj;jsdlg;sj">
                                    <span>
                                        <img class="add-room" src="images/'.$room_type.'.png" alt="Add home button">
                                        <!-- <img class="add-home" src="add-home-dark.jpg" alt="Add home button"> -->
                                    </span>'.$room_name.'
                                </a>
                            </div>';
                        // Fetch Sensor data from DB                            
                        $sqls = "SELECT * FROM sensors WHERE room_id='$room_id'";
                        $result_sensor =  mysqli_query($db,$sqls);
                        if(! $result_sensor ) {
                            die('Could not get data: ' . mysql_error());
                        };
                        echo '<div id="mySidenav" class="sidenav">';
                        foreach($result_sensor as ["sensor_id" => $sensor_id, "sensor_name" => $sensor_name, "sensor_status" => $sensor_status, "sensor_type" => $sensor_type]){
                                $sensor_img = 'images/'.$sensor_type.'_on.png';    
                                if ($sensor_status == '1')
                                {
                                    $status = 'checked';
                                }else{
                                    $status = '';
                                }
                            echo'<div class="sensor-display">
                                <img src='.$sensor_img.'  alt="Add home button" style="margin:5px; margin-top:15px;" width="50" height="50">
                                <span style = "text-overflow: ellipsis; width: 100px; overflow: hidden;white-space: nowrap;">'.$sensor_name.'</span>
                                <div>
                                    <label class="switch">
                                        <input  type="checkbox"  '.$status.' id='.$sensor_id.' onChange=getSensorStatus('.$sensor_id.')>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>';
                        }
                        echo '<div class="sensor-display" onclick="document.getElementById(\'addSensorModal\').style.display=\'block\', getroomid('.$room_id.')">
                        <img src="images\add-sensor-alt.png" alt="Add home button" style="margin: 15px;"
                            width="50" height="50">
                        <span> Add Sensor</span>
                        </div>';
                    echo'</div> </div>';                           
                }
                echo " <div class=\"add-home-temp\"> <div style=\"width: 250px; height: 200px; background: white;display: inline-flex;\">,
                <a href=\"#\" id=\"add_homeid\" name='' onclick=\"document.getElementById('addRoomModal').style.display='block', gethomeid('".$home_id."')\">
                    <span>
                        <img class=\"add-room\" src=\"images/add-room-block.png\" alt=\"Add home button\">
                    </span>
                    Add new room
                </a>
                </div></div>
            </div>";
                    
                echo '</div> </div> </div> </div>';
        }
        ?>
            <!-- Add Home modal  -->
            <div id="addHomeModal" class="add-home-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add new home
                        </span>
                        <span class="close" onclick="document.getElementById('addHomeModal').style.display='none'">&times;</span></div>
                    <div class="container">
                    <div style="display: inline-flex;">
                        <span class="add-room-img">
                            <img class="add-room" id="add-room-image" src="images/add-home-block.jpg" alt="Add home button">
                        </span>
                        <span class="add-room-details">
                            <div class="input-field">
                                <input type="text" placeholder="Home Name" name="home-name" required>
                            </div>
                            <div class="input-field">
                                <input type="text" placeholder="Home Address" name="address" required>
                            </div>
                        </span>
                    </div>
                    <button class="add-btn"  name="add-home-btn" type="submit" onclick="document.getElementById('addHomeModal').style.display='none';">Add
                            home now
                    </button>
                    </div>
                </form>
            </div>

            <!-- Add Room modal  -->            
            <div id="addRoomModal" class="add-home-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add new room
                        </span>
                        <span class="close" onclick="document.getElementById('addRoomModal').style.display='none'">&times;</span></div>
                    <div class="container">
                        <div style="display: inline-flex;">
                            <span class="add-room-img">
                                <img class="add-room" id="add-room-image" src="images/add-room.png" alt="Add home button">
                            </span>
                            <span class="add-room-details">
                                <div class="input-field">
                                    <input type="text" placeholder="Room Name" name="room-name" required>
                                </div>
                                <div class="input-field">
                                    <select name="room-type" id="" style=""  onchange="change_valeur();">
                                        <option value="">Select Room type</option>
                                        <option value="living-room">Living</option>
                                        <option value="store-room">Store room</option>
                                        <option value="dining">Dining</option>
                                        <option value="bed-room">Bed room</option>
                                        <option value="bath-room">Bathroom</option>
                                        <option value="other-room">Others</option>

                                    </select>
                                </div>
                                  <div style="display:none">
                                    <input type="hidden" placeholder="Room type" id="home-id-pass"  name="home-id" required>
                                </div>
                            </span>
                        </div>
                        <button class="add-btn" name="add-room-btn" type="submit" onclick="document.getElementById('addRoomModal').style.display='none';">Add
                            Room now</button>
                    </div>
                </form>
            </div>
            
            <!-- Add sensor modal  -->
            <div id="addSensorModal" class="add-sensor-modal">
                <form class="add-modal-content animate" action="" method="POST">
                    <div>
                        <span style="text-align: center;" class="modal-title input-field">
                            Add new sensor
                        </span>
                        <span class="close" onclick="document.getElementById('addSensorModal').style.display='none'">&times;</span></div>
                    <div class="container">
                        <div style="display: inline-flex;">
                            <span class="add-sensor-img">
                                <img class="add-room" src="images/add-sen.png" alt="Add home button">
                            </span>
                            <span class="add-sensor-details">
                                <div class="input-field">
                                    <input type="text" placeholder="Sensor Name" name="sensor-name" required>
                                </div>
                                <div class="input-field">
                                    <select name="sensor-type">
                                        <option value="">Select Sensor type</option>
                                        <option value="light">Light</option>
                                        <option value="temperature">Temperature</option>
                                    </select>
                                    <!-- <input type="text" placeholder="Room type" name="room-type" required> -->
                                </div>
                                <div  style=" margin-left: 55%;">
                                    <label class="switch">
                                            <input type="checkbox" name="sensor-status" disabled>
                                            <span class="slider round"></span>
                                    </label>
                                </div>
                                <div style="display:none">
                                    <input type="text" placeholder="Sensor type" id="room-id-pass"  name="room-id" required>
                                </div>
                            </span>
                        </div>
                        <button class="add-btn" type="submit" name="add-sensor-btn" onclick="document.getElementById('addSensorModal').style.display='none';">Add
                            Sensor now</button>
                    </div>
                </form>
            </div>


    </div>
</body>

</html>