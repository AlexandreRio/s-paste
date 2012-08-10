<?php
if(!empty($_POST))
{
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

   $number = sizeof(glob("*")) - 1;
   print "Number of files: $number\nYour link:\nhttp://alexrio.fr/p/$fileName\n";
}
else {
   print 'This page only accept POST method.';
}
?>
