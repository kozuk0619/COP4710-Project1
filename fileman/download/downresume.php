<?php
session_start();
?>
<html>
<link rel="stylesheet" href="../../login/css/styles.css">
<head>
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">Resume Download</a>
</div>
<?php
$id = $_POST['fsuid2']; //this is a session variable
//echo $id;
$dir = "../stdfiles/" . $id . "/resume/";
//echo "$dir <br>";
// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    //echo "<h3>Here are the resumes:</h3>";
    /*while (($file = readdir($dh)) !== false){
	if($file != '.' && $file != '..'){
		echo "<h4>filename:" . $file . "</h4><br>";}
    }*/
echo '<h3>Here are the resumes:</h3>
                <h4><form action="downres2.php" method="post">';
    while (($file = readdir($dh)) !== false){
        if($file != '.' && $file != '..'){
                echo "<input type='radio' name='downfile' value='$file'>$file<br>";}
    }
        echo '<br><input type="submit" value="Download"></form></h4>';
    closedir($dh);
  }
}
$_SESSION['dir'] = $dir;
?>
<br>
<!--<form action="downres2.php" method="post">
	<h3>Filename to download: <input type="text" name="downfile">
	<input type="submit"></h3><br>
</form>-->
<h3><a href="../../login/studentsearch.php"><button id="mybutton">Back</button></a></h3>
</body>
</head>
</html>

