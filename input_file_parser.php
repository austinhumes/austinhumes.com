<?php
$file = fopen("formatted_output.txt", "r") or exit("Unable to open file!");
//Output a line of the file until the end is reached
while(!feof($file)) {
  $input = fgets($file);
  //echo $input;
  //$output = preg_replace('/\" \"/', " \",\"", $input);
  //echo "\"\",\"" . $input. "\";<br />";
  
  if (preg_match('/\";^/', $input, $matches)) {
    echo "Match was found <br />";
    echo $matches[0];
  }
}		   

fclose($file);
?>	