<html>
<title>Modify</title>
<link rel="stylesheet" href="css/styles.css">
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Modify A Job Post</a>
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
<form action="#" method="get">
	<h3>To see all details of a job post, enter the JobID: <input type="text" name="jobid2">
		<input type="submit" name="submit" value="Submit"></h3>
</form>
<?php
if(isset($_GET['submit'])){
	$_SESSION['jobid2'] = $_GET['jobid2'];
	$query7 = "select * from JobPosting where jobID = " . $_GET['jobid2'];
	$query9 = "select skill_id from JobSkillSet where jobID = " . $_GET['jobid2'];
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
		"<br>Description: " . $row['description'] . "<br>Salary: $" . $row['salary'] . "<br>Country: " . $row['country'] .
		"<br>State: " . $row['state'] . "<br>City: " . $row['city'] . "</h3>";
	echo "<h3>Skills: </h3>";
        while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)){
                //echo $row['skill_id'];
                $result3 = $mysqli->query("select skill_name from Skills where skill_id = " . $row['skill_id']);
                $skillname = $result3->fetch_assoc();
		echo "<h4>" . $skillname['skill_name'] . "</h4>";
        }
echo '
<form action="#" method="get">
	<h3>Which field would you like to modify? <select name="mod_field" id="mod_field">
							<option value="NULL"></option>
							<option value="company_name">Company Name</option>
							<option value="start_date">Start Date</option>
							<option value="position_name">Position Name</option>
							<option value="type">Job Type</option>
							<option value="description">Job Description</option>
							<option value="salary">Salary</option>
							<option value="country">Country</option>
							<option value="state">State</option>
							<option value="city">City</option>
							<option value="skills">Skills</option>
						</select> <input type="submit" name="good" value="Submit"></h3> 
</form>';
}
if(isset($_GET['good'])){
	$choice = $_GET['mod_field'];
	$_SESSION['choice'] = $choice;
	//echo $choice;
	if($choice == "company_name" || $choice == "position_name" || $choice == "description" || 
		$choice == "country" || $choice == "state" || $choice == "city"){
		echo '
<form action="#" method="get">
	<h3>Enter the new value: <input type="text" name="newval" id="newval">
	<input type="submit" name="submit3" value="Submit"></h3>
</form>';
	}
	else if($choice == "start_date"){
		echo '
<form action="#" method="get">
        <h3>Enter the new date (yyyy-mm-dd): <input type="text" name="newval" id="newval">
        <input type="submit" name="submit3" value="Submit"></h3>
</form>';
	}
	else if($choice == "salary"){
		echo '
<form action="#" method="get">
        <h3>Enter the new value: $<input type="number" name="newval" id="newval">
        <input type="submit" name="submit3" value="Submit"></h3>
</form>';
	}
	else if($choice == "type"){
		echo '
		<form action="#" method="get">
			<h3>Job Type: <select name="newval" id="newval">
                                <option value=0></option>
                                <option value=1>Full-time</option>
                                <option value=2>Part-time</option>
                                <option value=3>Internship</option>
                            </select> <input type="submit" name="submit3" value="Submit"></h3>
		</form>';
	}
	else if($choice == "skills"){
		echo '
			<form action="#" method="get">
				<h3>How do you want to modify the skills? <select name="newval" id="newval">
									<option value=0></option>
									<option value=1>Add Skills</option>
									<option value=2>Delete Skills</option>
								</select> <input type="submit" name="submit4" value="Submit"></h3>
			</form>';
}
}
if(isset($_GET['submit4'])){
	if($_GET['newval'] == 2){
		$query4 = "select skill_id from JobSkillSet where jobID = " . $_SESSION['jobid2'];
        	$result6 = mysqli_query($mysqli, $query4);
       		echo "<h3>Select the skill(s) you want to delete: <br>";
		echo '<form action="#" method="get">';
        	while($row = mysqli_fetch_array($result6, MYSQL_ASSOC)){
                	//echo $row['skill_id'];
			//if($_GET['newval'] == 2){
                		$result3 = $mysqli->query("select skill_name from Skills where skill_id = " . $row['skill_id']);
                		$skillname = $result3->fetch_assoc();
                		//echo "<h4>" . $skillname['skill_name'] . "</h4>";
				echo "<input type='checkbox' name='chk[]' value=" . $row['skill_id'] . "><label>" . $skillname['skill_name'] . "</label><br>";
		}
		echo '<input type="submit" name="submit5" value="Submit">';
	}
	else if($_GET['newval'] == 1){
				echo '<h3>Select the skills you would like to add:<br>
	<form action="#" method="get">
	<input type = "checkbox" name="check_list[]" value="1"><label>C++</label><br/>
        <input type = "checkbox" name="check_list[]" value="2"><label>C</label><br/>
        <input type = "checkbox" name="check_list[]" value="3"><label>Python</label><br/>
        <input type = "checkbox" name="check_list[]" value="4"><label>Java</label><br/>
        <input type = "checkbox" name="check_list[]" value="5"><label>HTML</label><br/>
        <input type = "checkbox" name="check_list[]" value="6"><label>Javascript</label><br/>
        <input type = "checkbox" name="check_list[]" value="7"><label>Ruby</label><br/>
        <input type = "checkbox" name="check_list[]" value="8"><label>PHP</label><br/>
        <input type = "checkbox" name="check_list[]" value="9"><label>CSS</label><br/>
        <input type = "checkbox" name="check_list[]" value="10"><label>Front-end Development</label><br/>
        <input type = "checkbox" name="check_list[]" value="11"><label>Back-end Development</label><br/>
        <input type = "checkbox" name="check_list[]" value="12"><label>Object Oriented</label><br/>
        <input type = "checkbox" name="check_list[]" value="13"><label>MacOS</label><br/>
        <input type = "checkbox" name="check_list[]" value="14"><label>Windows</label><br/>
        <input type = "checkbox" name="check_list[]" value="15"><label>Linux</label><br/>
        <input type = "checkbox" name="check_list[]" value="16"><label>Unix</label><br/>
	<input type="submit" name="submit6" value="Submit">';
	}
		echo '</form></h3>';	
}


	if(isset($_GET['submit3'])){
		$choice = $_SESSION['choice'];
		$val = $_GET['newval'];
		$query = "update JobPosting set $choice = '$val' where jobid = " . $_SESSION['jobid2'];
		if($mysqli->query($query)){
			echo "<h3>Update Successful</h3>";
		}							
	}
	else if(isset($_GET['submit5'])){
		$checkbox1 = $_GET['chk'];
		for($i=0; $i<sizeof($checkbox1); $i++){
                	$hella = $checkbox1[$i];
                	//echo $hella;
                	$query3 = "delete from JobSkillSet where jobID = " . $_SESSION['jobid2'] . " AND skill_id = $hella";
                	//echo $query3;
                	mysqli_query($mysqli, $query3);
		}
               	echo "<h3>Deletion Successful</h3>";
		
	}
	else if(isset($_GET['submit6'])){
		$checkbox1 = $_GET['check_list'];
                for($i=0; $i<sizeof($checkbox1); $i++){
                	$hella = $checkbox1[$i];
                	//echo $hella;
                	$query3 = "insert into JobSkillSet (jobID, skill_id) values (" . $_SESSION['jobid2'] . ", $hella)";
                	//echo $query3;
                	mysqli_query($mysqli, $query3);
                	//echo "hell";
       		} 
		echo "<h3>Update Successful</h3>";
	}	
?>
<br><a href="urjobposts.php"><button id="mybutton">Go Back</button></a>

</body>
</html>
