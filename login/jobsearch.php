<html>
<link rel="stylesheet" href="css/styles.css">
<head>
<style>
	.mydiv	{border-style: solid;}
	h1	{color: black;}
	p {border-style: solid;}
	

</style>
</head>
<body>
	<div class="topnav" id="myTopnav">
		<a href = "#home" class="active"> Search for Jobs by Skills </a>
	</div>
	<div class="mydiv">
	<!-- <h1>Search for Jobs by Languages</h1> -->
<h3>
<form action = "#" method = "post">
<legend> Skills </legend>
<input type = "checkbox" name="check_list[]" value="C++"><label>C++</label><br/>
<input type = "checkbox" name="check_list[]" value="C"><label>C</label><br/>
<input type = "checkbox" name="check_list[]" value="Python"><label>Python</label><br/>
<input type = "checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
<input type = "checkbox" name="check_list[]" value="HTML"><label>HTML</label><br/>
<input type = "checkbox" name="check_list[]" value="Javascript"><label>Javascript</label><br/>
<input type = "checkbox" name="check_list[]" value="Ruby"><label>Ruby</label><br/>
<input type = "checkbox" name="check_list[]" value="PHP"><label>PHP</label><br/>
<input type = "checkbox" name="check_list[]" value="CSS"><label>CSS</label><br/>
<input type = "checkbox" name="check_list[]" value="Front-end Development"><label>Front-end Development</label><br/>
<input type = "checkbox" name="check_list[]" value="Back-end Develpoment"><label>Back-end Development</label><br/>
<input type = "checkbox" name="check_list[]" value="Object Oriented"><label>Object Oriented</label><br/>
<input type = "checkbox" name="check_list[]" value="MacOS"><label>MacOS</label><br/>
<input type = "checkbox" name="check_list[]" value="Windows"><label>Windows</label><br/>
<input type = "checkbox" name="check_list[]" value="Linux"><label>Linux</label><br/>
<input type = "checkbox" name="check_list[]" value="Unix"><label>Unix</label><br/>
<input type = "submit" name="submit" value="Submit"/>
</form>

	<b>
	<?php

	require 'db.php';
		if(isset($_POST['submit']))
		{
			if (!empty($_POST['check_list']))
			{
				$count = 0;
				foreach($_POST['check_list'] as $selected)
				{
					// Link to db and echo query statements?
					$count += 1;
					$cat = NULL;
					//echo $count;
					//$temp = "SELECT * FROM JobPosting WHERE (SELECT jobID FROM JobSkillSet WHERE 
					//	(SELECT skill_ID FROM Skills WHERE skill_name = ";

					$temp = "SELECT jobID FROM JobPosting WHERE jobID IN 
							(SELECT jobID FROM JobSkillSet WHERE skill_ID IN
								(SELECT skill_ID FROM Skills WHERE skill_name = '$selected'))";
					$result = mysqli_query($mysqli, $temp);
					echo "Jobs requiring familiarity with " .$selected .":<br>" . "<br>";
					while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
					{
						$id = $row['jobID'];
						$result2 = $mysqli->query("SELECT company_name, position_name FROM JobPosting WHERE jobID = '$id'");
						$user2 = $result2->fetch_assoc();
						echo "&nbsp&nbsp&nbsp&nbspJobID: " . $row['jobID'] . "(Search by this for full details)" . "<br>";
						echo "&nbsp&nbsp&nbsp&nbspCompany Name: " .$user2['company_name'] . "<br>";
						echo "&nbsp&nbsp&nbsp&nbspPositon Name: " .$user2['position_name'] . "<br>";
						echo "<br>";
					}
				}
			}
		}
	?>
	</b>
	</h3>
	</div>
	<div class="mydiv">
	<h3>
		<form>
		<label> Search by JobID:</label> <input type = "text" name = "JID">
		<input type = "submit" name = 'submit' value = "Submit">
		</form>

		<?php
			require 'db.php';
			if(isset($_GET['submit']))
			{
				if (!empty($_GET['JID']))
				{
					$JID = $_GET['JID'];
					$temp = "SELECT repID FROM JobPosting WHERE jobID = $JID";

					$result = mysqli_query($mysqli, $temp);

					$result2 = $mysqli->query("SELECT * FROM JobPosting WHERE jobID = $JID");
					$user2 = $result2->fetch_assoc();

					$RID = $user2['repID'];
					$temp3 = $mysqli->query("SELECT email FROM User WHERE id IN 
						(SELECT id FROM CompanyRep WHERE repID = $RID)");
					$user3 = $temp3->fetch_assoc();


					echo "JobID: " . $user2['jobID'] . "<br>";
					echo "RepID: " . $user2['repID'] . "<br>";
					echo "Rep Email: " .$user3['email'] . "<br>";
					echo "Company Name: " . $user2['company_name'] . "<br>";
					echo "Date Posted: " . $user2['date_posted'] . "<br>";
					echo "Start Date: " . $user2['start_date'] . "<br>";
					echo "Position Name: " . $user2['position_name'] . "<br>";
					if ($user2['type'] == 1)
					{
						echo "Job Type: Full-time" . "<br>";

					}
					else if ($user2['type'] == 2)
					{
						echo "Job Type: Part-time" . "<br>";
					}
					else if ($user2['type'] == 3)
					{
						echo "Job Type: Intern" . "<br>";
					}
					echo "Description: " . $user2['description'] . "<br>";
					echo "Salary: " . $user2['salary'] . "<br>";
					echo "Country: " . $user2['country'] . "<br>";
					echo "State: " . $user2['state'] . "<br>";
					echo "City: " . $user2['city'] . "<br>";

				}
			}
		?>
	</h3>
	</div>
	<div class="mydiv">
	<h3>
		<form action = "#" method = "post">
		<legend> Search by Job Type </legend>
		<input type = "checkbox" name="job_type[]" value="1"><label>Full-time</label><br/>
		<input type = "checkbox" name="job_type[]" value="2"><label>Part-time</label><br/>
		<input type = "checkbox" name="job_type[]" value="3"><label>Intern</label><br/>
		<input type = "submit" name="submit" value="Submit"/>
		</form>

		<?php

		require 'db.php';
			if(isset($_POST['submit']))
			{
				if (!empty($_POST['job_type']))
				{
					$count = 0;
					foreach($_POST['job_type'] as $selected)
					{
						// Link to db and echo query statements?
						$count += 1;
						//echo $count;
						//$temp = "SELECT * FROM JobPosting WHERE (SELECT jobID FROM JobSkillSet WHERE 
						//	(SELECT skill_ID FROM Skills WHERE skill_name = ";

						$temp = "SELECT jobID FROM JobPosting WHERE type = $selected";
						$result = mysqli_query($mysqli, $temp);


						echo "<br>";
						if ($selected == 1)
						{
							echo "Jobs with Full-time positions:" . "<br>"; 
						}
						else if ($selected == 2)
						{
							echo "Jobs with Part-time positions:" . "<br>";
						}
						else if ($selected == 3)
						{
							echo "Jobs with Intern positions:" . "<br>";
						}

						//echo "<h4>";
						while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
						{
							$result2 = $mysqli->query("SELECT * FROM JobPosting WHERE type = $selected");
							$user2 = $result2->fetch_assoc();

							$RID = $user2['repID'];
							$temp3 = $mysqli->query("SELECT email FROM User WHERE id IN 
								(SELECT id FROM CompanyRep WHERE repID = $RID)");
							$user3 = $temp3->fetch_assoc();

							echo "<br>" . "JobID: " . $user2['jobID'] . "<br>";
							echo "RepID: " . $user2['repID'] . "<br>";
							echo "Rep Email: " .$user3['email'] . "<br>";
							echo "Company Name: " . $user2['company_name'] . "<br>";
							echo "Date Posted: " . $user2['date_posted'] . "<br>";
							echo "Start Date: " . $user2['start_date'] . "<br>";
							echo "Position Name: " . $user2['position_name'] . "<br>";
							if ($user2['type'] == 1)
							{
								echo "Job Type: Full-time" . "<br>";

							}
							else if ($user2['type'] == 2)
							{
								echo "Job Type: Part-time" . "<br>";
							}
							else if ($user2['type'] == 3)
							{
								echo "Job Type: Intern" . "<br>";
							}
							echo "Description: " . $user2['description'] . "<br>";
							echo "Salary: " . $user2['salary'] . "<br>";
							echo "Country: " . $user2['country'] . "<br>";
							echo "State: " . $user2['state'] . "<br>";
							echo "City: " . $user2['city'] . "<br>";
						}
						//echo "</h4>";
						
					}
				}
			}
		?>
	</h3>
	</div>

<br><a href="profile.php"><button id="mybutton">Go Back</button></a>
</body>
</html>