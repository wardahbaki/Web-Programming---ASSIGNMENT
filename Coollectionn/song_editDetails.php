<?php
session_start();

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
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: georgia, serif;
           
        }
        .login-container {

            width: 418px;
            background-color: #f9e9d6;
            padding: 65px;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"],
        input[type="link"],
		input[type="url"]
         {
            width: calc(100% - 85px); 
            padding: 5px; 
            margin-bottom: 15px;
            border: 1px solid #fbf0e4;
            border-radius: 15px; 
            font-size: 16px; 
            align-items:center;
            text-align: center;
            vertical-align: middle;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }

        button{
            height:50px;
            padding: 10px 20px; 
            background-color: #eab676;
            color: white;
            border: none;
            border-radius: 10px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 15px;
            width:200px
        }
        input[type="submit"],
        input[type="reset"], {
            padding: 10px 25px; 
            background-color: #BF8F00;
            color: white;
            border: none;
            border-radius: 10px; 
            cursor: pointer;
            margin-right: 10px;
            font-family: gerogia, serif;
            font-size: 14px;
        }
       
        span.required {
            color: red;
        }
        i {
            color: red;
        }
		
		</style>
<body>
<center>
	<div class="login-container">
	<h1> <b style="color:#BF8F00;"> Coollection Edit </b></h1>

<p style="color:#964B00;"> Edit and update your song details  </p>

<?php 
$SongID=$_POST["SongID"];                
$host = "localhost";
$user = "root";
$pass = "";
$db = "coollection";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}else {
	$queryGet = "SELECT *FROM SONG WHERE SongID = '". $SongID."' ";
	$resultGet = $conn->query($queryGet);
	
	if ($resultGet->num_rows >0) {
?>


<form name="UpdateForm" action="song_editSave.php" method="POST">

<?php
while($row = $resultGet-> fetch_assoc()) {
?>

Song Id: <b><?php echo $row["SongID"]; ?></b>
<br><br>
Song Title: <input type="text" name="Title" value="<?php echo $row["Title"]; ?>" size="15"  required>
<br><br>
Artist/BandName: <input type="text" name="Artist_BandName" value="<?php echo $row["Artist_BandName"]; ?>" size="15"  required>
<br><br>
Link<i>(Audio/Video)</i>: <input type="url" name="Link" value="<?php echo $row["Link"]; ?>" size="15" min="5" required>
<br>

Genre: 
<?php $type = $row['Genre'];?>
 <select name="Genre" required autofocus>
	<option value=""> - Please Choose - </option>
	<option value="Jazz" <?php if ($type =="Jazz") echo "selected"; ?>> Jazz 
	</option>
	<option value="RnB" <?php if ($type =="RnB") echo "selected"; ?>> RnB 
	</option>
	<option value="Pop" <?php if ($type =="Pop") echo "selected"; ?>> Pop
	</option>
	<option value="Ballad" <?php if ($type =="Ballad") echo "selected"; ?>> Ballad
	</option>
</select>
<br><br>
Language: 
<?php $Language = $row['Language'];?>
<input type="radio" name="Language" value="Malay" <?php if ($Language == "Malay") echo "checked";?> > Malay
<input type="radio" name="Language" value="English" <?php if ($Language == "English") echo "checked";?> > English
<input type="radio" name="Language" value="Korean" <?php if ($Language == "Korean") echo "checked";?> > Korean
<input type="radio" name="Language" value="Japanese" <?php if ($Language == "Japanese") echo "checked";?> > Japanese
<br><br>
Release Date: <input type="date" name="ReleaseDate" value="<?php echo $row["ReleaseDate"]; ?>" required >
<br><br>
<input type="hidden" name="SongID" value="<?php echo $row['SongID'];?>">
<input type="Submit" value="Update New Song Details">

</form>

<?php
		}
	}
}
$conn->close();
?>

</body>
</html>

<?php
} else {
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href='login.html'> Login </a>";
}
?>