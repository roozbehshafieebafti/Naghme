function FindPots(){
    var item= $('#PostsSearch').val();
    
    if(item.trim() !=''){
        var url = URL+'admin/post/find/'+item.trim();
        $.get(url,function(data){
            var Result = [];
            data.map((value)=>{
                Result.push(value.apst_title);
            });
            $( "#PostsSearch" ).autocomplete({
                source: Result
              });
        });
    }
}
function Search(event){
    event.preventDefault();
    var item= $('#PostsSearch').val();
    window.location = URL+'admin/post/search/'+item.trim();
}
function PostPictureCheck(id){
    var Size = $("#"+id)[0].files[0].size;
    var pdfPattern = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/;

    if(Size<350000){
        if(pdfPattern.test($("#"+id)[0].files[0].name))
        {
            
            $('#PostSubmit').removeAttr("disabled");
            $('#Alert').css('display','none');

        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('فرمت فایل باید حتما jpg , jpeg یا png  باشد');
            $('#PostSubmit').attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 300kb است');
        $('#PostSubmit').attr("disabled", true);
    }
}

async function GetSubTitle(id){
    $('#Spining').css('display','block');
    await $.ajax(
        { headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
        url:BaseUrl+'admin/post/sub-activity/'+id,
        type:'get',
        success:function(response){
            
            if(response.length > 0){
                var str = '';
                for(i=0;i<response.length;i++){
                    str= str + '<option value="'+response[i].id+'">'+response[i].sat_title + '</option>';
                }
                $('#SubTitle').html(str);
                $('#SubTitle').removeAttr('disabled');
            }
            else{
                $('#SubTitle').html('');
                $('#SubTitle').attr("disabled", true);
            }
        },
        error:function(error){
            console.log(error);
        }
    });
    $('#Spining').css('display','none');
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

    function uploadFile(id)
    {
        var formdata = new FormData($('#'+ id)[0]);
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

    $('#PostGalleryForm').submit(function(e)
    {
        e.preventDefault();
        $('#PostSubmit').attr("disabled", true);
        $(pbar).width(0).addClass('active');
        $('#progressBarDiv').css({"display":"block"});
        uploadFile('PostGalleryForm');
    });
});

tinymce.init({
    selector: '#PostTextArea',plugins: "link",
  });