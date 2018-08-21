<?php
session_start();
?>
<html>
<link rel="stylesheet" href="../login/css/styles.css">
<body>
<div class="topnav" id="myTopvnav">
	<a href="#home" class="active">File Manager</a>
</div>
<h3>*Note: If a file has a space in the name, it WILL NOT upload properly.</h3>
<h3><form action="uploadres.php" method="post" enctype="multipart/form-data">
    Upload Resume:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form></h3>
<h3><form action="uploadcover.php" method="post" enctype="multipart/form-data">
    Upload Cover Letter:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form></h3>
<?php $id = "stdfiles/" . $_SESSION['id'];
if(file_exists("$id/resume")){
echo '<br><a href="deleteres.php"><button id="mybutton">Delete A Resume File</button></a><br>';}
if(file_exists("$id/cover")){
echo '<br><a href="deletecover.php"><button id="mybutton">Delete A Cover Letter File</button><a><br>';}
?>

<br>

<a href="../login/profile.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
