<html>
	<body>
		<?php
			$query = "SELECT * FROM books ORDER BY author, title"; 
			// opening file, creating it since it doesn't exist
			while ($row = mysql_fetch_array( $result )) {	 //reads all db rows into array values
			fclose($fileHandle); 
	</body>
</html>