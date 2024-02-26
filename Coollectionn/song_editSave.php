<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Coollection Page</title>
</head>
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
<body>
    <center>
    <div class="login-container">
    <h1> <b style="color:#966919;">Coollection Edited</b></h1><br>


    <?php
    $SongID = $_POST["SongID"];
    $Title = $_POST["Title"];
    $Artist_BandName = $_POST["Artist_BandName"];
    $Link = $_POST["Link"];
    $Genre = $_POST["Genre"];
    $Language = $_POST["Language"];
    $ReleaseDate = $_POST["ReleaseDate"];

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "coollection";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $queryUpdate = "UPDATE SONG SET
            Title = '".$Title."', 
            Artist_BandName = '".$Artist_BandName."', 
            Link = '".$Link."', 
            Genre = '".$Genre."', 
            Language = '".$Language."', 
            ReleaseDate = '".$ReleaseDate."'   
            WHERE SongID = '".$SongID."'";

        if ($conn->query($queryUpdate) === TRUE) {
            echo "<p style='color:#A52A2A;'> Your selected song has been edited and save to database</p><br>"; 
            echo "<button onclick='location.href=\"viewsong.php\"' style='background-color:#966919; color:#fff;font-family: georgia, serif; border-radius: 10px; padding:10px; border:none; cursor:pointer;'>View Song List</button>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    $conn->close();
    ?>
</center>

</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'>Login</a>";
}
?>