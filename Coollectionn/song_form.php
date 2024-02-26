<?php
session_start();
if(isset ($_SESSION["UID"])) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset ="UTF-8">
<title> Coollection Page</title>
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
        input[type="link"]
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
        input[type="reset"] {
            padding: 10px 25px; 
            background-color: #eab676;
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
<h1> <b style="color:#BF8F00;"> Song Coollection Form </b></h1>
<h4> <b style="color:#AD3319;font-size: 20px;">Enter your song details here!: </b></h4>

<p><i><b style="color:red;font-size: 13px;">* ALL fields are required</b></i></p>

<form name="registerForm" action="song_register.php" method="POST">

Song Title: <input type="text" name="Title" maxlength="30" required>
<br><br>
Artist/Band Name: <input type="text" name="Artist_BandName" maxlength="30" required>
<br><br>
Link <i>(Audio/Video)</i>: <input type="url" name="Link" required>
<br><br>
Genre: <select name="Genre" required>
<option value="" disabled selected > - Song Genres - </option>
<option value="Jazz"> Jazz </option>
<option value="RnB"> RnB </option>
<option value="Pop"> Pop Music </option>
<option value="Ballad"> Ballad </option>
</select>
<br><br>
Language:
<input type="radio" name="Language" value="Malay"  checked> Malay
<input type="radio" name="Language" value="English" > English
<input type="radio" name="Language" value="Korean" > Korean
<input type="radio" name="Language" value="Japanese" > Japanese
<br><br>
Release Date: <input type="date" name="ReleaseDate" required>
<br><br>
<input type="submit" value="Display Song Details">
<input type="reset" value="Cancel">
</form>

      </center>
</body>
</html>
<?php
}
else 
{
  echo "No session exists of session has expired. Please log in again.<br>";
  echo"<a href='login.html'> Login </a>";
}
?>