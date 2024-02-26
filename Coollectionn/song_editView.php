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
       
		input[type="submit"],
        input[type="reset"] {
            padding: 15px 15px; 
            background-color: #D4AB67;
            color: white;
            border: none;
            border-radius: 10px; 
            cursor: pointer;
            font-family: gerogia, serif;
			font-size:15px;
			width: 160px;
			;
		}
		
</style>

<body>
<center>
<div class="login-container">
<h1> <b style="color:#966919;Font-size:40px">Coollection Edit ✍🏻 </b></h1>
<h4> <b style="color:#AD3319;font-size: 17px;">Edit any of your song here </b></h4>
<br>

<form action="song_editDetails.php" method="POST" onsubmit="return confirm('Are you sure to edit this record?')">
<table border="1">
<tr>
	<th> Choose </th>
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
	$queryView = "SELECT *FROM SONG WHERE UserID = '".$_SESSION["UID"]."' ";
	$resultView = $conn->query($queryView);
	
	if ($resultView->num_rows > 0) {
		while($row = $resultView->fetch_assoc()){
?>

	<tr>
		<td> <input type="radio" name="SongID" value="<?php echo $row["SongID"]; ?>" required> </td>
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
		echo "<tr><th colspan='10' style='color:red;'>No Data Selected</td></tr>";
	}
}
$conn->close();
?>
</table>
<br>

<input  type="submit" value="View record to Edit">

</form>
</body>
</html>

<?php 
} 
else 
{ 
echo "No session exists or session has expired. Please 
log in again.<br>"; 
echo "<a href=login.html> Login </a>";
}
?>