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
            font-family: Arial, sans-serif;
            color: #5C2C06;
        }

        h2 {
            margin-bottom: 20px;
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
            font-family: georgia, serif;
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
        
    </style>
</head>

<body>
    <div class="container">
        <h2>Coollection Song List</h2>

        <form action="searchsong.php" method="POST">
            <p>Search Song Name here</p>
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>

        <form action="song_statusAdminEdit.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
            <table border="1">
                <tr>
                    <th>Choose</th>
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
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "coollection";

                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error){
                    die("connection failed:" . $conn->connect_error);
                } else {
                    $queryView = "SELECT * FROM SONG";
                    $resultView = $conn->query($queryView);

                    if ($resultView->num_rows > 0) {
                        while ($row = $resultView->fetch_assoc()) {
                ?>

                            <tr>
                                <td> <input type="radio" name="SongID" value="<?php echo $row["SongID"]; ?>" required> </td>
                                <td><?php echo $row["SongID"]; ?></td>
                                <td><?php echo $row["Title"]; ?></td>
                                <td><?php echo $row["Artist_BandName"]; ?></td>
                                <td><a href="<?php echo $row["Link"];?>" target=_blank> <?php echo $row["Link"];?> </td>
                                <td><?php echo $row["Genre"]; ?></td>
                                <td><?php echo $row["Language"]; ?></td>
                                <td><?php echo $row["ReleaseDate"]; ?></td>
                                <td><?php echo $row["UserID"]; ?></td>
                                <td><?php echo $row["Status"]; ?></td>
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
                <input id="edit-button" type="submit" value="View record to Edit">
                <button id="menu-button" onclick="window.location.href='menu.php'">Menu</button>
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