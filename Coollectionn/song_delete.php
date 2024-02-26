<!DOCTYPE html>
<html>
<head>
<style>
body {
            background-image: url("wpp3.jpg");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            justify-content: center;
            align-items: center;
            font-family: georgia, serif;
			display:flex
}
.login-container {

			width: 400px;
			background-color: #f9e9d6;
			padding: 40px;
			border-radius: 30px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			margin:0 auto;
			justify-content: center;
            align-items: center;
			}
</style>
<div class="login-container">
<title> Coollection Page </title>
</head>
<?php
$SongID = $_POST["UserID"];
?>

<body>
<center>
<h1> <b style="color:#966919;">Coollection Deleted</b></h1>
<br>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "coollection";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);	
}else 
{
	$queryDelete = "DELETE FROM SONG WHERE SongID = '".$SongID."' ";
	if ($conn->query($queryDelete) === TRUE) {
		echo "<p style='color:#A52A2A;'> Your selected song has been removed</p><br>"; 
		echo "<button onclick='location.href=\"viewsong.php\"' style='background-color:#966919; color:#fff;font-family: georgia, serif; border-radius: 10px; padding:10px; border:none; cursor:pointer;'>View Song List</button>";
	} else {
		echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
	}
}
$conn->close();
?>
<center>
</body>
</html>
