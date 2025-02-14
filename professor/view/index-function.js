function GET_SCHOOLYEAR() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_SCHOOL_YEAR",
    },
    dataType: "json",
    success: function (result) {
      var optYEAR = "";

      if (result.length) {
        $.each(result, function (key, value) {
          optYEAR +=
            "<option value='" +
            value.AcadYr_ID +
            "'>" +
            value.AcadYr_Name +
            "</option>";
        });
      } else {
        optYEAR = "<option></option>";
      }

      $("#academicSchoolYear option").remove();
      $("#academicSchoolYear").append(optYEAR);
    },
  });
}

function GET_ACADEMICPERIOD() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_ACADEMIC_PRD",
    },
    dataType: "json",
    success: function (result) {
      var optPRD = "";

      if (result.length) {
        $.each(result, function (key, value) {
          optPRD +=
            "<option value='" +
            value.Period_ID +
            "'>" +
            value.Period_Name +
            "</option>";
        });
      } else {
        optPRD = "<option></option>";
      }

      $("#period option").remove();
      $("#period").append(optPRD);
    },
  });
}

function GET_YEARLEVEL() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_YEAR_LEVEL",
    },
    dataType: "json",
    success: function (result) {
      var optYrLvl = "";

      if (result.length) {
        $.each(result, function (key, value) {
          optYrLvl +=
            "<option value='" +
            value.Yrlvl_ID +
            "'>" +
            value.Yrlvl_Name +
            "</option>";
        });
      } else {
        optYrLvl = "<option></option>";
      }

      $("#academicYearLevel option").remove();
      $("#academicYearLevel").append(optYrLvl);
    },
  });
}

function GET_ACADEMICLEVEL() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_ACADEMIC_LEVEL",
    },
    dataType: "json",

    success: function (result) {
      var optAcadLvl = "";

      if (result.length) {
        $.each(result, function (key, value) {
          optAcadLvl +=
            "<option value='" +
            value.AcadLvl_ID +
            "'>" +
            value.AcadLvl_Name +
            "</option>";
        });
      } else {
        optAcadLvl = "<option></option>";
      }

      $("#academicLevel option").remove();
      $("#academicLevel").append(optAcadLvl);

      // Add time validation
      $("#classEndDateTime").on("change", function () {
        const startTime = $("#classStartDateTime").val();
        const endTime = $(this).val();

        if (startTime && endTime && endTime <= startTime) {
          alert("Class end time must be later than start time");
          $(this).val("");
        }
      });
    },
  });
}


function GET_SUBJECTLIST() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_SUBJECT_LIST",
    },
    dataType: "json",
    success: function (result) {
      console.log(result);
      DISPLAY_PROFESSOR_SUBJECT(result);
      // GET_SUBJECTLIST();

    },
  });
}


function DISPLAY_PROFESSOR_SUBJECT(result) {
  const tableRows = result.length
    ? result.reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `
                  <tr key="${item.subj_id}">
                      <td>${item.subj_code}</td>
                      <td>${item.subj_desc}</td>
                      <td>${item.subj_sec_name}</td>
                      <td>
                      <button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" 
                        id="viewModal${index}" data-bs-toggle="modal" data-bs-target="#tadiModal">
                      VIEW TADI</button></td>
                  </tr>
                `;
        });
        return acc;
      }, "")
    : "";

  

  $(".prof_dashboard_table").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#viewModal${index}`;

    console.log("value =>", value);
    

    $(document).on("click", tadiHandler, function () {
      displayModal(value, index);
      GET_TADI_SUBJ_LIST(value.subj_id) // get tadi list
      displaySectionTableModal(result)
    });
  });
}


function displayModal(value) {

  console.log("value =>", value);
  
  let formattedDate = new Date(value.tadi_date).toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });
  

  $("#tadi_subj_name").text(value.subj_desc);
  $("#section_name").text(value.subj_sec_name);
}    


function displaySectionTableModal(result) {
  console.log('section =>', result);

  var count = 1;
  const tableRows = result.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `

                  <tr key="${item.subj_code}">
                      <td>${count}</td>
                      <td>${item.stud_name}</td>
                      <td>${new Date(item.schltadi_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})}</td>
                      <td><button class="btn btn-sm w-100" 
                      style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadiModal">VIEW</button></td>
                  </tr>
                `;

                count++;
        });
        return acc;     
      }, "")
    : `<tr>
          <td colspan="5" class="text-center">No tadi forms available</td>
       </tr>`;

  $(".prof_section_table").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#tadiModalHandler${index}`;  
    $(document).on('click', tadiHandler, function () {
      displayModal(value, index);
    });
  });
}


function GET_TADI_SUBJ_LIST(value) {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_TADI_LIST_STUDENT_2",
      subj_id: value,
    },
    dataType: "json",
    success: function (result) {
      console.log("tadi =>",result);

    },
  });
}

function display_Section_List(result) {
  // console.log('section =>', result);

  var count = 1;
  const tableRows = result.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `

                  <tr key="${item.subj_code}">
                      <td>${count}</td>
                      <td>${item.stud_name}</td>
                      <td>${new Date(item.schltadi_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})}</td>
                      <td><button class="btn btn-sm w-100" ${item.prof_name ? item.prof_name : "disabled"
            } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadiModal">VIEW</button></td>
                  </tr>
                `;

                count++;
        });
        return acc;     
      }, "")
    : `<tr>
          <td colspan="5" class="text-center">No tadi forms available</td>
      </tr>`;

  $(".prof_section_table").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#tadiModalHandler${index}`;  
    $(document).on('click', tadiHandler, function () {
      displayModal(value, index);
    });
  });
}

