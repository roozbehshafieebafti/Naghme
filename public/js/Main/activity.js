function PreviewPicturew(picSrc,picTit,prvImgId,titImgId){
    document.getElementById(prvImgId).src= picSrc;
    document.getElementById(titImgId).innerHTML= picTit;
}

function commentClick(text,allow){
    if(allow === "1" && text.value === "لطفا دیدگاه خود را در اینجا ثبت نمایید"){
        text.value = ""     
    }
}

function comentOnchange(text){
   console.log(text);
}