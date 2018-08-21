<html>
<link rel="stylesheet" href="css/styles.css">
<title> View Your Profile</title>
<body>

<div class = "topnav" id="myTopnav">
  <a href = "#home" class = "active">View Your Profile </a>
</div>
<?php
session_start();
require 'db.php';
if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");    
  }
$std = $_SESSION['std'];
$id = $_SESSION['id'];
//echo $id;
if($std == 1){
$result = $mysqli->query("select * from Student where id = $id");
$user = $result->fetch_assoc();
echo "<h3>Your profile information:</h3>";
echo "<h4>FSUid: " . $user['fsuID'] .
	"<br>ID: " . $user['id'] .
	"<br>Major: " . $user['Major'] .
	"<br>GPA: " . $user['GPA'] .
	"<br>Year: " . $user['year'];
	if($user['isGrad'] == 0) echo '<br>Undergraduate</h4>';
	else if($user['isGrad'] == 1) echo '<br>Graduate Student</h4>';
}
else{
$result = $mysqli->query("select * from CompanyRep where id = $id");
$user = $result->fetch_assoc();
echo "<h3>Your profile information:</h3>";
echo "<h4>RepID: " . $user['repID'] .
	"<br>ID: " . $user['id'] .
	"<br>Company Name: " . $user['company_name'] .
	"<br>URL: " . $user['URL'] . "</h4>";
	
}
?>
<br>
<br>
<a href="profileedit.php"><button id="mybutton">Edit Profile</button></a>
<br>
<a href="profile.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
