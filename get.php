<?php
   
        
        //Set our variables
        $format = strtolower($_GET['format']);
        $num = intval($_GET['num']);
        
        //Connect to the Database
        include("dbConnect.php");
        
        //Run our query
        $result = mysql_query('SELECT * FROM book ORDER BY `author`') or die('MySQL Error.');
        
            
        $books = array();
        while($books = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $books[] = array('post'=>$book);
        }
            
        $output = json_encode(array('posts' => $books));
    
    //Output the output.
    echo $output;



?>