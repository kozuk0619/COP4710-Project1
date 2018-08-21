<html>
<link rel="stylesheet" href="css/styles.css">
<title> Edit Your Profile</title>
<body>

<div class = "topnav" id="myTopnav">
  <a href = "#home" class = "active"> Edit Your Profile </a>
</div>
<?php
session_start();
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['update'])) { 

        require 'update.php';
        
    }
}*/
if ( $_SESSION['logged_in'] != 1 ) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");    
  }
$std = $_SESSION['std'];
if($std==0)
{
echo '<form action = update.php "edit_profile" method = "post">
<h3><input type = "text" name="companyname"<label>  Company Name  </label></h3><br/>
<h3><input type = "text" name="companyurl"<label>  URL  </label></h3><br/>


<button type="submit" id="mybutton" name="update" />Update</>

</form>';
}
if($std==1)
{
  echo '<form action =update.php "edit_profile"  method = "post">
  <h3> <input type = "number" name="GPA" min="0.0" max="4.0" step = "0.1"<label>  GPA  </label><br/>
  <select name="grade"  onchange="gradChange(this.value)";></h3>
  <h3>  <option value="">Year</option>
    <option value="freshman">Freshman</option>
    <option value="sophmore">Sophmore</option>
    <option value="junior">Junior</option>
    <option value="senior">Senior</option>
    <option value="graduate">Graduate</option></h3>
  </select>
              <script>
              function gradChange(value){
              if(value!="graduate")
              {
              document.getElementById("gmajor").style.display = "none";
              document.getElementById("ugmajor").style.display = "block";
              }
              if(value=="graduate")
              {
              document.getElementById("gmajor").style.display = "block";
              document.getElementById("ugmajor").style.display = "none";
              }
              }
             
              </script>
  <select name="major" id="ugmajor" style="display:none">
    <h3><option value="Comp Sci BS">Comp Sci BS</option>
    <option value="Comp Sci BA">Comp Sci BA</option>
    <option value="Comp PA">Comp Prog/App</option>
    <option value="Comp Bio">Comp Bio</option>
    <option value="Comp Crim">Comp Crim</option></h3>
  </select>
  <select name="gmajor" id="gmajor" style="display:none">
    <option value="Comp Sci MS">Comp Sci MS</option>
    <option value="Cyber Sec MS">Cyber Security MS</option>
    <option value="Comp Network MS">Comp Network/ Sys Admin</option>
    <option value="Cyber Crim MS">Cyber Crimology MS</option>
  
  </select>
  
  
  <h3><legend> Which skills do you have? </legend>
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
  <input type = "checkbox" name="check_list[]" value="16"><label>Unix</label></h3><br/>
  <br>
  <input type="submit" name="update" value="Update" id="mybutton">
  
  </form>';
}

?>
<br>
<a href="viewprofile.php"><button id="mybutton">Go Back</button></a>
</body>
</html>
