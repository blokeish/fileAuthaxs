# fileAuthaxs
Prevents not logged in sessions from accessing the resource files.

This script works in Apache server with php.
As of now it only works with resources that do not need to be executed at server side. eg: images, txt, html, js

1. Enable .htaccess in apache (httpd.conf -> AllowOverride All)
2. Dropin the .htaccess file and the fileAuthaxs.php files into the root folder of the resources folder that you want to secure. eg: assets/
3. Edit the fileAuthaxs.php file to check for valid logged in session.

Now any requests to a file in the resource folder (eg: assets/) will be served through fileAuthaxs.php and the resource will only be returned if the authentication is passed.  
