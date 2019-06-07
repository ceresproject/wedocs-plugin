<?php 

$filename = $_GET['filename'];

$title = $_GET['title'];
$content = $_GET['content'];
header("Content-type: application/octet-stream"); 
header("Accept-Ranges: bytes"); 
header("Content-Disposition: attachment; filename = ".$filename);
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Pragma: public"); 
$body = str_replace("’", "'", $content); 
echo "# ".$title;
echo "<br><br>";
echo $body;
echo "<br><br>Save date: ".date("Y-m-d");
?>