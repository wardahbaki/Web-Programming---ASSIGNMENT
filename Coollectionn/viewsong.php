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
			
            
            
  }
  table {
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            border-collapse: collapse;
            width: 95%;
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
            padding: 17px 20px; 
            background-color: #966919;
            color: white;
            border: none;
            border-radius: 10px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 18px;
            width:160px
            
        }
		
</style>

<center>
<body>
<div class="login-container">
<h1> <b style="color:#966919;">🎵Your Coollection Song List🎵</b></h1>
<br>
<b style="color:#A52A2A;"> Enjoy your song coollection! </b>
<br><br>
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
	$queryView = "SELECT *FROM SONG WHERE Status ='Approved'";

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
		echo "<tr><th colspan='9' style='color:red;'>No Data Selected</td></tr>";
	}
}
$conn->close();
?>
</table>
<br><br><br>
<button onclick="window.location.href = 'song_form.php'">Enter New Song</button>
<button onclick="window.location.href = 'song_deleteView.php'">Delete Songlist</button>
<button onclick="window.location.href = 'song_editView.php'">Edit Songlist</button>
<button onclick="window.location.href = 'menu.php'">Menu</button><br><br>
</body>
</html>


<?php 
} 
else 
{ 
echo "No session exists or session has expired. Please 
log in again.<br>"; 
echo "<a href=login.html> Login </a>";
}
?>