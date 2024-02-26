<?php 
session_start(); 

// Check if session exists 
if(isset($_SESSION["UID"])) { 
?>

<!DOCTYPE html>
<html lang="en">

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

        h1 {
            margin-bottom: 60px;
			text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #997950;
            color: white;
        }

        input[type="text"],
        button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #5C2C06;
        }

        .button-container {
            text-align: center;
        }

        #edit-button {
            background-color: #997950;
            color: white;
            padding: 8px 15px;
            margin: 10px;
            border: none;
            border-radius: 5px;
        }

        #edit-button:hover {
            background-color: #5C2C06;
        }

        #menu-button {
            background-color: #997950;
            color: white;
            padding: 8px 15px;
            margin: 10px;
            border: none;
            border-radius: 5px;
        }

        #menu-button:hover {
            background-color: #5C2C06;
        }

        a {
            color: #5C2C06;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
		
		select option[value="Approved"] {
            background-color: #49ac2b; 
        }

        select option[value="Rejected"] {
            background-color: #C62828; 
        }
		
    </style>
</head>

<body>
    <div class="container">
        <h1>Coollection Song List</h1>

        <form action="song_statusSave.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
            <table border="1">
                <tr>
                    <th>Song ID</th>
                    <th>Title</th>
                    <th>Artist/BandName</th>
                    <th>Link</th>
                    <th>Genre</th>
                    <th>Language</th>
                    <th>ReleaseDate</th>
                    <th>UserID</th>
                    <th>Status</th>
                </tr>

                <?php
                $SongID = $_POST["SongID"];
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "coollection";

                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error){
                    die("connection failed:" . $conn->connect_error);
                } else {
                    $queryView = "SELECT * FROM SONG WHERE SongID = '".$SongID."'";
                    $resultView = $conn->query($queryView);

                    if ($resultView->num_rows > 0) {
                        while ($row = $resultView->fetch_assoc()) {
                ?>

                            <tr>
                                <td><?php echo $row["SongID"]; ?></td>
                                <td><?php echo $row["Title"]; ?></td>
                                <td><?php echo $row["Artist_BandName"]; ?></td>
                                <td><?php echo $row["Link"]; ?></td>
                                <td><?php echo $row["Genre"]; ?></td>
                                <td><?php echo $row["Language"]; ?></td>
                                <td><?php echo $row["ReleaseDate"]; ?></td>
                                <td><?php echo $row["UserID"]; ?></td>
                                <td>
                                    <select name="Status" id="Status">
                                        <option value="Approved" <?php echo ($row["Status"] == "Approved") ? "selected" : ""; ?>>Approved</option> 
                                        <option value="Rejected" <?php echo ($row["Status"] == "Rejected") ? "selected" : ""; ?>>Rejected</option>
                                    </select>
                                </td>
                                <input type="hidden" name="id" value="<?php echo $row["SongID"]; ?>">
                            </tr>

                <?php
                        }
                    } else {
                        echo "<tr><th colspan='8' style='color:red;'>No Data Selected</td></tr>";
                    }
                }
                $conn->close();
                ?>
            </table>
            <br><br>
            <div class="button-container">
                <input type="submit" value="Update New Details">
            </div>
        </form>
    </div>
</body>

</html>

<?php 
} 
else 
{ 
    echo "No session exists or session has expired. Please log in again.<br>"; 
    echo "<a href=login.html> Login</a>";
}
?>