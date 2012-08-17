s-paste
=======

Minimalist CL pastebin tool.

Installation:
-------
Simply upload `index.php`, `robot.txt` and `.htaccess` on your server after editing the 'url' variable of those files.

Usage:
-------
    $ bash spaste word

Uploads the «word», generaly an URL, then returns a link.

    $ bash spaste -f your-file

Uploads the content of the file and returns a link so you can easily download it later or from another computer.

    $ bash spaste -d

Deletes all the created files, use with caution !
