<html>
	<body>

<form action = "#" method = "post">
<input type = "checkbox" name="check_list[]" value="C++"><label>C++</label><br/>
<input type = "checkbox" name="check_list[]" value="Java"><label>Java</label><br/>
<input type = "checkbox" name="check_list[]" value="Python"><label>Python</label><br/>
<input type = "submit" name="submit" value="Submit"/>
</form>

	<?php

	require 'db.php';
		if(isset($_POST['submit']))
		{
			if (!empty($_POST['check_list']))
			{
				foreach($_POST['check_list'] as $selected)
				{
					// Link to db and echo query statements?
					$temp = "SELECT ALL FROM JobPosting WHERE (SELECT jobID FROM JobSkillSet WHERE skill_ID = ";
					$temp = $temp . $selected; 
					$search = $mysqli->query($temp);
					echo $temp."</br>";
					echo $selected."</br>";
				}
			}
		}
	?>

	</body>
</html>
