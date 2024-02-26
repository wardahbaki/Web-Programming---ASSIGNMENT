<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLLECTION</title>
    <link rel="stylesheet" type="text/css" href="user.css">
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
            font-family: 'Georgia', serif;
            color: #333;
        }

        .login-container {
            width: 350px;
            background-color: #f9e9d6;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #fbf0e4;
            border-radius: 20px;
            font-size: 14px;
        }

        button {
            padding: 10px 20px;
            background-color: #eab676;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-right: 10px;
            font-family: 'Georgia', serif;
        }
    </style>
</head>

<body>
    <center>
        <?php
        session_start();
        if (isset($_SESSION["UID"])) {
            session_unset();
            session_destroy();
        ?>
            <div class="login-container">
                <?php
                echo "<p style='color:red;'>You have successfully logged out.</p>";
                ?>
            </div>
            <br>
            <?php
            echo "<button onclick=\"window.location.href = 'login.html'\">LOGIN</button>";
            echo "<button onclick=\"window.location.href = 'home1.html'\">HOME</button>";
        } else {
            ?>
            <div class="login-container">
                <?php
                echo "<p style='color:red;'> No session exists or session is expired. Please log in again.</p>";
                ?>
            </div>
            <br><br>
            <?php
            echo "<button onclick=\"window.location.href = 'login.html'\">LOGIN</button>";
        }
        ?>
    </center>
</body>
</html>