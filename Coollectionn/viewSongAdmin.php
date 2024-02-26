<?php 
session_start(); 
//check if session exists 
if(isset($_SESSION["UID"])) { 
?>

<!DOCTYPE html>
<html>
<head>
<title> Coollection Page </title>
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
			margin-top: 20px
			
            
            
  }
  table {
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            border-collapse: collapse;
            width: 93%;
			justify-content: center;
            align-items: center;
			margin:0 auto;

            
        }


        th, td {
            padding: 6px;
            text-align: center;
            border: 3px solid #705132; 
        }

        tr:nth-child(odd){
            background-color: #dbc49a; 
            
        }
        tr:nth-child(even) {
            background-color: #F5DEB3; /* Light brown background color for even rows */
        }
        button{
            padding: 10px 20px; 
            background-color: #DAA06D;
            color: white;
            border: none;
            border-radius: 27px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: georgia, serif;
            font-size: 15px;
            width:85px
            
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
</style>

<body>
<div class="login-container">
	<center>
	
	<h1> <b style="color:#966919;">Coollection list</b></h1>
	</center>
<br>


    <form action="searchsong.php" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit">🔍</button>
    </form>
<table border="1">
<tr>
	<th> Song ID </th>
	<th> Title </th>
	<th> Artist/BandName </th>
	<th> Link </th>
	<th> Genre </th>
	<th> Language </th>
	<th> ReleaseDate </th>
	<th> UserID </th>
	<th> Status </th>
</tr>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "coollection";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}else {
	$queryView = "SELECT *FROM SONG ORDER BY ReleaseDate DESC";
	$resultView = $conn->query($queryView);
	
	if ($resultView->num_rows >0) {
		while($row = $resultView->fetch_assoc()){
?>

	<tr>
		<td> <?php echo $row["SongID"]; ?> </td>
		<td> <?php echo $row["Title"]; ?> </td>
		<td> <?php echo $row["Artist_BandName"]; ?> </td>
		<td><a href="<?php echo $row["Link"];?>" target=_blank>View Link</a></td>
		<td> <?php echo $row["Genre"]; ?> </td>
		<td> <?php echo $row["Language"]; ?> </td>
		<td> <?php echo $row["ReleaseDate"]; ?> </td>
		<td> <?php echo $row["UserID"]; ?> </td>
		<td> <?php echo $row["Status"]; ?> </td>
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
<br>
<center>
<button onclick="window.location.href = 'menu.php'">Menu</button><br><br>
</center
</body>
</html>
<?php
}
else
{
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>