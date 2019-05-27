function selectPictureSlider(id){
    $('#'+id).trigger('click'); 
}

function sliderPictureValidation(id1,id2){
    PictureCheck(id1,id2)
}

function PictureCheck(id,id2){
    var Size = $("#"+id)[0].files[0].size;
    var pdfPattern = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.svg)$/;

    if(Size<1200000){
        if(pdfPattern.test($("#"+id)[0].files[0].name))
        {
            $('#'+id2).css('backgroundColor','#36e51b');
            $('#'+id2).html('تصویر انتخاب شد');
            $('#Alert').css('display','none');

        }
        else{
            $('#Alert').css('display','block');
            $('#Alert').html('نام فایل باید انگلیسی یا عدد باشد و فرمت آن jpg یا jpeg یا svg');
        }
    }
    else{
        $('#Alert').css('display','block');
        $('#Alert').html('سایز فایل وارد شده بیش از 1mb است');
    }
}