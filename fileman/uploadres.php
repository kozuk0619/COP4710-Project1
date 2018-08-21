<?php
session_start();
?>
<html>
<link rel="stylesheet" href="../login/css/styles.css">
<body>
<div class="topnav" id="myTopnav">
	<a href="#home" class="active">File Upload</a>
</div>
<?php
$target_dir = "stdfiles/";
$email = $_SESSION['id']; //this is a session variable
//echo $email;
$email .= "/";
$target_dir .= $email;
//echo $target_dir;
if(!file_exists($target_dir)){
    if(mkdir("stdfiles/$email/", 0766)){
    	echo "<h3>New user added.</h3>";
	chmod("stdfiles/$email/", 0777);
	if(mkdir("stdfiles/$email/resume/", 0766)){
		echo "<h3>Resume folder added.</h3>";
		chmod("stdfiles/$email/resume", 0777);
	}
	}
}

if(!file_exists("stdfiles/$email/resume/")){
	if(mkdir("stdfiles/$email/resume/", 0766)){
	echo "<h3>Resume folder added for existing user.</h3>";
	chmod("stdfiles/$email/resume", 0777);}
}

$target_dir .= "resume/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "<h3>Sorry, file already exists.</h3>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "<h3>Sorry, your file is too large.</h3>";
    $uploadOk = 0;
}
// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "docx" && $imageFileType != "jpeg"
&& $imageFileType != "doc" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<h3>Your file was not uploaded.</h3>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<h3>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h3>";
    } else {
        echo "<h3>There was an error uploading your file.</h3>";
    }
}
?>

<h3><a href="upload.php"><button id="mybutton">Back</button></a></h3>
</body>
</html>
