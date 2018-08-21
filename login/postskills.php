<?php 
require 'db.php';
session_start();
$repid = $_SESSION['repID'];
$company_name = $_POST['company_name'];
$post_date = $_POST['post_date'];
$start_date = $_POST['start_date'];
$pos_name = $_POST['pos_name'];
$job_type = $_POST['job_type'];
$job_des = $_POST['job_des'];
$salary = $_POST['salary'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];

//echo $repid . $company_name . $post_date . $start_date . $pos_name . $job_type . $job_des . $salary . $country . $state . $city;


$query = "INSERT INTO JobPosting(repID, company_name, date_posted, start_date, position_name, type, description, salary, country, state, city)
            VALUES ($repid, '$company_name', '$post_date','$start_date', '$pos_name', $job_type, '$job_des', $salary, '$country', '$state', '$city')";
//echo $query;
if(mysqli_query($mysqli, $query)){
    //echo "Es good ";
    $query2 = "SELECT MAX(jobID) AS max_jobID FROM JobPosting";
    $result = mysqli_query($mysqli, $query2);
    $row = $result->fetch_assoc();
    $_SESSION['jobid'] = $row['max_jobID'];
    //echo $_SESSION['jobid'];
}/**/
?>

<!DOCTYPE HMTL>
<html>
<style>
body {
    background-color: lightgray;
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
}
h3 {
    margin-left:40px
}
h4{
    margin-left:80px
}
.topnav {
    overflow: hidden;
    background-color: #333;
    height: 4em;
}
.topnav a {
    float: left;
    height: 1em;
    width: 15em;
    display: block;
    color: #f2f2f2;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 25px;
}
.topnav a:hover {
    background-color: #ddd;
    color: black;
}
.active{
    background-color: #1ab188;
    height: 4em;
    color: white;
}
#mybutton {
margin-left:40px;
display: block;
width: 6em;
height: 2em;
border-color: black;
border-style: solid;
border-width: 2px;
padding: 0;
text-align:center;
font-size: 1.5em;
line-height:1.5em;
color: white;
background-color: #1ab188; }
#mybutton:hover{
    background-color: black;
    color: white;
    border-color: white;
} 
</style>    
<body>
    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Job Post Form</a>
    </div>        
    <form action="postsuccess.php" method="post">
        <h3>What kind of skills does the position require?</h3>
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
        <input type="submit" id="mybutton" value="Submit" name="submit">
    </form>
</body>
</html>
