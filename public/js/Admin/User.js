function Usersearch(){
    var item= $('#UserSearch').val();
    
    if(item.trim() !=''){
        var url = URL+'admin/users/find/'+item.trim();
        $.get(url,function(data){
            var Result = [];
            data.map((value)=>{
                Result.push(value.naghme_user_name + ' ' +value.naghme_user_family);
            });
            $( "#UserSearch" ).autocomplete({
                source: Result
              });
        });
    }
}
function Finduser(event){
    event.preventDefault();
    var item= $('#UserSearch').val();
    window.location = URL+'admin/users/search/'+item.trim();
}

async function ChangeStatus(id,value){
    var Val = value === 'green' ? 0:1 ;
    $('#Spining').css('display','block');
    await $.ajax(
        { headers:{
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')
        },
        url:URL+'admin/users/change/status/'+id+'/'+Val,
        type:'get',
        success:function(response){
            if(response==1){
                
                if(value=='green'){
                    $('#Status'+id).css('color','red');
                    $('#Status'+id).attr('class','fas fa-times-circle');
                    $('#TdStatus'+id).attr('onclick','ChangeStatus('+id+',"red")');
                    $('#TdStatus'+id).attr('title','"عدم تمدید"');
                }
                else{
                    $('#Status'+id).css('color','green');
                    $('#Status'+id).attr('class','fas fa-check-circle');
                    $('#TdStatus'+id).attr('onclick','ChangeStatus('+id+',"green")');
                    $('#TdStatus'+id).attr('title','"تمدید"');
                }
            }
            else{
                alert('خطای سیستمی لطفا دوباره سعی کنید')
            }
        },
        error:function(error){
            console.log(error);
        }
    });
    $('#Spining').css('display','none');
}