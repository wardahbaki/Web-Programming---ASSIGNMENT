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
            font-family: 'Arial', sans-serif;
            color: #5C2C06;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            margin-top: 50px;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
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
        <h2>🎵 COOLLECTION SONG LIST 🎵</h2>
	</div>
	
	<div class="container">
        <h2>USER STATUS UPDATE</h2>

        <?php
        $userid = $_POST["id"];
        $Status = $_POST["Status"];

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "coollection";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $queryUpdate = "UPDATE USERS SET UserStatus = '".$Status."' WHERE UserID = '".$userid."'";

            if ($conn->query($queryUpdate) === TRUE) {
                echo "<p>The User status has been updated!<br><br>";
                echo "<button onclick=\"window.location.href = 'user_updateStatusView.php'\">View User Status</button>";
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