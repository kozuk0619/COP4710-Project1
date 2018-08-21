<?php
include 'db.php';
session_start();
echo '<link rel="stylesheet" href="css/styles.css">';
$jobID = $_SESSION['jobid'];
//echo $jobID;
?>
<html>
<head>
<title>Succesful Post</title>
</head>
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Job Post Form</a>
</div>
<?php
	$checkbox1 = $_POST['check_list'];
	for($i=0; $i<sizeof($checkbox1); $i++){
		$hella = $checkbox1[$i];
		//echo $hella;
		$query3 = "insert into JobSkillSet (jobID, skill_id) values ($jobID, $hella)";
		//echo $query3;
		mysqli_query($mysqli, $query3);
		//echo "hell";
	}
	
echo "<h3>Your JobID is: $jobID. Don't worry, we'll still keep track of this for you.</h3>";
?>
<h3>Submission Successful!</h3>
<a href="profile.php"><button id="mybutton">Go Back</button></a>;
</body>
</html>
<?php
unset($_SESSION['jobid']);
?>
