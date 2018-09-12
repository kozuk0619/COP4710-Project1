# COP4710-Project
The master copy of this project can be found on ww2.cs.fsu.edu/~landerso but for prosperity, I have decided to upload it here.
Here is a small demo of the students side:
https://i.imgur.com/5kOmMjI.gifv
Here is a small demo of the rep side:
https://i.imgur.com/0ltlYET.gifv

This whole project was done using PHP, mySQL, and HTML, and styling with CSS.

Co-Authored-By: Logan Anderson <kozuk0619@users.noreply.github.com> and Shawn Finnerty <spf15@my.fsu.edu>
ACM Job Posting
The application that our group presented is a job portal. Essentially, there are two views a user can have while using the application. One view is as a company representative, and the other is as a student. The application is specific to computer science related majors at the Florida State university. The application allows for a expedited process for employers and students to get in contact with each other. The company representative has the ability to submit, and maintain, job postings and do searches for students based off of skills. In addition, the company representative is able to download any resumes or cover letters that were uploaded by the students. On the student side, one is able to upload cover letters and resumes (the application has several guidelines to this process, this will be gone into more depth later). A student is also able to search for job postings and pull up the contact information for the company representative that posted it. Finally, both the student and the company representative have the ability to maintain a profile with information that help sustain the searching ability. While this is just a brief overview of the application as a whole, it should give enough background knowledge to proceed to more advanced explanations.
The decision to choose this application.

E-R Model:

Relational Model:
Note: The primary keys are underlined and the foreign keys are italicized/bold.
 
Student(fsuID, Major, ID, GPA, Year, isGrad)
User(ID, Firstname, Lastname, Psswrd, isStdnt)
CompanyRep(repID, ID, CompanyName, Email, URL)
UserLog(ID, Lastlogon, Acctmade)
StudentExperience(fsuID, Resume, Cover Letter)
StudentSkillSets(fsuID, skillid, Explvl)
Skills(Skillid, Skillname)
JobPosting(jobID, repID, CompanyName, DatePosted, Startdate, POSname,
Type, Description, Salary, Country, State, City)
JobSkillSet(jobID, skillid, Explvl)
 
 

        	Initially it was fairly obvious that if the application was to be implemented on the web server provide by the systems group, the use of HTML, CSS, JavaScript, and PHP was going to be absolutely needed. The application is primarily built from PHP and uses HTML to simply output the data and format of the different webpages. A script was used to connect to the database, so every time any query was to be taken place the script was used. Something else that was taken into consideration was SQL injection, so the ‘mysqli’ method was used throughout. When a user logs into the application, a session is started which allowed for the handy use of session variables. As well as it protected the application from anyone just going to one of the pages without being logged in.
Since PHP was used so extensively, the implementation was able to be seamless from the login screen and allowed for a dynamic website. To elaborate, the user only has to enter information, like their credentials, at the login screen. Using PHP we were able to store the user ID in a session variable and at any point in the application the users information can be modified or queried without them having to enter information to identify them. Essentially, the webpage can be unique to each user because their information is different than the others.
