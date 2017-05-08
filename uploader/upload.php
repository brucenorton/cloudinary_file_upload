<?php
  header("Access-Control-Allow-Origin: *");
  require 'main.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>SureOps Upload demo signed</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/cloudinary.css" media="all" rel="stylesheet" />
  <link href="css/style.css" media="all" rel="stylesheet" />




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.18.0/js/vendor/jquery.ui.widget.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.18.0/js/jquery.iframe-transport.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.18.0/js/jquery.fileupload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cloudinary-jquery-file-upload/2.3.0/cloudinary-jquery-file-upload.js"></script>
    <?php echo cloudinary_js_config(); ?>
  </head>
  
  <body>
  	
    <div id="logo">
      <!-- This will render the image fetched from a remote HTTP URL using Cloudinary -->
      <?php //echo fetch_image_tag("http://cloudinary.com/images/logo.png") ?>
    </div>
    
    <section class="container">

    
    <!-- A form for direct uploading using a jQuery plug-in. 
          The cl_image_upload_tag PHP function generates the required HTML and JavaScript to
          allow uploading directly from the browser to your Cloudinary account -->
    <h1>Deicing Photos Upload</h1>      
    <div id='direct_upload'>
      
      
      <form id="uploader">
        <p class="lead">To upload photos to SureOps: </p>
        <label for="email">Provide your email.<br>
              <input type="email" name="email" id="email" title="Email" required="" placeholder="email" />
        </label><br>
        <label for="credit">Add photo credit.<br>
              <input type="text" name="credit" id="credit" title="Photo Credit" placeholder="photographer" />
        </label><br>
        <input type="submit" value="next" >

      </form>
      
    <!-- status box -->
    <div class="row">
      <div class="status">
        <h4>Upload Progress</h4>
        <span class="status_value">Idle</span>
        <div id="glass">
          <div class="progress_bar"></div>
        </div>
        
      </div>
    </div>

      <div class="row" id="gallery">
        <section class="card-columns">

        </section>
      </div>      
      <hr>
      <h2>stuff to be removed</h2>
      <div class="uploaded_info_holder">

      </div>

    </div>

  </section>
    <script>
      function prettydump(obj) {
        ret = "";
        $.each(obj, function(key, value) {
          ret += "<tr><td>" + key + "</td><td>" + value + "</td></tr>";
        });
        return ret;
      }
      
    </script>
<script src="js/upload.js"></script>

  </body> 
</html>

