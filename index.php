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

   $number = sizeof(glob("*")) - 1; // Count the number of file less the php file.
   print "Number of files: $number\nYour link:\n$url$fileName\n";
}
else {
   print 'This page only accept POST method.';
}
?>
