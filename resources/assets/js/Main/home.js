function openMenu() {
  $("#menuContent").css("display", "block");
  $(".not-menu-content").fadeIn("fast");
  $("#menuContent").animate({ width: "270px" });
//   $(".toggle-button-key").css({transform: "rotate(90deg)"});
}

function closeMenu() {
  $("#menuContent").animate({ width: "0px" });
  setTimeout(function() {
    $("#menuContent").css("display", "none");
    $(".not-menu-content").fadeOut("fast");
  }, 300);
}

function newsLetterSubmit(event){
  event.preventDefault();
  $(".News_Letter_btn").html('<div class="spinner-border spinner-border-sm text-dark mb-1" role="status"><span class="sr-only">Loading...</span></div>');
  var formdata = new FormData($('#News_Letter_form')[0]);
  $.ajax(
    { headers:{
        'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
    },
    url:newsLetterUrl,
    type:'post',
    data:formdata,
    success:function(response){ 
      var res =JSON.parse(response)
      if(res.data == true){
        console.log('success');
        $(".News_Letter_alert").html(res.response);
        $(".News_Letter_alert").css({fontSize: '16px', color: "green"});
        $(".News_Letter_btn").html('ثبت');
      }
      else{
        console.log('fail');
        $(".News_Letter_alert").html(res.response);
        $(".News_Letter_alert").css({fontSize: '16px', color: "red"});
        $(".News_Letter_btn").html('ثبت');
      }
    },
    error:function(error){ 
      console.log(error,error.response);
    },
    // Tell jQuery "Hey! don't worry about content-type and don't process the data"
    // These two settings are essential for the application
    contentType:false,
    processData: false 
    })
}

function searchAction (event){
  event.preventDefault();
  window.location = appBaseUrl + "search/"+$('#searchInput').val();
}