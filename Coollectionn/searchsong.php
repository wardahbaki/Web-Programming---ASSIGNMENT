<?php
    session_start();
    $_SESSION['song_name'] = $_POST['search'];
    header('Location: searchsong_result.php');
    if (isset($_SESSION["UID"])) {

} else {
	?>
	<div style=" padding: 10px; width: auto; border-radius: 10px;  background-color: #f9e9d6;">
	<?php
	echo "<p style='color:red;'> No session exists or session is expired. Please log in again.</p>";
	?>
	</div>
	<br><br>
	<?php
	echo "<button onclick=\"window.location.href = 'login.html'\">LOGIN</button>";
}
?>