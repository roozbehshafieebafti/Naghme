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