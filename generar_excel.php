<?php  
 	header("Pragma: public");
	header("Expires: 0");
	$filename = $_GET["filename"];
	header("Content-type: application/x-msdownload");
	header("Content-Disposition: attachment; filename=$filename");
	header("Pragma: no-cache");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
	echo $_GET["data"];  
 ?>