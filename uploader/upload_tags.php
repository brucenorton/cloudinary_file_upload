<?php
  header("Access-Control-Allow-Origin: *");
  require 'main.php';

  # The callback URL is set to point to an HTML file on the local server which works-around restrictions 
  # in older browsers (e.g., IE) which don't full support CORS.
  $email = $_REQUEST['email'];
  $credit = $_REQUEST['credit'];
  $context = array("email" => $email, "credits" => $credit);
  /*setting both tags & meta info to same*/
  $tagArray = array($email, $credit);

  echo cl_image_upload_tag('test', array(
    "tags" => $tagArray, 
    "context" => $context, 
    "callback" => $cors_location,
    "use_filename" => true, 
    "html" => array("multiple" => true)
  ));


?>