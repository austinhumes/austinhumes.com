<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html>	<head> 		<title>Sarah's Booklist</title>		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 			</head>		<body>		<?php	include("dbConnect.php");
	
	$query = "SELECT * from books"; 	$result = mysql_query($query);	
	while($info = mysql_fetch_array( $result )) {   		$number = $info['number'];  		$author = $info['author'];		$title = $info['title'];	?>
		<form enctype="multipart/form-data" action="bookupdated.php" method="POST" name="editBooklist<?php echo $number; ?>">		
		  <input type="hidden" name="number" size="25" maxlength="" value="<?php echo $number; ?>">		
		  <tr>		
			<td align="right"><em>Author</em></td>		
			<td><input type="text" name="author" size="25" maxlength="" value="<?php echo $author; ?>"></td>		
		  </tr>		
		  <tr>		
			<td align="right"><em>Title</em></td>		
			<td><input type="text" name="title" size="25" maxlength="" value="<?php echo $title; ?>"></td>		
		  </tr>		
		  <tr>		
		    <td align="center" colspan="2"><input type="submit" value="Update"></td>		
		  </tr>		
		  <tr>		
		    <td align="center" colspan="2"><a href="index.php">Don't save, go back to booklist</a></td>		
		  </tr>					
		</form>  

<?php  
} ?>
	</body></html>
