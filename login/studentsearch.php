<html>
<title>Student Search</title>
<link rel="stylesheet" href="css/styles.css">
	<body>
	<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Search for Students</a>
    </div>
<h3>Select the skills to search for students:</h3>
<form action = "#" method = "post">
<h4><input type = "checkbox" name="check_list[]" value="C++"><label>C++</label><br/>
  <input type = "checkbox" name="check_list[]" value="C"><label>C</label><br/>
  <input type = "checkbox" name="check_list[]" value="Python"><label>Python</label><br/>
  <input type = "checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
  <input type = "checkbox" name="check_list[]" value="HTML"><label>HTML</label><br/>
  <input type = "checkbox" name="check_list[]" value="Javascript"><label>Javascript</label><br/>
  <input type = "checkbox" name="check_list[]" value="Ruby"><label>Ruby</label><br/>
  <input type = "checkbox" name="check_list[]" value="PHP"><label>PHP</label><br/>
  <input type = "checkbox" name="check_list[]" value="CSS"><label>CSS</label><br/>
  <input type = "checkbox" name="check_list[]" value="Front-end Devolpment"><label>Front-end Development</label><br/>
  <input type = "checkbox" name="check_list[]" value="Back-end Development"><label>Back-end Development</label><br/>
  <input type = "checkbox" name="check_list[]" value="Object Oriented"><label>Object Oriented</label><br/>
  <input type = "checkbox" name="check_list[]" value="MacOS"><label>MacOS</label><br/>
  <input type = "checkbox" name="check_list[]" value="Windows"><label>Windows</label><br/>
  <input type = "checkbox" name="check_list[]" value="Linux"><label>Linux</label><br/>
  <input type = "checkbox" name="check_list[]" value="Unix"><label>Unix</label><br/></h4>
  <h3><button type="submit" id="mybutton" name="submit" />Submit</></h3>
</form>

<?php
	require_once 'db.php';
	//$selected = '"' . $_POST['check_list'] . '"';
	//echo $selected;
	if(isset($_POST['submit'])){
	if(!empty($_POST['check_list'])){
	foreach($_POST['check_list'] as $selected){

	$query = "SELECT fsuID FROM Student WHERE fsuID in 
			(SELECT fsuID FROM StudentSkillSets WHERE skill_id in 
				(SELECT skill_id FROM Skills WHERE skill_name = '$selected'))";
	$result = mysqli_query($mysqli, $query);
	echo "<h3>Students familiar with " . $selected . ":</h3><br>";
	while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$id = $row['fsuID'];
		$result2 = $mysqli->query("SELECT first_name, last_name FROM User WHERE id =
						(SELECT id FROM Student WHERE fsuID = '$id')");
		$user2 = $result2->fetch_assoc();		
		echo "<h4>Name: " . $user2['first_name'] . " " . $user2['last_name'];
		echo "&nbsp &nbsp &nbspFSUID: " . $row['fsuID'] . "</h4><br>";}
	$result = mysqli_query($mysqli, $query);
	echo '<form action="../fileman/download/downresume.php" method="post">
		<h3>Access the resume(s) for <select name="fsuid2" id="fsuid2">
						<option value=""></option>';
	while($row2 = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$id2 = $row2['fsuID'];
		$result4 = $mysqli->query("SELECT id FROM Student WHERE fsuID = '$id2'");
		$user3 = $result4->fetch_assoc();
		echo "<option value='" . $user3['id'] . "'>" . $row2['fsuID'] . "</option>";
	}
	echo '</select> <input type="submit" name="submit" value="Submit"></h3>
		</form>'; 

	$result = mysqli_query($mysqli, $query);
	echo '<form action="../fileman/download/downcover.php" method="post">
		<h3>Access the cover letter(s) for <select name="fsuid2" id="fsuid2">
						<option value=""></option>';
	while($row2 = mysqli_fetch_array($result, MYSQL_ASSOC)){
		$id2 = $row2['fsuID'];
		$result4 = $mysqli->query("SELECT id FROM Student WHERE fsuID = '$id2'");
		$user3 = $result4->fetch_assoc();
		echo "<option value='" . $user3['id'] . "'>" . $row2['fsuID'] . "</option>";
	}
	echo '</select> <input type="submit" name="submit" value="Submit"></h3>
		</form>'; 

	}}}		
?>
	<h3><a href="profile.php"><button id='mybutton'>Back</button></a></h3>
	</body>
</html>
