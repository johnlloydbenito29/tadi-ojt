
function GET_YEARLEVEL(){
    $.ajax({
        type: 'GET',
        url: 'controller/index-info.php',
        data:
        {
            'type' : 'GET_YEAR_LEVEL',
        }, 
        dataType: 'json',
        success: function(result){

            var optYEAR = '';

            if(result.length){

                $.each(result, function(key, value){

                    optYEAR += "<option value='"+ value.AcadYr_ID +"'>" + value.AcadYr_Name + "</option>";
                })

            } else {
                    optYEAR = "<option></option>";
            }

            $('#academicyearlevel option').remove();
            $('#academicyearlevel').append(optYEAR);
        }
    });

}
