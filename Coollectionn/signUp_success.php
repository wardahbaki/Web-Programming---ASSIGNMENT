<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coollection Page</title>
    <style>
        body {
            background-image: url("wpp3.jpg"); /* Replace with your image path */
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
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
            margin-top: 20px;
            text-align: center;
        }

        h1 {
            color: brown;
        }

        p.success {
            color: blue;
        }

        p.error {
            color: red;
        }
        
        a {
            color: #5C2C06;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Registration Details</h1>
        <br><br>
        <?php
        $userid = $_POST["userID"];
        $userpwd = $_POST["password"];

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "coollection";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("Connection failed" . $conn->connect_error);
        } else {
            $DBquery = "INSERT INTO Users (UserID, UserPwd, UserType, UserStatus) 
                        VALUES('".$userid."','".$userpwd."', 'USER', 'Active')";
            
            if ($conn->query($DBquery) === TRUE) {
                echo "<p class='success'>Yeayy!! You have created your own account!</p>";
            } else {
                echo "<p class='error'>Error: Invalid query " . $conn->error . "</p>";
            }
        }
        $conn->close();
        ?>
        <br><br>
        Click <a href="login.html">here</a> to Login.
    </div>
</body>
</html>