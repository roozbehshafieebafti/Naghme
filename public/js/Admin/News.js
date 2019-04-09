$( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#NewsSearch" ).autocomplete({
      source: availableTags
    });
  } );





  function PictureNewsCheck(id){
    var Size = $("#"+id)[0].files[0].size;
    var pdfPattern = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.svg)$/;
    

    if(Size<350000){
        if(pdfPattern.test($("#"+id)[0].files[0].name))
        {
            $('#NewsSubmit').removeAttr("disabled");
            $('#Alert').css('display','none');

        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('فرمت تصویر نامناسب است');
            $('#NewsSubmit').attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز تصویر بیش از حد مجاز است');
        $('#NewsSubmit').attr("disabled", true);
    }
}

function FileNewsCheck (id){
    var Size = $("#"+id)[0].files[0].size;
    var docPatten = /^([a-zA-Z0-9\s_\\.\-:])+(.doc|.docx|.pdf)$/;
    if(Size<8388608){
        if(docPatten.test($("#"+id)[0].files[0].name))
        {
            $('#NewsSubmit').removeAttr("disabled");
            $('#Alert').css('display','none');
        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('فرمت فایل باید حتما doc یا docx یا pdf باشد');
            $('#NewsSubmit').attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 7mb است');
        $('#NewsSubmit').attr("disabled", true);
    }
}


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
    var formdata = new FormData($('#FormOfNews')[0]);
    $.ajax(
    { headers:{
        'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
    },
    url:NewsUrl,
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
            window.location.href = News;
        },1000);
        }
        else{
        $('#Alert').css('display','block');
        $('#Alert').html('خطای سیستمی لطفا دوباره سعی کنید');
        }
        },
    error:function(error){ $('#Alert').css('display','block');$('#Alert').html('خطا، فایل ارسال نشد'); },

    // Tell jQuery "Hey! don't worry about content-type and don't process the data"
    // These two settings are essential for the application
    contentType:false,
    processData: false 
    })
}
function FormOfNews(event){
    event.preventDefault();
    $('#NewsSubmit').attr("disabled", true);
    $(pbar).width(0).addClass('active');
    $('#progressBarDiv').css({"display":"block"});
    uploadFile();
}