<?php
session_start();
ob_start();
$dir = $_SESSION['dir'];
$file = $_POST['downfile'];
//echo "$file<br>";
$dir .= $file;
//echo $dir;

if(!file_exists($dir)) die("File does not exists");

echo "We made it this far<br>";
/**/
header("Content-Disposition: attachment; filename=" . basename($dir));
header("Content-Length: " . filesize($dir));
header("Content-Type: application/octet-stream;");
ob_end_clean();
readfile($dir);
?>
