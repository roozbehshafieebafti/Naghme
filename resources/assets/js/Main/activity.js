function PreviewPicturew(picSrc, prvImgId, linkId){
    document.getElementById(prvImgId).src= picSrc;
    document.getElementById(linkId).href = picSrc;
}

function commentClick(text,allow){
    if(allow === "1" && text.value === "لطفا دیدگاه خود را در اینجا ثبت نمایید"){
        text.value = ""     
    }
}

function comentOnchange(text){
   console.log(text);
}


function captchaRefresh (){
    $.ajax({
        headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]')
        },
       type:'GET',
       url:captchaUrl,
       success:function(data){
          $("#Captcha_Image").html(data.captcha);
       }
    });
}

function handleSubmit(){
    $("#login_btn_activity").html("<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>");
    var form = document.getElementById('loginFormContent');
    var values = {};
    for(var i=0; i<form.elements.length; i++){
        if( form.elements[i] !== undefined && form.elements[i].name!== ""){
            values[form.elements[i].name] = form.elements[i].value;
        }
    }
    values.AJAX = true;
    $.ajax({
        headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
       type:'POST',
       url: loginUrl,
       data: values,
       success:function(data){
        $("#login_btn_activity").html("ورود");
          if(data.data){
              location.reload();
          }
       },
       error : function(data){
           console.log("error",data);
           $("#login_btn_activity").html("ورود");
           $("#Modal_Alert").css({"display":"block"});
           if(data.status === 422){
               $("#Modal_Alert").html("لطفا تمامی مقادیر را صحیح پر کنید");
           }
       }
    });
}

function showRegisterPage(){
    $("#Actvity_Moadal_content").html('<div class="modal-header d-flex justify-content-between"><div><h5 class="modal-title" id="exampleModalCenterTitle">ثبت نام</h5></div><div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div><div class="modal-body"><form id="activity_registration_form" class="" method="GET"><div class="row d-flex justify-content-between pr-2 pl-2" ><div class="mb-3" style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >نام :</span></div><input type="text" name="regiser_name" id="regiser_name" class="form-control mt-2 col-sm-9 col-12 text-right" placeholder="نام"></div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >نام‌خانوادگی :</span></div><input type="text" name="regiser_family" id="regiser_family" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="نام‌خانوادگی"></div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >ایمیل :</span></div><input autocomplete="off" type="email" name="regiser_email" id="regiser_email" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="example@example.com"></div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >گذروازه :</span></div><input type="password" name="regiser_password" id="regiser_password" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="Password"></div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >تکرار گذروازه :</span></div><input type="password" name="regiser_password_re" id="regiser_password_re" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="Password"></div><div class="row text-right mt-2"><div style="position:relative;top:22px;" class="text-left col-md-4"><span style="color:#f6a619">&#9672;</span><span >کد امنیتی:</span></div><div class="col-md-8 col-12 captcha-container"><span id="Captcha_Image" class="login-captcha-image"><span style="position:relative;top:20px;"> لطفا کد را رفرش کنید</span></span><button type="button" class="btn btn-success mr-5" style="width:38px;height:38px;position:relative;top:15px;right:20px" onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button></div>                                            </div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#FFF;position:relative;top:4px;">&#9672;</span><span style="color:#FFF">کپچا:</span></div><input type="text" name="regiser_captcha"  class="form-control mt-2 col-sm-9 col-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید"></div><div id="Modal_Alert" class="alert alert-danger mt-2" style="display:none"></div><div class="d-flex justify-content-center mt-4"><button id="register_button" onclick="handleRegister()" type="button"  class="btn btn-success ml-3">ثبت‌نام</button><button type="button" onclick="showLoginPage()" class="btn mr-3">ورود</button></div></form></div>');
}

function showLoginPage(){
    $("#Actvity_Moadal_content").html('<div class="modal-header d-flex justify-content-between"><div><h5 class="modal-title" id="exampleModalCenterTitle">ورود به سایت</h5></div><div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                                    </div></div><div class="modal-body"><form class="" method="GET" id="loginFormContent"><div class="row d-flex justify-content-between pr-2 pl-2 mb-3" ><div class="mb-3" style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >ایمیل:</span></div><input type="email" name="email_ng" class="form-control mt-2 col-sm-9 col-12 text-right" placeholder="Enter email">                                            </div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#f6a619;position:relative;top:4px;">&#9672;</span><span >گذرواژه:</span></div><input type="password" name="password_ng" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="Password"></div><div class="row text-right mt-2"><div style="position:relative;top:22px;" class="text-left col-md-4"><span style="color:#f6a619">&#9672;</span><span >کد امنیتی:</span></div><div class="col-md-8 col-12 captcha-container"><span id="Captcha_Image" class="login-captcha-image"><span style="position:relative;top:20px;"> لطفا کد را رفرش کنید</span></span><button type="button" class="btn btn-success mr-5" style="width:38px;height:38px;position:relative;top:15px;right:20px" onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button></div>                                            </div><div class="row d-flex justify-content-between pr-2 pl-2"><div class="mb-3"  style="position:relative;top:10px"><span style="color:#FFF;position:relative;top:4px;">&#9672;</span><span style="color:#FFF">کپچا:</span></div><input type="text" name="captcha_ng"  class="form-control mt-2 col-sm-9 col-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید"></div><div id="Modal_Alert" class="alert alert-danger mt-2" style="display:none"></div><div class="d-flex justify-content-center mt-4"><button id="login_btn_activity" onclick="handleSubmit()" type="button" type="button" class="btn btn-success ml-3">ورود</button><button type="button" type="submit" onclick="showRegisterPage()" class="btn mr-3">ثبت‌نام</button></div></form></div>');
}

function handleRegister(){
    $("#register_button").html("<div class='spinner-border spinner-border-sm' role='status'><span class='sr-only'>Loading...</span></div>");
    var form = document.getElementById('activity_registration_form');
    var values = {};
    for(var i=0; i<form.elements.length; i++){
        if( form.elements[i] !== undefined && form.elements[i].name!== ""){
            values[form.elements[i].name] = form.elements[i].value;
        }
    }
    values.AJAX = true;
    $.ajax({
        headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
       type:'POST',
       url: registerUrl,
       data: values,
       success:function(data){
        $("#register_button").html("ثبت‌نام");
          if(data.data){
              location.reload();
          }
       },
       error : function(data){
           console.log("error",data);
           $("#register_button").html("ثبت‌نام");
           $("#Modal_Alert").css({"display":"block"});
           if(data.status === 422){
               $("#Modal_Alert").html("لطفا تمامی مقادیر را صحیح پر کنید");
           }
           if(data.status === 403){
                $("#Modal_Alert").html("این نام کاربری قبلا در سیستم ثبت شده است");
           }
           if(data.status === 400){
                $("#Modal_Alert").html("نام کاربری یا گذرواژه اشتباه است");
           }
           if(data.status === 500){
                $("#Modal_Alert").html("خطای سیستمی لطفا با مدیر سیستم تماس برقرار نمایید");
           }
       }
    });
}

