
function GET_SCHOOLYEAR(){
    $.ajax({
        type: 'GET',
        url: 'controller/index-info.php',
        data:
        {
            'type' : 'GET_SCHOOL_YEAR',
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

            $('#academicSchoolYear option').remove();
            $('#academicSchoolYear').append(optYEAR);
        }
    });

}
