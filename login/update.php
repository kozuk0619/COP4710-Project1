<html>
<title>Update</title>
<link rel="stylesheet" href="css/styles.css">
<body>
<div class="topnav" id="myTopnav">
    <a href="#home" class="active">Edit Your Profile</a>
    </div>
    <?php
    require_once 'db.php';
    session_start();
$email = $_SESSION['email'];
$id = $mysqli->query("SELECT * FROM User WHERE email='$email'");
$id1 = $id->fetch_assoc();
        $std=(int)$id1['isStudent'];     
if($std == 1)
{
    $GPA = $_POST['GPA'];
    $grade=$_POST['grade'];
    if($grade=="graduate"){
        $isGrad=1;
	$major = $_POST['gmajor'];
    }else{
	$major = $_POST['major'];
   	  $isGrad = 0;}
      $year = ($_POST['grade']);
      $id2=(int)$id1['id'];
      $sql = "UPDATE Student Set Major='$major', GPA = '$GPA', year = '$year', isGrad = '$isGrad' Where id = '$id2'";
      $mysqli->query($sql);
    
      $id3 = $mysqli->query("SELECT * FROM Student WHERE id='$id2'");
      $id4 = $id3->fetch_assoc();
      $fsuID=$id4['fsuID'];
      $checkbox1 = $_POST['check_list'];
	for($i=0; $i<sizeof($checkbox1); $i++){
        $value = $checkbox1[$i];
        $query1 = "INSERT INTO StudentSkillSets (fsuID, skill_id) values ('$fsuID', '$value')";
        mysqli_query($mysqli, $query1);
    }
    
    
}else{
    $companyname = $_POST['companyname'];
    $companyurl=$_POST['companyurl'];
    $id2=$id1['id'];
    $sql = "UPDATE CompanyRep Set company_name='$companyname', URL = '$companyurl' where id = $id2";//company name
    $mysqli->query($sql);
    //company url
}


?>
<h3>Submission Successful!</h3>
<a href="profileedit.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
