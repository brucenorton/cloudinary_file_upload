$(function () {
  "use strict";
  let userEmail = '';
  let userCredit = '';

  $( document ).on( 'submit', '#uploader', function(event) {
    event.preventDefault();
    
    userEmail = $('#email').val();
    userCredit = $('#credit').val();
    console.log( 'clicked: ' + userEmail, userCredit );
    getUploadForm(userEmail, userCredit);

  });

  function getUploadForm(userEmail, userCredit){
    $.post( "upload_tags.php", {email: userEmail, credit: userCredit}, function( data ) {
      $('#uploader').html('Drag & drop photos here or <br/>');
      $( "#uploader" ).append( data );

      //The idea is to only load this once someone has filled out the form
      let newContext = 'email='+userEmail+'|credits='+userCredit;

      $('.cloudinary-fileupload')
      .cloudinary_fileupload({
        dropZone: '#direct_upload',
        context: newContext,
        start: function () {
          $('.status').css('opacity', 1);
          $('.status_value').text('Starting direct upload...');
        },
        progress: function () {
          $('.status_value').text('Uploading...');
        }
      })
      .bind('fileuploadprogress', function(e, data) { 
        $('.progress_bar').css('width', Math.round((data.loaded * 100.0) / data.total) + '%'); 
      })
      .on('cloudinarydone', function (e, data) {
          $('.status_value').text('Idle');
          $.post('upload_complete.php', data.result);

          $('.card-columns').append('<div class="card">'+
          '<img class="card-img-top img-fluid" src="'+data.result.url+'">'+
          '<div class="card-block"></div>'+
          '<footer class="card-text text-center card-footer">'+
          '<p><small class="text-muted">credit: '+userCredit+'</small></p>'+
          '<small class="text-muted">uploaded: '+data.result.created_at+'</small></footer></div>');
          

          //delete this once we no longer need the above
          var info = $('<div class="uploaded_info"/>');
          $(info).append($('<div class="data"/>').append(prettydump(data.result)));
          console.log("data tags" +data.result.tags);
          $(info).append($('<div class="image"/>').append(
            $.cloudinary.image(data.result.public_id, {
              format: data.result.format, width: 450, height: 450, crop: "fill"
            })
          ));
          $('.uploaded_info_holder').append(info);

          //end of stuff to delete
          
      });

    });//end .post

  }

});//end ready
