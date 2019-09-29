function form_registration(e){
    e.preventDefault();
    var name = document.getElementById("regiser_name").value ,
        family = document.getElementById("regiser_family").value ,
        email = document.getElementById("regiser_email").value ,
        password = document.getElementById("regiser_password").value ,
        passwordRe = document.getElementById("regiser_password_re").value ,
        captcha = document.getElementById("regiser_captcha").value;

        //  name validation
        if(name.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "red";
            return;
        }
        //  family validation
        if(family.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "red";
            return;
        }
        //  email validation
        if(email.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "gray";
            document.getElementById("regiser_email").style.borderColor = "red";
            return;
        }
        //  password validation
        if(password.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "gray";
            document.getElementById("regiser_email").style.borderColor = "gray";
            document.getElementById("regiser_password").style.borderColor = "red";
            return;
        }
        //  passwordRe validation
        if(passwordRe.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "gray";
            document.getElementById("regiser_email").style.borderColor = "gray";
            document.getElementById("regiser_password").style.borderColor = "gray";
            document.getElementById("regiser_password_re").style.borderColor = "red";
            return;
        }
        //  passwordRe == password  validation
        if(passwordRe.trim() != password.trim()){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "gray";
            document.getElementById("regiser_email").style.borderColor = "gray";
            document.getElementById("regiser_password").style.borderColor = "red";
            document.getElementById("regiser_password_re").style.borderColor = "red";
            return;
        }
        // captcha validation
        if(captcha.trim() == ""){
            document.getElementById("regiser_name").style.borderColor = "gray";
            document.getElementById("regiser_family").style.borderColor = "gray";
            document.getElementById("regiser_email").style.borderColor = "gray";
            document.getElementById("regiser_password").style.borderColor = "gray";
            document.getElementById("regiser_password_re").style.borderColor = "gray";
            document.getElementById("regiser_captcha").style.borderColor = "red";
            return;
        }

        e.currentTarget.submit();
}

function captchaRefresh (){
    $.ajax({
        headers:{
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]')
        },
       type:'GET',
       url:'refreshcaptcha',
       success:function(data){
          $("#Captcha_Image").html(data.captcha);
       }
    });
}