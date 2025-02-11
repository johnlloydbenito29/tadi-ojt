
$(document).ready(function(){
    GET_TADILIST();


    $('#status_disapprove').click(function(e){
        var tadi_id = this.name;
        UPDATE_TADI_STATUS(2, tadi_id);  
    })

    $('#status_approve').click(function(e){
        var tadi_id = this.name;
        UPDATE_TADI_STATUS(1, tadi_id);  
    })
 
})