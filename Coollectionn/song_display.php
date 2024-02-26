<?php
session_start();

if(isset($_SESSION["UID"])) {
?>

<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device=width, initial-scale=1.0">
            <title> Coollection Page </title>
</head>

<?php
    $Title = $_POST ["Title"];
    $Artist_BandName = $_POST ["Artist_BandName"];
    $Link = $_POST ["Link"];
    $Genre = $_POST ["Genre"];
    $Language = $_POST ["Language"];
    $ReleaseDate = $_POST ["ReleaseDate"];
?>

<body>
    <h1> <b style="color:pink;">Song Registration Details </b> </h1>

    <table border="2">
        <tr>
            <td> Song Title: </td><td><b style="color:purple;"> <?php echo $Title; ?></b></td>
        </tr>
        <tr>
            <td> Artist/Band Name: </td><td><b> <?php echo $Artist_BandName; ?></b></td>
        </tr> 
        <tr>
            <td> Audio/Video: </td><td><b><a style="color:blue;"> <?php echo $Link; ?></b></td>
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
    <p> Click <a href="song_form.php"> here </a> to enter new song details. </p>
</body>
</html>
<?php
}
else
{
    echo "No session exists or session has expired. Please log in again.<br>";
    echo "<a href=login.html> Login </a>";
}
?>