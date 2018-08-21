<html>
<link rel="stylesheet" href="../login/css/styles.css">
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Delete Resume</a>
</div>
<?php
session_start();
$id = $_SESSION['id']; //this is a session variable
$dir = "stdfiles/" . $id . "/resume/";
//echo "$dir <br>";
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    echo '<h3>Here are the resumes:</h3>
		<h4><form action="" method="post">';
    while (($file = readdir($dh)) !== false){
	if($file != '.' && $file != '..'){
		echo "<input type='radio' name='deletefile' value='$file'>$file<br>";}
    }
	echo '<br><input type="submit" value="Submit"></form></h4>';
    closedir($dh);
  }
}
?>
<!--<h3>
<form action="" method="post">
	Filename to delete: <input type="text" name="deletefile">
	<input type="submit">
</form></h3>-->

<?php
$dfile = $_POST['deletefile'];
//echo $dfile;
$dfile = $dir . $dfile;
//echo $dfile;
if(file_exists($dfile)){
	if(unlink($dfile)){
		echo "<h3>File was deleted</h3>";
	}
}
else if(!file_exists($dfile)){
	echo "<h3>No file with that name exists. Please try again.</h3>";
}
else{
echo "";
}
?>
<br>
<h3><a href="upload.php"><button id="mybutton">Back</button></a></h3>
</body>
</html>
