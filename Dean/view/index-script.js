
$(document).ready(function () {
    

    // GET ACADEMIC LEVEL 
    $.ajax({
        type: "GET",
        url: "controller/index-info.php",
        data: {
            type: "GET_ACADEMIC_LEVEL",
        },
        dataType: "json",
        success: function (result) {

            var optLevel = "";
            console.log(result)
            if (result.length) {

                $.each(result, function (key, value) {
                    optLevel += "<option value='" + value.LVL_ID + "'>" + value.LVL_NAME + "</option>";
                });

            } else {

                optLevel = "<option>No Academic Level Found.</option>";
            }

            $("#academiclevel").append(optLevel);
        },
    });


    $("#academiclevel").on('change', function () {
        
        var lvlid = this.value;

        
        $.ajax({ // FOR GETTING ACADEMIC YEAR LEVEL
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACADEMIC_YEAR_LEVEL",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
    
                var optYearLevel = "";
                console.log(result)
                if (result.length) {
    
                    $.each(result, function (key, value) {
                        optYearLevel += "<option value='" + value.ACAD_YRLVL_ID + "'>" + value.ACAD_YRLVL_NAME + "</option>";
                    });
    
                } else {
    
                    optYearLevel = "<option> No Year Level Found.</option>";
                }
    
                $("#academicyearlevel option").remove();
                $("#academicyearlevel").append(optYearLevel);


            },
        });


    
        $.ajax({ // FOR GETTING ACADEMIC PERIOD
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACADEMIC_PERIOD",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
    
                var optYearLevel = "";
                console.log(result)
                if (result.length) {
    
                    $.each(result, function (key, value) {
                        optYearLevel += "<option value='" + value.acad_prd_id + "'>" + value.acad_prd_name + "</option>";
                    });
    
                } else {
    
                    optYearLevel = "<option> No Period Found.</option>";
                }
    
                $("#academicperiod option").remove();
                $("#academicperiod").append(optYearLevel);

                $('#academicperiod').trigger('change');


            },
        });

        $.ajax({ // FOR GETTING ACADEMIC YEAR
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACAD_YEAR",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
    

                console.log('result =>', result);
                
                var optYearLevel = "";
                if (result.length) {
    
                    $.each(result, function (key, value) {
                        optYearLevel += "<option value='" + value.YEAR_ID + "'>" + value.YEAR_NAME + "</option>";
                    });
    
                } else {
    
                    optYearLevel = "<option> No Year Found.</option>";
                }
                $("#acadyear option").remove();
                $("#acadyear").append(optYearLevel);
 
        
            },
        });
    
        
       ///
    
        
    })

    $("#academicperiod").on('change', function () {

        var lvlid = $('#academiclevel').val();
        var prdid = this.value;


        $.ajax({ // FOR GETTING ACADEMIC YEAR
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACAD_YEAR",
                lvl_id: lvlid,
                prd_id: prdid,
            },
            dataType: "json",
            success: function (result) {
    

                console.log('result =>', result);
                
                var optYear = "";
                if (result.length) {
    
                    $.each(result, function (key, value) {
                        optYear += "<option value='" + value.YEAR_ID + "'>" + value.YEAR_NAME + "</option>";
                    });
    
                } else {
    
                    optYear = "<option> No Year Found.</option>";
                }
                $("#acadyear option").remove();
                $("#acadyear").append(optYear);
 
        
            },
        });

    })

    
    // //GET ACADEMIC YEAR LEVEL
    // $.ajax({
    //     type: "GET",
    //     url: "controller/index-info.php",
    //     data: {
    //         type: "GET_ACADEMIC_YEAR_LEVEL",
    //     },
    //     dataType: "json",
    //     success: function (result) {
                 
    //         console.log(result)
            
    //         var optLevel = "";

    //         if (result.length) {

    //             $.each(result, function (key, value) {
    //                 optLevel += "<option value='" + value.LVL_ID + "'>" + value.YR_LVL_NAME + "</option>";
    //             });

    //         } else {

    //             optLevel = "<option></option>";
    //         }

    //         $("#academicYearLevel").append(optLevel);
    //     },
    // });
    
    // //GET ACADEMIC PERIOD
    // $.ajax({
    //     type: "GET",
    //     url: "controller/index-info.php",
    //     data: {
    //         type: "GET_ACADEMIC_PERIOD",
    //     },
    //     dataType: "json",
    //     success: function (result) {
                 
    //         console.log(result)
            
    //         var optLevel = "";

    //         if (result.length) {

    //             $.each(result, function (key, value) {
    //                 optLevel += "<option value='" + value.PERIOD_ID + "'>" + value.PERIOD_NAME + "</option>";
    //             });

    //         } else {

    //             optLevel = "<option></option>";
    //         }

    //         $("#period").append(optLevel);
    //     },
    // });
    
    
    
    // //GET ACADEMIC YEAR
    // $.ajax({
    //     type: "GET",
    //     url: "controller/index-info.php",
    //     data: {
    //         type: "GET_ACAD_YEAR",
    //     },
    //     dataType: "json",
    //     success: function (result) {
                     
    //         console.log(result)
                
    //         var optLevel = "";
    
    //         if (result.length) {
    
    //             $.each(result, function (key, value) {
    //                 optLevel += "<option value='" + value.YEAR_ID + "'>" + value.YEAR_NAME + "</option>";
    //             });
    
    //         } else {
    
    //             optLevel = "<option></option>";
    //         }
    
    //         $("#acadyear").append(optLevel);
    //     },
    // });


    

   
})


