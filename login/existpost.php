<html>
<title>Current Post</title>
<link rel="stylesheet" href="css/styles.css">
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Current Job Posts</a>
</div>
<?php
session_start();
require 'db.php';
$repID = $_SESSION['repID'];
$query = "select * from JobPosting where repID = $repID";
$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	echo "<h3>JobID: " . $row['jobID'] . "&nbsp &nbsp &nbsp Position: " . $row['position_name'] . "&nbsp &nbsp &nbsp Date Posted: " . $row['date_posted'] . "</h3>";
} 
?>
<form action="#" method="post">
	<h3>To see all details of a job post, enter the JobID: <input type="text" name="jobid2">
		<input type="submit" name="submit" value="Submit"></h3>
</form>
<?php
if(isset($_POST['submit'])){
	$query7 = "select * from JobPosting where jobID = " . $_POST['jobid2'];
	$query9 = "select skill_id from JobSkillSet where jobID = " . $_POST['jobid2'];
	$result1 = mysqli_query($mysqli, $query7);
	$result2 = mysqli_query($mysqli, $query9);
	$row = $result1->fetch_assoc();
	if($row['type'] == 1){
		$type = "Full-time";}
	else if($row['type'] == 2){
		$type = "Part-time";}
	else if($row['type'] == 3){
		$type = "Internship";}
	else{
		$type = "";}
	echo "<h3>JobID: " . $row['jobID'] . "<br>Company Name: " . $row['company_name'] . "<br>Date Posted: " . $row['date_posted'] .
		"<br>Start Date: " . $row['start_date'] . "<br>Position Name: " . $row['position_name'] . "<br>Type: " . $type . 
		"<br>Description: " . $row['description'] . "<br>Salary: " . $row['salary'] . "<br>Country: " . $row['country'] .
		"<br>State: " . $row['state'] . "<br>City: " . $row['city'] . "</h3>";
	echo "<h3>Skills: </h3>";
	while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)){
		//echo $row['skill_id'];
		$result3 = $mysqli->query("select skill_name from Skills where skill_id = " . $row['skill_id']);
		$skillname = $result3->fetch_assoc();
		echo "<h4>" . $skillname['skill_name'] . "</h4>";
	}
//	echo "</h3>";
}
?>
<br><a href="urjobposts.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
