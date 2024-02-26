<?php 
session_start(); 
$SongName = $_SESSION['song_name'];
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

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #997950;
            color: white;
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

        a {
            color: #5C2C06;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        input[type="text"],
        input[type="form"] {
			width: calc(100% - 600px); 
            padding: 10px; 
            margin-bottom: 15px;
            border: 1px solid #fbf0e4;
            border-radius: 20px; 
            font-size: 14px;
			margin-left:36px;
        }
        .login-container {

            width: 1070px;
            background-color: #f9e9d6;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			margin:0 auto;
			justify-content: center;
            align-items: center;
			margin-top: 20px;
            text-align: center;        
        }
        button{
            padding: 10px 20px; 
            background-color: #DAA06D;
            color: white;
            border: none;
            border-radius: 27px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 15px;
            width:85px
            
        }
    </style>
</head>

<body>
 <div class="login-container">
        <h2>🎵COOLLECTION SONG LIST🎵</h2>
    <br>
    <form action="searchsong.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">🔍</button>
    </form>
    </div>
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
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "coollection";

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error){
            die("connection failed:" . $conn->connect_error);
        } else {
            $queryView = "SELECT * FROM SONG WHERE Title LIKE '%$SongName%'";
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
                        <td><?php echo $row["Status"]; ?></td>
                    </tr>

        <?php
                }
            } else {
                echo "<tr><th colspan='9' style='color:black;'>Oops! Can't find what you're looking for. Try search again?</th></tr>";
            }
        }
        $conn->close();
        ?>
    </table>

    <br>
    <button onclick="window.location.href = 'menu.php'">Menu</button><br><br>
</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html>Login</a>";
}
?>