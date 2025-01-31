
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

function GET_ACADEMICPERIOD(){
    $.ajax({
        type: 'GET',
        url: 'controller/index-info.php',
        data:
        {
            'type' : 'GET_ACADEMIC_PRD',
        }, 
        dataType: 'json',
        success: function(result){

            var optPRD = '';

            if(result.length){

                $.each(result, function(key, value){

                    optPRD += "<option value='"+ value.Period_ID +"'>" + value.Period_Name + "</option>";
                })

            } else {
                    optPRD = "<option></option>";
            }

            $('#period option').remove();
            $('#period').append(optPRD);
        }
    });

}

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

            var optYrLvl = '';

            if(result.length){

                $.each(result, function(key, value){

                    optYrLvl += "<option value='"+ value.Yrlvl_ID +"'>" + value.Yrlvl_Name + "</option>";
                })

            } else {
                optYrLvl = "<option></option>";
            }

            $('#academicYearLevel option').remove();
            $('#academicYearLevel').append(optYrLvl);
        }
    });

}


function GET_ACADEMICLEVEL(){
    $.ajax({
        type: 'GET',
        url: 'controller/index-info.php',
        data:
        {
            'type' : 'GET_ACADEMIC_LEVEL',
        }, 
        dataType: 'json',
        success: function(result){

            var optAcadLvl = '';

            if(result.length){

                $.each(result, function(key, value){

                    optAcadLvl += "<option value='"+ value.AcadLvl_ID +"'>" + value.AcadLvl_Name + "</option>";
                })

            } else {
                optAcadLvl = "<option></option>";
            }

            $('#academicLevel option').remove();
            $('#academicLevel').append(optAcadLvl);
        }
    });

}
