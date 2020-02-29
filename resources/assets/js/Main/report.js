$(document).ready(function(){
    var List = JSON.parse(localStorage.getItem("qId"));
    if(List && List.includes(QuestionnaireId)){
        document.getElementById('report_content').innerHTML='<div class="report-question-main-container"><div class="alert alert-success text-center">فرهیخته گرامی، نظر شما پیشتر ثبت شده است</div></div>';
    }
});
function reportSubmition(event,form,questionnaireId){
    event.preventDefault();
    var values = getFormeValues(form);
    values.questionnaireId = questionnaireId;
    document.getElementById('report_submit').innerHTML = '<div class="spinner-border spinner-border-sm" role="status"><span class="sr-only">Loading...</span></div>';
    fetch(postUrl,{
        method: 'POST',   
        headers: {
            'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(values) 
    }).then(function(res){
        document.getElementById('report_content').innerHTML='<div class="report-question-main-container"><div class="alert alert-success text-center">فرهیخته گرامی، با تشکر از وقتی که گذاشتید. نظر شما با موفقیت ثبت شد</div></div>';
    }).catch(function(error){
        document.getElementById('report_content').innerHTML='<div class="report-question-main-container"><div class="alert alert-success text-center">فرهیخته گرامی، با تشکر از وقتی که گذاشتید. نظر شما با موفقیت ثبت شد</div></div>';
    });
    var idList=[];
    if(localStorage.getItem("qId")){
        idList = JSON.parse(localStorage.getItem("qId"));
    }
    idList.push(questionnaireId);
    localStorage.setItem("qId",JSON.stringify(idList));
}

function getFormeValues(form){
    var elementsName = [];
    var values={
        data:[],
        text:{}
    };
    for(var i=0; i<form.elements.length; i++){
        if( form.elements[i] !== undefined && form.elements[i].id !== ""){
            if(!elementsName.includes(form.elements[i].id)){
                elementsName.push(form.elements[i].id);
            }
        }
    }
    for(var j=0; j< elementsName.length; j++){
        var EL = document.getElementsByName(elementsName[j]);
        for(var k =0 ; k<EL.length; k++){
            if(EL[k].checked){
                var q_id = elementsName[j].match(/[0-9]+/);
                if(q_id && q_id[0] != undefined){
                    values.data.push({id:q_id[0], value:EL[k].value})
                }
            }
        }
    }
    var text = document.querySelector('.textArea');
    q_id = text.id.match(/[0-9]+/);
    if(q_id && q_id[0]!= undefined){
        values.text = {id:q_id[0], value :  text.value}
    }
    return values;
}