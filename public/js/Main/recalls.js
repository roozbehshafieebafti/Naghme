// از صفحه آموزش به صفحه تکمیل اطلاعات
function startRecall(){
    $('#RecallLearningPart').fadeOut('fast');
    $('#mainRecallContent').fadeIn('slow');
    window.scrollTo({top:0 , behavior: "smooth"});
}
// برگشت از صفحه تکمیل اطلاعات به صفحه آموزش
function backwardToLearnPage(){
    $('#mainRecallContent').fadeOut('fast');
    $('#RecallLearningPart').fadeIn('slow');
}

// مربوط به تغییر تب ها  و نمایش برجسته عنوان تب ها
function tabsClick(element){
    $(".recall-tabs").css({color: "#000000" , fontWeight: "normal"});
    element.style.color = "#790000";
    element.style.fontWeight = "bold";
}



/** 
 * مربوط به تب مشخصات
 * */  

// ارزیابی اطلاعات وارد شده در فرم تکمیل مشخصات
function recalInformationValidation(data){
    var  count=0;
    // کد ملی
    if(data.nationalCode === undefined || data.nationalCode.trim()=== "" || data.nationalCode.trim().length<=9){
        $('#nationalCode').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#nationalCode').attr("class","form-control is-valid");
    }
    // تاریخ تولد
    if(data.birthDate === undefined || data.birthDate.trim()=== "" || data.birthDate.trim().length<=7){
        $('#birthDate').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#birthDate').attr("class","form-control is-valid");
    }
    //  محل تولد
    if(data.birthLocation === undefined || data.birthLocation.trim()=== ""){
        $('#birthLocation').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#birthLocation').attr("class","form-control is-valid");
    }
    // شماره همراه
    if(data.phoneNumber === undefined || data.phoneNumber.trim()=== "" || data.phoneNumber.trim().length<=9){
        $('#phoneNumber').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#phoneNumber').attr("class","form-control is-valid");
    }
    // شماره ثابت
    if(data.constantNumber === undefined || data.constantNumber.trim()=== "" || data.constantNumber.trim().length<=7){
        $('#constantNumber').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#constantNumber').attr("class","form-control is-valid");
    }    
    // شماره آدرس
    if(data.address === undefined || data.address.trim()=== ""){
        $('#address').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#address').attr("class","form-control is-valid");
    }    
    // رشته تحصیلی
    if(data.major === undefined || data.major.trim()=== ""){
        $('#major').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#major').attr("class","form-control is-valid");
    }
    // مقطع تحصیلی
    if(data.levelOfEducation === undefined || data.levelOfEducation.trim()=== ""){
        $('#levelOfEducation').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#levelOfEducation').attr("class","form-control is-valid");
    }
    // نام دانشگاه
    if(data.univercityName === undefined || data.univercityName.trim()=== ""){
        $('#univercityName').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#univercityName').attr("class","form-control is-valid");
    }
    // خلاصه سوابق هنری
    if(data.brifeArtActions === undefined || data.brifeArtActions.trim()=== ""){
        $('#brifeArtActions').attr("class","form-control is-invalid");
        count++;
    }
    else{
        $('#brifeArtActions').attr("class","form-control is-valid");
    }

    if(count>0){
        return false;
    }
    else{
        return true;
    }

}
// ارسال اطلاعات فرم تکمیل مشخصات به سرور
function recallInformationSubmit(e){
    e.preventDefault();
    $('#recall_information_submit_btn').attr("disabled","disabled");    
    var form = document.getElementById('recallInformationForm');
    var values = {};
    for(var i = 0 ; i<form.elements.length; i++ ){
        if(form.elements[i] !== undefined && form.elements[i].name !== ""){
            values[form.elements[i].name] = form.elements[i].value;
        }
    }
    console.log("validation",recalInformationValidation(values));
    if(recalInformationValidation(values)){
        console.log("values",values);
        $('#recall_information_submit_btn').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
        $("#recallInformationAllert").css({"display":"block"});
        $.ajax({
            headers:{'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
            url:createUserInformationUrl,
            type:'POST',
            data:values,
            success: function(response){
                console.log("response",response);
                $("#recallInformationAllert").fadeOut('fasts');
                $('#recall_information_submit_btn').html('تکمیل اطلاعات');
                $('#recall_information_submit_btn').css({display: "none"});
                $('#recallSendingResultAlert').fadeIn('slow');
                $('#recallSendingResultAlert_class').attr({class: "alert alert-success"});
                $('#recallSendingResultAlert_class').html("اطلاعات شما با موفقیت ثبت شد");                
                hasUserInformation = 1; // تب بارگذاری فعال می‌شود
                for(var j = 0 ; j<form.elements.length; j++ ){
                    if(form.elements[j] !== undefined && form.elements[j].name !== ""){
                        $('#'+form.elements[j].id).attr("disabled","disabled");
                        $('#'+form.elements[j].id).attr("class","form-control");
                    }
                }
                setTimeout(function(){
                    $('#recallSendingResultAlert').fadeOut('fasts');
                },3000);
                $('#NextStepUpload').html('<div class="row pt-3 pr-2 pl-2 pb-5 d-flex justify-content-center"><div class="col-10 text-right"><span onclick="backwardToLearnPage()" class="btn btn-danger mr-1 ml-1" style="font-weight:bold"><i class="fas fa-arrow-circle-right" style="position:relative;top:3px;"></i> مرحله قبل </i></span><span onclick="activeUploadTab()" class="btn btn-success" style="font-weight:bold">مرحله بعد <i class="fas fa-arrow-circle-left" style="position:relative;top:3px;" ></i></span></div></div>');
                
            },
            error: function(error){
                console.log("error",error);
                $("#recallInformationAllert").css({"display":"none"});
                $('#recall_information_submit_btn').html('تکمیل اطلاعات');
                $('#recall_information_submit_btn').removeAttr("disabled");   
                $('#recallSendingResultAlert').css({display: "block"});
                $('#recallSendingResultAlert_class').attr({class: "alert alert-danger"});
                if(error.responseJSON && "data" in error.responseJSON){
                    $('#recallSendingResultAlert_class').html(error.responseJSON.data);
                }
                else{
                    $('#recallSendingResultAlert_class').html('خطای سیستمی لطفا با مدیر سیستم تماس حاصل نمایید');
                }
                for(var j = 0 ; j<form.elements.length; j++ ){
                    if(form.elements[j] !== undefined && form.elements[j].name !== ""){
                        $('#'+form.elements[j].id).attr("class","form-control");
                    }
                }
                setTimeout(function(){
                    $('#recallSendingResultAlert').css({display: "none"});
                },5000);
            }
        });
    }
    else{
        $('#recall_information_submit_btn').removeAttr("disabled");
        return;
    }
}
function activeUploadTab(){
    $('#profile-tab').click();
    window.scrollTo({  top: 0,behavior: 'smooth'});
}



/**
 * مربوط به تب بارگذاری
 */

function selectUploadTab(){
    // آیا کاربر اطلاعات خودش را بارگذاری کرده است
    if(hasUserInformation){
        // نمایش فرم بار گذاری
        $("#uploadingTabContent").css({display: "block"});
        $("#uploadingTabAlert").css({display: "none",minHeight: 0});
        $("#uploadingTabAlert").html('<div id="uploadingTabAlertElement"></div>');
    }
    else{
        // نمایش اخطار آپلود
        $("#uploadingTabContent").css({display: "none"});
        $("#uploadingTabAlert").css({display: "block"});
        $("#uploadingTabAlert").html('<div id="uploadingTabAlertElement" class="alert alert-warning col-10 text-center">برای بارگذاری آثار، اطلاعات خود را در تب مشخصات کامل کنید</div>');
        
    }
}
// کیلک بر روی اینپوت دریافت عکس
function selectFileClick(){
    document.getElementById("pictureFile").click();
}
// ارور در هنگام انتخاب عکس
var errorOnSendFile = false;
// آیا کاربر عکس جدید بارگذاری کرده است
var hasUserWorks = 0;
// تغییر اینوپوت دریافت فایل
function changePicture(){
    var preview = document.getElementById("sendingImagePreview");
    var file    = document.querySelector('#pictureFile').files[0];
    if(file.size>700*1000){
        errorOnSendFile = true;        
        $('#sendingPictureAlert').html("سایز تصویر بیشتر از حد مجاز است");
        $('#sendingPictureAlert').css({display: "block"});
    }
    else{
        var pattern = /^.*\.(gif|GIF|jpe?g|JPE?G|bmp|BMP|png|PNG)$/
        if(!pattern.test(file.name)){
            errorOnSendFile = true;
            $('#sendingPictureAlert').html("فرمت فایل مناسب نیست");
            $('#sendingPictureAlert').css({display: "block"});
        }
        else{
                errorOnSendFile = false;
                $('#sendingPictureAlert').css({display: "none"});
                $('#sendingPictureAlert').html("");
                var reader  = new FileReader();
                reader.addEventListener("load", function () {
                preview.src = reader.result;                
                }, false);            
                if (file) {
                   reader.readAsDataURL(file);
                 }
        }
    }
    
}
// آپلود کار
$(function()
{ 
    // progres par
    var pbar = $('#progressBar'), currentProgress = 0 ;
    // تغییرات پروگرس بار
    function trackUploadProgress(e)
    {
        if(e.lengthComputable)
        {
        currentProgress = (Math.floor((e.loaded / e.total) * 1000)/10); // Amount uploaded in percent
        $(pbar).width(currentProgress+'%');
        $(pbar).html('<span style="font-size: 18px;">'+currentProgress+'%'+'</span>')
        if( currentProgress == 100 )
        console.log('Progress : 100%');
        }
    }
    // Ajax
    function uploadFile(data)
    {        
        var file = $('#pictureFile')[0].files[0];
        var formdata = new FormData();
        formdata.append("file",file);
        for(index in data){
            formdata.append(index,data[index]);
        }

        $.ajax(
        { headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
        url:uploadWorksUrl,
        type:'POST',
        data: formdata,
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
            hasUserWorks = 1; //یعنی کار در آرشیو وجود دارد
            $('#uploadingAlert').fadeIn('fast');
            $('#uploadingAlertElement').fadeIn('fast');
            $('#uploadingAlertElement').attr('class','alert alert-success col-10 text-center');
            $('#uploadingAlertElement').html('عکس با موفقیت بارگذاری شد');
            $('#progressBarDiv').css({"display":"none"});
            $('#sendingWorkBtn').css("display", "none");
            $('#sendingWorkBtn').html('بارگذاری');
            $('#newPictureUploading').fadeIn('fast');
            getArchiveWorks(data.uploadUserId, data.recallId);
            $('#NextStepRegister').html('<div class="row pt-3 pr-2 pl-2 d-flex justify-content-center"><div class="col-10 text-center"><span onclick="activeRegisterTab()" class="btn btn-info" style="width:200px;font-weight:bold">مرحله بعد</span></div></div>');
            setTimeout(function(){
                $('#uploadingAlertElement').fadeOut();
            },3000); 
                
        },
        error:function(error){ 
            console.log("error",error);
            $('#uploadingAlert').fadeIn('fast');
            $('#uploadingAlertElement').attr('class','alert alert-danger col-10 text-center');
            $('#progressBarDiv').css({"display":"none"});
            if(error.responseJSON && "data" in error.responseJSON){
                $('#uploadingAlertElement').html(error.responseJSON.data);
            }
            else{
                $('#uploadingTabAlertElement').html('خطای سیستمی لطفا با مدیر سیستم تماس حاصل نمایید');
            }
            $('#sendingWorkBtn').html('بارگذاری');
            $('#sendingWorkBtn').removeAttr("disabled");
            $('#NextStepRegister').html('<div class="row pt-3 pr-2 pl-2 d-flex justify-content-center"><div class="col-10 text-center"><span onclick="activeRegisterTab()" class="btn btn-info" style="width:200px;font-weight:bold">مرحله بعد</span></div></div>');
        },

        // Tell jQuery "Hey! don't worry about content-type and don't process the data"
        // These two settings are essential for the application
        contentType:false,
        processData: false 
        })
    }
    // ارزیابی اطلاعات فرم بارگذاری
    function uploadDataValidation(data){
        var count = 0;
        for(var k in data){
            if(k === "pictureFile"){
                if(data[k] === undefined || data[k].trim()=== ""){
                    $('#sendingImagePreview').css({"border": "solid 1px red"});
                    count++;
                }
                else{
                    $('#sendingImagePreview').css({"border": "none"});
                }
            }
            else{
                if(data[k] === undefined || data[k].trim()=== ""){
                    $('#'+k).attr("class","form-control is-invalid");
                    count++;
                }
                else{
                    $('#'+k).attr("class","form-control is-valid");
                }
            }
        }
        return count;
    }
    // دریافت اطلاعات فرم بارگذاری
    function GetWorkSendingFormData(){
        var form = document.getElementById('sendingWorkForm');
        var values = {};
        for(var i = 0 ; i<form.elements.length; i++ ){
            if(form.elements[i] !== undefined && form.elements[i].name !== ""){
                values[form.elements[i].name] = form.elements[i].value;
            }
        }
        return values;
    }
    // ارسال اطلاعات
    $('#sendingWorkForm').submit(function(e)
    {
        e.preventDefault();
        var data = GetWorkSendingFormData();
        var validate = uploadDataValidation(data);
        if(validate>0){
            return;            
        }
        if(errorOnSendFile){
            $('#sendingImagePreview').css({"border": "solid 1px red"});
            return;
        }
        else{
            $('#sendingImagePreview').css({"border": "none"});
        }

        $('#sendingWorkBtn').attr("disabled", "disabled");
        $('#sendingWorkBtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
        $(pbar).width(0).addClass('active');
        $('#progressBarDiv').css({"display":"block"});
        uploadFile(data);
    });

});
// برای ارسال عکس جدید - مقدار اینپوت ها را خالی می کند
function uploadingFormReset(){
    var form = document.getElementById('sendingWorkForm');
    $('#sendingWorkBtn').css("display", "block");
    $('#sendingWorkBtn').removeAttr("disabled");
    $('#newPictureUploading').css("display", "none");
    $('#uploadingTabAlert').fadeOut('fast');
    var filedId = ['title' , 'productionData' , 'workSize' , 'workTechniuqe', 'workStatments', 'pictureFile'];
    filedId.forEach(function(element){
        $('#'+element).val('');
    });
    $('#sendingImagePreview').attr({src : noImageSrc});
}



/**
 * مربوط به بخش آرشیو
 */
// دریافت عکس های آرشیو
function getArchiveWorks(userId,recalId){
    
    if(hasUserWorks){
        $('#ArchiveContainer').html('<div class="d-flex justify-content-center pt-5 pb-5"><div class="spinner-border text-warning" id="LoadingItem" style="width: 4rem; height: 4rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        $('#ArchiveAlertDiv').css("display",'none');
        $.ajax({
            headers:{
                'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
            },
            url:baseUrl + 'recall/get-user-works/'+userId+'/'+recalId,
            type:'GET',
            success: function(response){
                var ShowenText = '<div id="ArchiveConterntId" class="row pt-3 pr-2 pl-2">';
                response.forEach(function(element){
                    ShowenText = ShowenText + '<div class="col-xl-4 col-md-6 col-12"><div class="card mt-1 mb-2" ><img src="'+baseUrl+'/'+element.picture+'" class="card-img-top" alt="..."><div class="card-body"><div style="list-style: none"><div class="d-flex justify-content-start"><span class="recall-Archive-title">عنوان:</span><span>'+element.title+'</span></div><div class="d-flex justify-content-start"><span class="recall-Archive-title">سال تولید:</span><span>'+element.production_date+'</span></div><div class="d-flex justify-content-start"><span class="recall-Archive-title">اندازه اثر:</span><span>'+element.size+'</span></div><div class="d-flex justify-content-start"><span class="recall-Archive-title">تکنیک:</span><span>'+element.technique+'</span></div><div class="d-flex justify-content-start"><span class="recall-Archive-title">بیانیه:</span><span style="display:inline-block;width:200px">'+element.statements+'</span></div><div class="d-flex justify-content-end"><span class="recall-Archive-title text-danger" style="cursor:pointer" onclick="deleteUserWorks('+element.id+',this,'+userId+','+recalId+')">حذف</span></div></div></div></div></div>';
                });
                ShowenText = ShowenText + '</div>'
                $('#ArchiveContainer').html(ShowenText);
                // عکسهای جدید بارگذاری شد
                hasUserWorks = 0;
            },
            error: function(error){
                console.log("error",error);
                $('#ArchiveContainer').html('');
                $('#ArchiveAlertDiv').css("display",'block');
                $('#ArchiveAlertDiv').html("متاسفانه خطایی در برنامه رخ داده است لطفا به مدیر سیستم اطلاع دهید");
            }
        });

    }
    // else{
    //     console.log('no content');
    // }
}
// حذف عکس های کاربر
function deleteUserWorks(wrokId,elements,userId,recalId){
    if(confirm('آیا از حذف عکس مطمئن هستید؟')){
        elements.innerHTML = '<div class="spinner-border text-danger " role="status"><span class="sr-only">Loading...</span></div>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
            },
            url:baseUrl + '/recall/delete-work/'+wrokId,
            type:'DELETE',
            success : function(response){
                hasUserWorks=1;
                getArchiveWorks(userId,recalId);
            },
            error: function(error){console.log(error)}
        })
    }
}
// 
function activeRegisterTab(){
    $('#submit-tab').click();
    window.scrollTo({  top: 0,behavior: 'smooth'});
}




