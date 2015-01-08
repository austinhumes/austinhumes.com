<html>
<head> 
<title>Sarah's Booklist</title>
<LINK REL=stylesheet HREF="booklist.css" TYPE="text/css">
</head>
<body>

<?php

mysql_connect("p41mysql75.secureserver.net", "austinhumes", "Poopiekins1") OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db("austinhumes") OR DIE ("Unable to select database! Please try again later.");

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

print "<table id=\"content\" cellspacing=\"0\">";
print "<tr>";
print "<td class=\"label\">Author</td>";
print "<td class=\"label\">Title</td>";
print "</tr>";

$authorCount = 0;	//using authorCount to divide the row background color by author so that the count is not based on title index

for ($i=0; $i < $x; $i++) {		//checking i is less than x, not less than or greater to because db starts at 1, array starts at 0			 		   
  if ($authorCount % 2 == 0 ) { //row number is even, use dark color background for author's row
	print "<tr class=\"darkrow\">";
  } else {  //row number is odd, use light color background for author's row
	print "<tr class=\"lightrow\">";
  };

  print "<td class=\"author\" valign=\"top\">" . $author[$i] . "</td>";
  print "<td class=\"title\">" . $title[$i];
  	
  $authorRepeat=0;
  do {			   //using this to handle more than 2 books by the same author to display all titles without repeating author name
	if ($author[$i] == ($author[$i + 1])) {	 //if the author in the array matches the next one, just add the title instead of adding a new row with the same author name
	  print "</br>" . $title[$i + 1];
	  $i++;		  
      }
	$authorRepeat++;
  }
  while ($authorRepeat < 100);  		
  							 
  $authorCount++;
  	
  print "</td>";
  print "</tr>";  //closing row div
}

print "<div align=\"center\">" . $x . " books in the list by " . $authorCount . " authors.</br>";
?>

  <tr class="addBook">
    <td colspan="2" align="center">Add a Book:
    <form action="bookadded.php" method="post">
      Author: <input type="text" name="author" size="25" maxlength="100">
	  Title: <input type="text" name="title" size="25" maxlength="100"></br>
	  <input type="submit" name="submit" value="Submit!" />
    </form>
	</td>
  </tr>
  <tr class="editBook">
    <td colspan="2" align="center">
	  <a href="bookedit.php">Edit books</a>
	</td>
  </tr>
  <tr class="saveBooklist">
    <td colspan="2" align="center">
	  <a href="backup.php">Save a copy of the current booklist</a>
	</td>
  </tr>

</table>  <!-- closing content div -->

</body>
</html>



