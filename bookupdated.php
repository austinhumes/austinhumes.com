<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head> 
		<title>Sarah's Booklist</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		
	</head>
	
	<body>
	<?php
	include("dbConnect.php");

							    	$number = $_POST['number'];	$author = $_POST['author'];    	  	$title = $_POST['title'];  				mysql_query("UPDATE books SET author='$author', title='$title' WHERE number='$number'") or die(mysql_error());		
	echo "<font color=\"green\"><b>$author - $title has been edited. <a href=\"index.php\">Go back to the Booklist</a>.</b></font><br><br>";?>
	</body>
</html>	