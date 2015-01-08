<html>
<head> 
<title>Sarah's Booklist</title>
<LINK REL=stylesheet HREF="booklist.css" TYPE="text/css">
</head>
<body>

<?php

mysql_connect("p41mysql75.secureserver.net", "austinhumes", "Poopiekins1") OR DIE ("Unable to connect to database! Please try again later.");
mysql_select_db("austinhumes") OR DIE ("Unable to select database! Please try again later.");

$query = "SELECT * FROM books ORDER BY author"; 
$result = mysql_query($query);	
$author = array();
$title = array();	
$x = 0;  //using to keep track of the number of rows

while ($row = mysql_fetch_array( $result )) {	 //reads all db rows into array values
  $author[$x] = $row['author'];    
  $title[$x] = $row['title']; 
  print "x= " . $x . " - " . $author[$x] . " / " . $title[$x] . "</br>";
  $x += 1;			
};												 

print $x . " books in the list</br>";
print "<table id=\"content\">";
print "<tr>";
print "<td class=\"author\">Author</td>";
print "<td class=\"title\">Title</td>";
print "</tr>";

for ($i=0; $i<=$x; $i++) {					 		   
  print "<tr class=\"row\">";
  
    print "<td class=\"author\">" . $author[$i] . "</td>";
    print "<td class=\"title\">" . $title[$i];
  	
    $authorRepeat=0;
	do {
		$authorRepeat++;
          if ($author[$i] == ($author[$i + 1])) {	 //if the author in the array matches the next one, just add the title instead of adding a new row with the same author name
	        echo "</br>" . $title[$i + 1];
	        $i++;		  
          }
		}
	while ($authorRepeat < 10);  		
  	
  print "</td>";
  print "</tr>";  //closing row div
}


?>

  <tr class="addBook">
    <td>Add a Book:
    <form action="bookadded.php" method="post">
      Author: <input type="text" name="author" size="25" maxlength="100">
	  Title: <input type="text" name="title" size="25" maxlength="100">
	  <input type="submit" name="submit" value="Submit!" />
    </form>
	</td>
  </tr>

</table>  <!-- closing content div -->

</body>
</html>



