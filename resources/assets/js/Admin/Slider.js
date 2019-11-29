function selectPictureSlider(id){
    $('#'+id).trigger('click'); 
}

function sliderPictureValidation(id1,id2,btn){
    PictureCheck(id1,id2,btn)
}

function PictureCheck(id,id2,btn){
    var Size = $("#"+id)[0].files[0].size;
    var pdfPattern = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.svg)$/;

    if(Size<1200000){
        if(pdfPattern.test($("#"+id)[0].files[0].name))
        {
            $('#'+id2).css('backgroundColor','#36e51b');
            $('#'+id2).html('تصویر انتخاب شد');
            $('#Alert').css('display','none');
            $('#'+btn).attr("disabled", false);
        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('نام فایل باید انگلیسی یا عدد باشد و فرمت آن jpg یا jpeg یا svg');
            $('#'+btn).attr("disabled", true);
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 1mb است');
        $('#'+btn).attr("disabled", true);
    }
}

function deleteSlide(e,id){
    e.preventDefault();
    let conf = confirm('آیا از حذف اسلاید مطمئن هستید ؟');
    if(conf){
        window.location = Url+'admin/slider/delete/'+id;
    }
}