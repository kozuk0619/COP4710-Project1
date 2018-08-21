<html>
<style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: lightgray;
        }
        
        .topnav {
            overflow: hidden;
            background-color: #333;
        }
        
        
        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        
        .active {
            background-color: #1ab188;
            color: white;
        }
        
        .topnav .icon {
            display: none;
        }
        .ring{
            position: relative;
            margin-left: auto;
            margin-right: auto;


            display: block;
        }
        .ring1 {
            position:absolute;
            margin-left:auto;
            margin-right:auto;
            top: 65px;
            left: 63px;
            z-index: -1;
        }
        .ring2 {
            margin-left:auto;
            margin-right:auto;
            position:absolute;
            z-index:-5;
            
        }

        
        
        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
            float: right;
            display: block;
            }
        }
        
        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative;}
            .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
            }
            .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
            }
        
        }
    </style>
    <body>
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">Home</a>
            <a href="login/index.php">Login</a>
            <a href="login/index.php">Sign Up</a>
            <a href="contact.html">Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <h1>Welcome to Valknut!</h1><br>
        <h2>
            Here at Valknut we do one simple thing. We help students get connected
            to employers and vice versa.
        </h2>
<!--
        <div class ="ring">
//        <img id ="img1" src="middle_ring.png"  class ="ring1" height="290px" width="290px">
 //       <img id ="img2" src="middle_ring.png"  class ="ring2" >
        </div>
        <script>
var looper;
var degrees = 0;
function rotateAnimation(el,speed,direction){
	var elem = document.getElementById(el);
		elem.style.WebkitTransform = "rotate("+degrees+"deg)";
        if(degrees>360)
    return;
	looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);
    degrees++;

    
}
rotateAnimation("img1",30, 2);
rotateAnimation("img2",30, 2);
</script>
-->
<img src = "Valknut-1.png">
<?php
/* if(!function_exists('hash_equals')) {
    echo 'cool';
    }
/*
?>

    </body>
</html>
