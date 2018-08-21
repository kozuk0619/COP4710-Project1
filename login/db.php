<?php
/* Database connection settings */
$host = 'cop4710.cs.fsu.edu';
$user = 'landerso';
$pass = '2HnKWlRa58Mc';
$db = 'landersodb';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
