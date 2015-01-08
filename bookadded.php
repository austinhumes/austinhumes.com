<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>	<head> 		<title>Sarah's Booklist</title>		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 			</head>		<body>	<?php	include("dbConnect.php");		$author = $_POST['author'];   	$title = $_POST['title'];										   	$query = "INSERT INTO books (author, title) VALUES ('$author', '$title')"; 	$result = mysql_query($query);			echo "<font color=\"green\"><b>$author - $title has been added.  <a href=\"index.php\">Go back to the Booklist</a>.</b></font><br><br>";?>
		</body></html>


