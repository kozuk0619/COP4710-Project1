<?php

$username="landerso";
$password="2HnKWlRa58Mc";
$localhost="cop4710.cs.fsu.edu";
$dbname='landersodb';
$connect = mysql_connect($localhost, $username, $password);
if($connect->connect_error) {
    die ("Connect Failed: " .$connect->connect_error);
}
else
    echo "Connected Successfully<br>";
$db_selected = mysql_select_db($dbname,$connect);
if(!$db_selected) { die ('Cannot use the selected database, sorry '.mysql_error());
}

?>