/**
 * مربوط به تب ثبت نهایی
 */
// انتخاب تب ثبت نهایی
function selectRegisterTab(){
     // آیا کاربر اطلاعات خودش را بارگذاری کرده است
     if(hasUserInformation){
        // نمایش فرم بار گذاری
        $("#registerTabContent").css({display: "block"});
        $("#RegisterTabAlert").css({display: "none",minHeight: 0});
        $("#RegisterTabAlert").html('');
    }
    else{
        // نمایش اخطار آپلود
        $("#registerTabContent").css({display: "none"});
        $("#RegisterTabAlert").css({display: "block"});
        $("#RegisterTabAlert").html('<div id="RegisterTabAlertElement" class="alert alert-warning col-10 text-center">ابتدا مشخصات خود را کامل کنید</div>');
        
    }
}
// 
function changeSubmitBtn(element){
    console.log(element.checked)
    if(element.checked){
        $('#finalSubmitBtn').removeAttr("disabled");
    }
    else{
        $('#finalSubmitBtn').attr("disabled", "disabled");
    }
}
// 
function finalFormSubmition(e,userId,recallId){
    e.preventDefault();
    $('#finalSubmitBtn').attr("disabled", "disabled");
    $('#finalSubmitBtn').html('<div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div>');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
        url:baseUrl + '/recall/'+userId+'/'+recallId,
        type:'POST',
        success: function(response){
            console.log('response',response);
            $('#finalSubmitBtn').removeAttr("disabled");
            $('#finalSubmitBtn').html('ثبت نهایی');
            $('#submiAlertDiv').html('<div class="alert alert-success">فرهیخته گرامی، آثار شما با موفقیت ثبت نهایی شدند.</div>')
            setTimeout(function(){
                window.location.reload();
            },2000);

        },
        error: function(error){
            console.log('response',error);
            $('#finalSubmitBtn').removeAttr("disabled");
            $('#finalSubmitBtn').html('ثبت نهایی');
            if(error.responseJSON && "data" in error.responseJSON){
                $('#submiAlertDiv').html('<div class="alert alert-danger">'+error.responseJSON.data+'</div>');
            }
            else{
                $('#submiAlertDiv').html('<div class="alert alert-danger">خطای سیستمی لطفا با مدیر سیستم تماس حاصل نمایید</div>');
            }
        }
    })
}
