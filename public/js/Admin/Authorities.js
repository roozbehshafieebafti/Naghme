function AuthoritiesPicture(){
	 var fileSize = $("#Authorities_picture")[0].files[0].size;
	 var pattern = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|.svg)$/;
	 console.log('gi');
	 if(fileSize>358400){
    	$('#Alert').css('display','block');
    	$('#Alert').html('سایز فایل وارد شده بیش از 300 کیلوبایت است');
    	$('#Authorities_Submit').attr('disabled','disabled');
  	}
  	else{
	    if(!pattern.test($("#Authorities_picture")[0].files[0].name))
	    {
	        $('#Alert').css('display','block');
	        $('#Alert').html('فرمت فایل بایستی  jpg یا png یا  svg باشد');
	        $('#Authorities_Submit').attr('disabled','disabled');
	    }else{
	      $('#Authorities_Submit').removeAttr('disabled');
	      $('#Alert').css('display','none');
	    }  
  	}
}
// ادیتور تازیخچه اینجا اضافه شده است
tinymce.init({
	selector: '#History_data',plugins: "link",
});

tinymce.init({
	selector: '#Representation_History',plugins: "link",
});

tinymce.init({
	selector: '#Authorities_cv',plugins: "link",
});

tinymce.init({
	selector: '#representaion_cv',plugins: "link",
});