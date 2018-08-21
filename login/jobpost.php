<?php 
session_start();
require 'db.php'; 
$id4 = $_SESSION['id'];
$query4 = "select repID from CompanyRep where id = $id4";
$result = $mysqli->query($query4);
$repid4 = $result->fetch_assoc();
$_SESSION['repID'] = $repid4['repID'];
//echo $_SESSION['repID'];
?>

<html>
<title> Job Post</title>
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
width: 15em;
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
    <form action="postskills.php" method="post" enctype="multipart/form-data">
        <h3>What is your company name? <input type="text" name="company_name" id="company_name"></h3>
        <h3>Enter today's date (yyyy-mm-dd): <input type="text" name="post_date" id="post_date"></h3>
        <h3>Enter the start date for the job (yyyy-mm-dd): <input type="text" name="start_date" id="start_date"></h3>
        <h3>Position name: <input type="text" name="pos_name" id="pos_name"></h3>
        <h3>Job Type: <select name="job_type" id="job_type">
                                <option value=0></option>
                                <option value=1>Full-time</option>
                                <option value=2>Part-time</option>
                                <option value=3>Internship</option>
                            </select></h3>
        <h3>Short description of job: <input type="text" name="job_des" id="job_des"></h3>
        <h3>Salary: <input type="number" name="salary" id="salary"></h3>
        <h3>Location information: </h3>
        <h4>Country: <input type="text" name="country" id="country"></h4>
        <h4>State: <input type="text" name="state" id="state"></h4>
        <h4>City: <input type="text" name="city" id="city"></h4>
        <input type="submit" id="mybutton" value="Continue to Skill Requirements" name="submit">
    </form>
    <a href="urjobposts.php"><button id="mybutton">Back</button></a>
</body>
</html>
