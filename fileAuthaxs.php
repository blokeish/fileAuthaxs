<?php

/*
** Description: Delegates all file access request to the folder and subfolders. Send the file to the requester if the authentication is successful. 
** Author: Alfie Punnoose
*/

# Authenticate access
# Implement your own auth procedure below
/* // example code  
  require_once('../auth.php');
  if(!$auth->is_loggedin()){
     header('HTTP/1.0 401 Unauthorized');
     exit;
  }
*/


$axsExclusionList = array('php','sh','cgi'); // extend this list accordin to your requirement


$reqFile = $_REQUEST['axsflpth']; // get requested file path, set by the .htaccess file

$path_parts = pathinfo($reqFile);

if(in_array(strtolower($path_parts['extension']) , $axsExclusionList)){
  header('HTTP/1.0 401 Unauthorized'); // access disabled to script files as of now
  exit;
}

# Send file to requester


if(empty($reqFile) OR !file_exists($reqFile)){
  header("HTTP/1.0 404 Not Found"); // respond with file not found
  exit;
}

header('Content-Description: File Transfer');
header('Content-Type: '.mime_content_type($reqFile));
header('Content-Length: ' . filesize($reqFile));
header('Expires: 0');
header('Cache-Control: must-revalidate');
readfile($reqFile);
exit;


?>
