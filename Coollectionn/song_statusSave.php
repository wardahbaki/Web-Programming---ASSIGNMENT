<?php
session_start();
//check if session exists
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html> 
<html>
<head>
    <title>Coollection Page</title>
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
            flex-direction: column; 
            font-family: Arial, sans-serif;
            color: #5C2C06;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 5px;
            border-radius: 25px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            margin-bottom: 30px; 
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            color: #E08115;
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
    </style>
</head>

<body>
    <div class="container">
        <h2>🎵COOLLECTION SONG LIST🎵</h2>
    </div>
    <div class="container">
        <h2>SONG STATUS UPDATE</h2>

        <?php
        $SongID = $_POST["id"];
        $Status = $_POST["Status"];

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "coollection";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $queryUpdate = "UPDATE SONG SET Status = '".$Status."' WHERE SongID = '".$SongID."'";

            if ($conn->query($queryUpdate) === TRUE) {
                echo "<p style='color:#E08115;'>The song status has been updated!<br><br>";
                echo "<button onclick=\"window.location.href = 'song_statusAdminEditView.php'\">View Song List</button>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'>Login</a>";
}
?>