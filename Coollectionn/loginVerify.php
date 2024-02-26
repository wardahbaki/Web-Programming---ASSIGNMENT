<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLLECTION</title>
    <link rel="stylesheet" type="text/css" href="user.css">
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
            font-family: 'Georgia', serif;
            color: #333;
        }

        .login-container {
            width: 350px;
            background-color: #f9e9d6;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #fbf0e4;
            border-radius: 20px;
            font-size: 14px;
        }

        button {
            padding: 10px 20px;
            background-color: #eab676;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-right: 10px;
            font-family: 'Georgia', serif;
        }
    </style>
</head>
<body>

<?php 

$userID = $_POST['userID']; 
$UserPwd = $_POST['userPwd']; 
 
$host = "localhost"; 
$user = "root"; 
$pass = ""; // please write the password if any 
$db = "coollection";// please write your DB name that you have created 
//create connections with DB 
$conn = new mysqli($host, $user, $pass, $db); 
if ($conn->connect_error) { //to check if DB connection IS NOT OK 
 die("Connection failed: " . $conn->connect_error); // display MySQL error 
} 
else 
{ 
 //connect successfully 
 //check userID is exist 
 $queryCheck = "select * from USERS where UserID = '".$userID."' "; 
 $resultCheck = $conn->query($queryCheck); 
 if ($resultCheck->num_rows == 0) {
   ?>
   <div class="login-container">
      <?php
 echo "<p style='color:red;'>User ID does not exist </p>"; 
 echo "<button onclick=\"window.location.href = 'login.html'\">Log In Again</button>"; 
 ?>
 </div>
 <?php
 } 
 else 
 { 
 $row = $resultCheck->fetch_assoc(); 
 
 // check if password database = password user enter 
 if( $row["UserPwd"] == $UserPwd ) 
 { //calling the session_start() is compulsory 
   if( $row["UserStatus"] == "Active" ) {
    session_start(); 
    //assign userid & usertype value to session variable 
    $_SESSION["UID"] = $userID ; 
    $_SESSION["UserType"] = $row["UserType"]; 
    
    
   header("Location:menu.php"); 
} else { 
    ?>
    <div class="login-container">
      <?php
   echo "<p style='color:red;'>You have been blocked! </p>"; 
   echo "<button onclick=\"window.location.href = 'login.html'\">Log In Again</button>";; 
   }
    } else { 
    
    echo "<p style='color:red;'>Wrong password!!! </p>"; 
    echo "<button onclick=\"window.location.href = 'login.html'\">Log In Again</button>";; 
    } 
    } 
   } 
   $conn->close(); 
   ?>
   </body>
   </html>