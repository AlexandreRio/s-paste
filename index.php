<?php
if(!empty($_POST))
{
   $url = 'http://alexrio.fr/p/'; // Your server location
   $size = 5; // Lenqht of the name of the file
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

   $number = sizeof(glob("*")) - 2; // Count the number of file less the php
				    // file and the robots.txt.
   print "Number of files: $number\nYour link:\n$url$fileName\n";
}
else {
   print 'This page only accept POST method.';
   echo "<form method=post  action='index.php'>
      <textarea rows='6' cols='40' name='data'>Your text here.</textarea><br />
   <input type='submit' value='Send'>
   </form>";

}
?>
