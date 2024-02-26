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

        h2 {
            color: #5C2C06;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #997950;
            color: white;
        }

        select {
            padding: 8px;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #997950;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #5C2C06;
        }
    </style>
</head>

<body>
    <h1>Coollection User List</h1>
    <br>

    <form action="user_updateStatusSave.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
        <table border="1">
            <tr>
                <th>UserID</th>
                <th>Status</th>
            </tr>

            <?php
            $userid = $_POST["UserID"];
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "coollection";

            $conn = new mysqli($host, $user, $pass, $db);
            if ($conn->connect_error) {
                die("connection failed:" . $conn->connect_error);
            } else {
                $queryView = "SELECT * FROM USERS WHERE UserID = '" . $userid . "'";
                $resultView = $conn->query($queryView);

                if ($resultView->num_rows > 0) {
                    while ($row = $resultView->fetch_assoc()) {
            ?>
                        <tr>
                            <td><?php echo $row["UserID"]; ?></td>
                            <td>
                                <select name="Status" id="Status">
                                    <option value="Active" <?php echo ($row["UserStatus"] == "Active") ? "selected" : ""; ?>>Active</option>
                                    <option value="Block" <?php echo ($row["UserStatus"] == "Block") ? "selected" : ""; ?>>Block</option>
                                </select>
                            </td>
                            <input type="hidden" name="id" value="<?php echo $row["UserID"]; ?>">
                        </tr>

            <?php
                    }
                } else {
                    echo "<tr><th colspan='2' style='color:red;'>No Data Selected</td></tr>";
                }
            }
            $conn->close();
            ?>
        </table>
        <br><br>
        <input type="submit" value="Update New Details">
    </form>
    <br>
</body>

</html>