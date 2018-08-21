<?php
session_start();
require 'db.php';
$id5 = $_SESSION['id'];
$query5 = "select repID from CompanyRep where id = $id5";
$result = $mysqli->query($query5);
$repid5 = $result->fetch_assoc();
$_SESSION['repID'] = $repid5['repID'];
?>
<html>
<title> Your Job Posts</title>
<link rel="stylesheet" href="css/styles.css">
<body>
	<div class="topnav" id="myTopnav">
		<a href="#home" class="active">Your Job Postings</a>
	</div>
	<br><a href="jobpost.php"><button id="mybutton">New Job Post</button></a>
	<br><a href="existpost.php"><button id="mybutton">Current Job Posts</button></a>
	<br><a href="deletepost.php"><button id="mybutton">Delete A Job Post</button></a>
	<br><a href="modpost.php"><button id="mybutton">Modify a Job Post</button></a>
	<br><a href="profile.php"><button id="mybutton">Go Back</button></a>


</body>
</html>
