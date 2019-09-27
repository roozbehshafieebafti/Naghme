$(document).ready(function(){
    var container = $('.pagination-container');
    if(Math.floor(paginationCount/paginationLimit) >= 1){
        var content = $('.pagination-number-container');
        var lastPage = Math.ceil(paginationCount/paginationLimit);
        var curentPage = paginationPage;
        var PageArr = pageArray(lastPage,curentPage);
        console.log(PageArr);
        var stringContent  = ""
        for(var i in PageArr){
            if(PageArr[i] == "..."){
                stringContent+= '<span style="margin: 0px 10px 0px 10px;">...</span>';
            }
            else if(PageArr[i] == curentPage){
                stringContent+= '<span style="margin: 0px 10px 0px 10px;"><a style="text-decoration:none;color:#f6a619" class="pagination-link" href="'+paginationRoute+String(PageArr[i])+'"><b>'+String(PageArr[i])+'</b></a></span>';
            }
            else{
                stringContent+= '<span style="margin: 0px 10px 0px 10px;"><a style="text-decoration:none;color:black" class="pagination-link" href="'+paginationRoute+String(PageArr[i])+'"><b>'+String(PageArr[i])+'</b></a></span>';
            }
        }
        content.html(stringContent);
    }
    else{
        container.css({'display':'none'});
    }
});


function pageArray(lastPage,curentPage){
    var page = [1];
    if(curentPage-2>1){
        page.push("...");
        page.push(curentPage-1);
        page.push(curentPage);
    }
    else if(curentPage-1>1){
        page.push(curentPage-1);
        page.push(curentPage);
    }
    else if(curentPage>1){
        page.push(curentPage);
    }

    if(curentPage+2<lastPage){
        page.push(curentPage+1);
        page.push("...");
        page.push(lastPage);
    }
    else if(curentPage+1<lastPage){
        page.push(curentPage+1);
        page.push(lastPage);
    }
    else if(curentPage<lastPage){
        page.push(lastPage);
    }
    return page;
}