var valid =false;
function checkSize(){
   var fileSize = $("#Regulation_File")[0].files[0].size;
   var pattern = /^([a-zA-Z0-9\s_\\.\-:])+(.doc|.docx|.pdf)$/;
  if(fileSize>8388608){
    $('#Alert').css('display','block');
    $('#Alert').html('سایز فایل وارد شده بیش از 7mb است');
  }
  else{
    if(!pattern.test($("#Regulation_File")[0].files[0].name))
    {
        $('#Alert').css('display','block');
        $('#Alert').html('فرمت فایل بایستی pdf یا docx باشد');
    }else{
      $('#Submit').attr('disable','none');
      $('#Alert').css('display','none');
      valid=true;
    }  
  }
  

      
}

$(function()
{ 
  var pbar = $('#progressBar'), currentProgress = 0 ;
  function trackUploadProgress(e)
  {
    if(e.lengthComputable)
    {
      currentProgress = (e.loaded / e.total) * 100; // Amount uploaded in percent
      $(pbar).width(currentProgress+'%');
      $(pbar).html('<span style="font-size: 18px;">'+currentProgress+'%'+'</span>')
      if( currentProgress == 100 )
      console.log('Progress : 100%');
    }
  }

  function uploadFile()
  {
    var formdata = new FormData($('#RegulationForm')[0]);
    $.ajax(
    { headers:{
        'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
      },
      url:RegulationUrl,
      type:'post',
      data:formdata,
      xhr: function()
      {
        // Custom XMLHttpRequest
        var appXhr = $.ajaxSettings.xhr();

        // Check if upload property exists, if "yes" then upload progress can be tracked otherwise "not"
        if(appXhr.upload)
        {
          // Attach a function to handle the progress of the upload
          appXhr.upload.addEventListener('progress',trackUploadProgress, false);
        }
        return appXhr;
      },
      success:function(response){ 
        if(response==1){
          setTimeout(()=>{
            window.location.href = Regulation;
          },1000);
         }
         else{
          $('#Alert').css('display','block');
          $('#Alert').html('خطای سیستمی لطفا دوباره سعی کنید');
         }
        },
      error:function(error){console.log(error); alert(error.responseJSON.ufile) },

      // Tell jQuery "Hey! don't worry about content-type and don't process the data"
      // These two settings are essential for the application
      contentType:false,
      processData: false 
    })
  }

  $('#RegulationForm').submit(function(e)
  {
    e.preventDefault();

    if(valid){
      $(pbar).width(0).addClass('active');
      $('#progressBarDiv').css({"display":"block"});
      uploadFile();
    }
    else{
      $('#Alert').css('display','block');
      $('#Alert').html('فایل نا معتبر است');
    }

  });
})