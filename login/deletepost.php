<?php
session_start();
require 'db.php';
?>
<html>
<title>Delete A Post</title>
<link rel="stylesheet" href="css/styles.css">
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Delete A Post</a>
</div>

<h3>To see all current posts, click <a href="existpost.php">here</a>.</h3>
<?php
$repID = $_SESSION['repID'];
$query = "select * from JobPosting where repID = $repID";
$result = mysqli_query($mysqli, $query); 
echo '<h3>Select a JobID to delete</h3>
	<h4><form action="#" method="post">';
while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        echo "<input type='radio' name='delpost' id='delpost'>" . $row['jobID'] . "<br>";
}
	echo "<br><input type='submit' value='Delete'></form></h4>";
?>

<!--<form action="#" method="post">
<h3>Enter the JobID of the post you want to delete: <input  type="text" name="delpost" id="delpost">
	<input type="submit" value="Submit" name="submit"></h3>
</form>-->
<?php
if(isset($_POST['submit'])){
	$query = "delete from JobSkillSet where jobID = " . $_POST['delpost'];
	if(mysqli_query($mysqli, $query)){
		$query2 = "delete from JobPosting where jobID = " . $_POST['delpost'];
		if(mysqli_query($mysqli, $query2)){
			echo "<h3>Deletion Successful</h3>";
		}
	}
	else{
		echo "<h3>Deletion Unsuccessful</h3>";
	}
}
?>
<br><a href="urjobposts.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
