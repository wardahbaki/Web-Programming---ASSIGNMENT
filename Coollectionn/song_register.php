<?php
session_start();
if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<title> Coollection Page</title>
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
            font-family: georgia, s
  }
  .login-container {

            width: 530px;
            background-color: #f9e9d6;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
            
  }
  table {
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            border-collapse: collapse;
            width: 80%;
            margin: 0px;
        }


        th, td {
            padding: 10px;
            text-align: center;
            border: 4px solid #705132; 
        }

        tr:nth-child(odd){
            background-color: #dbc49a; 
            
        }
        tr:nth-child(even) {
            background-color: #F5DEB3; /* Light brown background color for even rows */
        }
        button{
            padding: 11px 15px; 
            background-color: #BF8F00;
            color: white;
            border: none;
            border-radius: 10px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 15px;
            width:155px
            
        }
</style>

<?php
$Title = $_POST ["Title"];
$Artist_BandName = $_POST ["Artist_BandName"];
$Link = $_POST ["Link"];
$Genre = $_POST ["Genre"];
$Language = $_POST ["Language"];
$ReleaseDate = $_POST ["ReleaseDate"];


?>

<div class="login-container">
<h1> <b style="color:#BF8F00;">Song Registration Details </b> </h1>
<br>

<table border="2">
<tr>
<td> Song Title: </td><td><b style="color:purple;"> <?php echo $Title; ?></b></td>
</tr>
<tr>
<td> Artist/Band Name: </td><td><b> <?php echo $Artist_BandName; ?></b></td>
</tr> 
<tr>
<td> Audio/Video: </td><td><b><a href=<?php echo $Link; ?> target=_blank>View Link</a></b></td>
</tr> 
<tr>
<td> Genre: </td><td><b><?php echo $Genre; ?></b></td>
</tr> 
<tr>
<td> Language: </td><td><b> <?php echo $Language; ?></b></td>
</tr> 
<tr>
<td> Release Date: </td><td><b> <?php echo $ReleaseDate; ?> </b></td>
</tr> 
</table> 
<br><br>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "coollection";

$conn = new mysqli ($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed" . $conn->connect_error);
}

else {
  $DBquery = "insert into SONG (Title, Artist_BandName, Link, Genre, Language, ReleaseDate, UserID, Status) 
  VALUES('".$Title."','".$Artist_BandName."','".$Link."','".$Genre."','".$Language."','".$ReleaseDate."','".$_SESSION["UID"]."', 'Pending')";
  
  if ($conn->query($DBquery) === TRUE) {
    echo "<p style = 'color:#7C3030;font-size:18px;'> Your song has succesfully added! </p>";
  } else {
    echo "<p style = 'color:red;'> Error: Invalid query " . $conn-> error." </p>";
  }
}
$conn->close();
?>

<button onclick="window.location.href = 'song_form.php'">Register New Song</button>
<button onclick="window.location.href = 'viewsong.php'">View All Song</button><br><br>
<button onclick="window.location.href = 'menu.php'">Menu</button>
</head>
</html
<?php
}
else
{
echo "No session exists or session has expired. Please
log in again.<br>";
echo "<a href=login.html> Login </a>";
}
?>