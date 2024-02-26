<?php
session_start();

if(isset ($_SESSION["UID"])) 
{
?><!DOCTYPE html>
<html>
<head>
    <title>COOLLECTION</title>
    <style>
        body {
            background-image: url("wpp3.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: georgia, serif;
           
        }
        .login-container {

            width: 290px;
            background-color: #f7f1ea;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			text-align: center;
			
        }
        label {
            display: block;
            margin-bottom: 10px;
        }

        button{
            height:60px;
            padding: 15px 25px; 
            background-color: 	#997950;
            color: white;
            border: none;
            border-radius: 25px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 17px;
            width:200px
        }
       
        span.required {
            color: red;
        }
        i {
            color: red;
        }
    </style>
</head>
<body>

<div class="login-container">
<?php
	if ($_SESSION["UserType"] == "Admin") {
	?>
	<h1> <b style="color:#5C2C06;"> Welcome back! Hi Admin </b></h1>
	<?php
	} else {
	?>
	<h1><b style="color:#5C2C06;">Welcome back! Hi <?php echo $_SESSION["UID"];?></b></h1>
	<?php
	}
	?>
</center>
<?php
	if ($_SESSION["UserType"] == "ADMIN") {
	?>
	<button onclick="window.location.href = 'viewSongAdmin.php'">View Song List</button><br><br>
    <button onclick = "window.location.href = 'song_statusAdminEditView.php'"> Update Song Status</button><br><br>
	<button onclick = "window.location.href = 'user_updateStatusView.php'"> Update User Status</button><br><br>
	<?php
	} else {
	?>
	
	<h3><b style="color:#795C32;">Please Choose ^_^ :</h3>
	<center>
	<button onclick="window.location.href = 'song_form.php'">Register Song</button><br><br>
	<button onclick="window.location.href = 'song_editView.php'">Edit Registered Song</button><br><br>
	<button onclick="window.location.href = 'song_deleteView.php'">Delete Registered Song</button><br><br>
	<button onclick="window.location.href = 'viewsong.php'">View ALL Songs</button><br><br>
	<?php
	}
	?>
	<button onclick="window.location.href = 'logout.php'">Logout</button><br><br>
</center>
</div>

</body>
</html>
<?php
} else {
	echo "No session exists or session has expired. Please Log in again.<br>";
	echo "<a href = 'login.html'> Login </a>";
}
?>