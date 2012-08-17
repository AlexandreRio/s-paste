<?php
if(!empty($_POST))
{
   $url = 'http://'.$_SERVER['SERVER_NAME']."/p/";
   $size = 5; // Lenqht of the name of the file
   $historyName = '.history'; // Name of the file containing all the created file name

   if (!empty($_POST['data'])) {
      do {
	 $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 for($i=0; $i<$size; $i++)
	 {
	    $fileName .= $chars[rand()%strlen($chars)];
	 }
      }
      while(file_exists($fileName));

      $file = fopen($fileName,'a+'); // Don't forget to check the permission
      fputs($file,$_POST["data"]);
      fclose($file);

      $historyFile = fopen($historyName, 'a+');
      fputs($historyFile, "$fileName\n");
      fclose($historyFile);

      $number = sizeof(glob("*")) - 2; // Count the number of file less the php
				       // file and the robots.txt.
      print "Number of files: $number\nYour link:\n$url$fileName\n";
   }
   elseif (htmlentities($_POST['clear']) == 'true') {
      if(file_exists($historyName)) {
	 $history = file($historyName);
	 foreach($history as $file) {
	     unlink(substr($file, 0, $size));
	 }
	 unlink($historyName);
	 print "All the files have been deleted\n";
      }
      else
	 print "Nothing to delete.\n";
   }
   else {
      print "Wrong POST method parameter.\n";
   }
}
else {
   print 'This page only accept POST method.';
   echo "<form method=post  action='index.php'>
   <textarea rows='6' cols='40' name='data'>Your text here.</textarea><br />
   <input type='submit' value='Send'>
   </form>";
}
?>
