<html>
	<body>	
		<?php			$timestamp = time (); 			$date = date("Y-M-d",$timestamp);			$fileName = "backup/" . $date . ".txt";						include("dbConnect.php");
			$query = "SELECT * FROM books ORDER BY author, title"; 			$result = mysql_query($query);				$author = array();			$title = array();				$x = 0;  //using to keep track of the number of rows		
			// opening file, creating it since it doesn't exist			$fileHandle = fopen($fileName, 'w') or die("can't open file");		
			while ($row = mysql_fetch_array( $result )) {	 //reads all db rows into array values				$author[$x] = $row['author'];    				$title[$x] = $row['title']; 				$outputRow = "\"\",\"" . $author[$x] . "\",\"" . $title[$x] . "\";\n";    //output in form of: "","author","title";  								fwrite($fileHandle, $outputRow);	//writing formatted output row to file				$x += 1;			};							  								  		
			fclose($fileHandle); 					print "Backup file <a href=\"" . $fileName . "\" target=\"_blank\">" . $fileName . "</a> created.</br></br>";			print "<a href=\"index.php\">Back to Booklist</a>";		?>		
	</body>
</html>
