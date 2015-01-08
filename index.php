<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head> 
		<title>Sarah's Booklist</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
		<link rel="stylesheet" href="booklist.css" type="text/css">
	</head>
	
	<body>
		<div id="content">
			<div class="rowcontainer center">
				<div class="authorlabel">Author</div>
				<div class="titlelabel">Title</div>
			</div>
			<?php											  
				include("dbConnect.php");
				
				$query = "SELECT * FROM books ORDER BY author, title"; 
				$result = mysql_query($query);	
				$author = array();
				$title = array();	
				$x = 0;  //using to keep track of the number of rows
				
				while ($row = mysql_fetch_array( $result )) {	 //reads all db rows into array values
				  $author[$x] = $row['author'];    
				  $title[$x] = $row['title']; 
				  //print "x= " . $x . " - " . $author[$x] . " / " . $title[$x] . "</br>";
				  $x += 1;			
				};												 
				
				$authorCount = 0;	//using authorCount to divide the row background color by author so that the count is not based on title index
				
				for ($i=0; $i < $x; $i++) {		//checking i is less than x, not less than or greater to because db starts at 1, array starts at 0			 		   
				  print "	<div class=\"rowcontainer\">\n";
				  
				  if ($authorCount % 2 == 0 ) { //row number is even, use dark color background for author's row
					print "		<div class=\"darkrow\">\n";
				  } else {  //row number is odd, use light color background for author's row
					print "    <div class=\"lightrow\">\n";
				  };
				
				  print "      <div class=\"author\">" . $author[$i] . "</div>\n";
				  print "      <div class=\"title\">" . $title[$i] . "        \n";
				  	
				  $authorRepeat=0;
				  do {			   //using this to handle more than 2 books by the same author to display all titles without repeating author name
					if ($author[$i] == ($author[$i + 1])) {	 //if the author in the array matches the next one, just add the title instead of adding a new row with the same author name
					  print "        </br>" . $title[$i + 1] . "\n";
					  $i++;		  
				      }
					$authorRepeat++;
				  }
				  while ($authorRepeat < 100);  		
				  								 
				  $authorCount++;
				  
				  print "      </div>\n";  //closing title div
				  print "    </div>\n";  //closing row div 
				  print "  </div>\n";  //closing row container
				}
				
				print "<div class=\"count container\">" . $x . " books in the list by " . $authorCount . " authors.</div>";
			?>
		
			<div class="addBook container">
				Add a Book:
				<form action="bookadded.php" method="post">
			    	Author: <input type="text" name="author" size="25" maxlength="100">
					Title: <input type="text" name="title" size="25" maxlength="100"></br>
					<input type="submit" name="submit" value="Submit!" />
				</form>
			</div>
			<div class="editBook">
				<a href="bookedit.php">Edit books</a>
			</div>
			<div class="saveBooklist">
				<a href="backup.php">Save a copy of the current booklist</a>
			</div>
		
		</div>  <!-- closing content div -->
		
	</body>
</html>





