<?php
session_start();
// check if session exists
if (isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
		}

        th,
        td {
            padding: 25px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #997950;
            color: white;
        }

        input[type="radio"] {
            margin: 0 auto;
        }

        input[type="submit"],
        button {
            background-color: #997950;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #5C2C06;
        }

        .button-container {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            width: 95%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        button.menu-button {
            margin-top: 10px; 
        }

        h2 {
            color: #5C2C06; 
        }
    </style>
</head>

<body>
    <h1>🎵 Coollection Song List 🎵</h1>
    <br>

    <form action="user_updateStatusDetail.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
        <table border="1">
            <tr>
                <th>Choose</th>
                <th>UserID</th>
                <th>Status</th>
            </tr>

            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "coollection";

            $conn = new mysqli($host, $user, $pass, $db);
            if ($conn->connect_error) {
                die("connection failed:" . $conn->connect_error);
            } else {
                $queryView = "SELECT * FROM USERS WHERE UserType = 'User'";
                $resultView = $conn->query($queryView);

                if ($resultView->num_rows > 0) {
                    while ($row = $resultView->fetch_assoc()) {
            ?>
                        <tr>
                            <td><input type="radio" name="UserID" value="<?php echo $row["UserID"]; ?>" required></td>
                            <td><?php echo $row["UserID"]; ?></td>
                            <td><?php echo $row["UserStatus"]; ?></td>
                        </tr>
            <?php
                    }
                } else {
                    echo "<tr><th colspan='10' style='color:red;'>No Data Selected</th></tr>";
                }
            }
            $conn->close();
            ?>
        </table>
        <br>
        <div class="button-container">
            <input type="submit" value="View record to Edit">
            <button class="menu-button" onclick="window.location.href='menu.php'">Menu</button>
        </div>
    </form>
</body>

</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html>Login</a>";
}