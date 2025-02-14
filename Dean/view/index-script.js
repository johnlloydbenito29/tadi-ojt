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
            console.log(result);
            if (result.length) {
                $.each(result, function (key, value) {
                    optLevel +=
                        "<option value='" +
                        value.LVL_ID +
                        "'>" +
                        value.LVL_NAME +
                        "</option>";
                });
            } else {
                optLevel = "<option>No Academic Level Found.</option>";
            }

            $("#academiclevel").append(optLevel);
        },
    });

    $("#academiclevel").on("change", function () {
        var lvlid = this.value;

        $.ajax({
            // FOR GETTING ACADEMIC YEAR LEVEL
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACADEMIC_YEAR_LEVEL",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
                var optYearLevel = "";
                console.log(result);
                if (result.length) {
                    $.each(result, function (key, value) {
                        optYearLevel +=
                            "<option value='" +
                            value.ACAD_YRLVL_ID +
                            "'>" +
                            value.ACAD_YRLVL_NAME +
                            "</option>";
                    });
                } else {
                    optYearLevel = "<option> No Year Level Found.</option>";
                }

                $("#academicyearlevel option").remove();
                $("#academicyearlevel").append(optYearLevel);
            },
        });

        $.ajax({
            // FOR GETTING ACADEMIC PERIOD
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACADEMIC_PERIOD",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
                var optYearLevel = "";
                console.log(result);
                if (result.length) {
                    $.each(result, function (key, value) {
                        optYearLevel +=
                            "<option value='" +
                            value.acad_prd_id +
                            "'>" +
                            value.acad_prd_name +
                            "</option>";
                    });
                } else {
                    optYearLevel = "<option> No Period Found.</option>";
                }

                $("#academicperiod option").remove();
                $("#academicperiod").append(optYearLevel);

                $("#academicperiod").trigger("change");
            },
        });

        $.ajax({
            // FOR GETTING ACADEMIC YEAR
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACAD_YEAR",
                lvl_id: lvlid,
            },
            dataType: "json",
            success: function (result) {
                console.log("result =>", result);

                var optYearLevel = "";
                if (result.length) {
                    $.each(result, function (key, value) {
                        optYearLevel +=
                            "<option value='" +
                            value.YEAR_ID +
                            "'>" +
                            value.YEAR_NAME +
                            "</option>";
                    });
                } else {
                    optYearLevel = "<option> No Year Found.</option>";
                }
                $("#acadyear option").remove();
                $("#acadyear").append(optYearLevel);
            },
        });

        ///
    }); 

    $("#academicperiod").on("change", function () {
        var lvlid = $("#academiclevel").val();
        var prdid = this.value;

        $.ajax({
            // FOR GETTING ACADEMIC YEAR
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_ACAD_YEAR",
                lvl_id: lvlid,
                prd_id: prdid,
            },
            dataType: "json",
            success: function (result) {
                console.log("result =>", result);

                var optYear = "";
                if (result.length) {
                    $.each(result, function (key, value) {
                        optYear +=
                            "<option value='" +
                            value.YEAR_ID +
                            "'>" +
                            value.YEAR_NAME +
                            "</option>";
                    });
                } else {
                    optYear = "<option> No Year Found.</option>";
                }
                $("#acadyear option").remove();
                $("#acadyear").append(optYear);
            },
        });
    });

    // FOR GETTING DEPARTMENTAL SUBJECT
    $("#search_button").on("click", function () {
        const lvlid = $("#academiclevel").val();
        const yrlvlid = $("#academicyearlevel").val();
        const prdid = $("#academicperiod").val();
        const yrid = $("#acadyear").val();        

        $.ajax({
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_DEPARTMENTAL_SUBJECT",
                lvl_id: lvlid,
                prd_id: prdid,
                yr_id: yrid,
                yrlvl_id: yrlvlid,

            },
            dataType: "json",
            success: function (result) {
                console.log("###result", result);

                const tableRows = result.length
                    ? result.reduce((acc, value, index) => {
                        $.each([value], function (key, item) {
                            acc += `
                              <tr key="${item.subj_id}">
                              <td>${item.subj_code}</td>
                              <td class="col-6">${item.subj_desc}</td>
                                  <td>${item.subj_sched ? item.subj_sched : "No schedule"}</td>
                                  <td>${item.prof_name
                                    ? item.prof_name
                                    : "No instructor"
                                }</td>
                                  <td><button class="btn btn-sm w-100" ${item.prof_name ? item.prof_name : "disabled"
                                } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadimodal2">TADI</button></td>
                              </tr>
                            `;
                        });
                        return acc;
                    }, "")
                    : ` <tr class="flex justify-center align-center">
                            <td colspan="5" class="text-center">No data available</td>
                        </tr>`;
                $("#subject").html(tableRows);
            },
        });
    });

    // FOR GETTING DEPARTMENTAL INSTRUCTOR
    $("#search_button").on("click", function () {
        const lvlid = $("#academiclevel").val();
        const yrlvlid = $("#academicyearlevel").val();
        const prdid = $("#academicperiod").val();
        const yrid = $("#acadyear").val();
        const searchVal = $("#searchInput").val();
        const category = $("#category").val(); 
            

        console.log("##searchVal", searchVal);
        console.log("##category", category);
        
            
        $.ajax({
            type: "GET",
            url: "controller/index-info.php",
            data: {
                type: "GET_DEPARTMENTAL_SUBJECT",
                lvl_id: lvlid,
                prd_id: prdid,
                yr_id: yrid,
                yrlvl_id: yrlvlid,
                searchVal: searchVal,
                category: category,
            },
            dataType: "json",
            success: function (result) {
                console.log("##result", result);

                const tableRows = result.length
                    ? result.reduce((acc, value, index) => {
                        $.each([value], function (key, item) {
                            acc += ` 
                                <tr key="${item.subj_id}">     
                                  <td>${item.prof_name
                                    ? item.prof_name
                                    : "No instructor"
                                }</td>
                                <td>${item.subj_desc}</td>
                                <td><button class="btn btn-sm w-100 col-2" ${item.prof_name ? item.prof_name : "disabled"
                                } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadimodal1">TADI</button></td>
                              </tr>
                            `;
                        });
                        return acc;
                    }, "")
                    : ` <tr>
                            <td colspan="5" class="text-center">No data available</td>
                        </tr>`;
                $("#instructor").html(tableRows);
            },
        });
    });

    //     type: "GET",
    //     url: "controller/index-info.php",
    //     data: {
    //       type: "GET_DEPARTMENTAL_SUBJECT",
    //     },
    //     dataType: "json",
    //     success: function (result) {

    //       console.log('###result', result);

    //       // var displaytable = "";

    //       // $.each(result, function(key, value){

    //       //   displaytable += "<tr>";

    //       //   displaytable += "<td>" + value.subj_code + "</td>" +
    //       //                   "<td>" + value.subj_desc + "</td>" +
    //       //                   "<td>" + value.prof_name + "</td>" +
    //       //                   "<td>" + value.tadi_date + "</td>" +
    //       //                   "<td><button class=\"btn btn-sm w-100\" style=\"background-color: #181a46; color: white;\" data-bs-toggle=\"modal\" data-bs-target=\"#tadiModal1\">VIEW</button></td>" +
    //       //                 "</tr>";

    //       // })

    //       // $("tbody tr").remove();
    //       // $("tbody").append(displaytable);
    //     }

    // });

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
});
