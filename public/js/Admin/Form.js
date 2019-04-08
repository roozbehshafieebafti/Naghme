function PdfFormCheck(id){
    var Size = $("#"+id)[0].files[0].size;
    var pdfPattern = /^([a-zA-Z0-9\s_\\.\-:])+(.pdf)$/;
    

    if(Size<8388608){
        if(pdfPattern.test($("#"+id)[0].files[0].name))
        {
            $('#FormSubmit').removeAttr("disabled");
            $('#Alert').css('display','none');

        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('فرمت فایل باید حتما pdf باشد');
            $('#Submit').attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 7mb است');
        $('#Submit').attr("disabled", true);
    }
}

function WordFormCheck (id){
    var Size = $("#"+id)[0].files[0].size;
    var docPatten = /^([a-zA-Z0-9\s_\\.\-:])+(.doc|.docx)$/;
    if(Size<8388608){
        if(docPatten.test($("#"+id)[0].files[0].name))
        {
            $('#FormSubmit').removeAttr("disabled");
            $('#Alert').css('display','none');
        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('فرمت فایل باید حتما doc یا docx باشد');
            $('#Submit').attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 7mb است');
        $('#Submit').attr("disabled", true);
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
        var formdata = new FormData($('#FormOfForm')[0]);
        $.ajax(
        { headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
        url:FormUrl,
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
                window.location.href = Form;
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

    $('#FormOfForm').submit(function(e)
    {
        e.preventDefault();
        $(pbar).width(0).addClass('active');
        $('#progressBarDiv').css({"display":"block"});
        uploadFile();
    });
})