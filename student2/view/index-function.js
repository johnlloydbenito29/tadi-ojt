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
      displaySubjectTable(result);
      displayTadiModals(result);
      console.log(result);

      // Handle form submission
      $(document).on("click", ".submitTadi", function (e) {
        e.preventDefault();

        const subjectId = $(this).data('subject-id');
        const currentModal = $(`#modal${subjectId}`);

        // Remove any existing error styles
        currentModal.find('.form-select, .form-control').removeClass('is-invalid');

        // Check each required field within the current modal
        let isValid = true;
        
        const requiredFields = ['professor', 'modeOfClass', 'typeOfClass', 
          'classStartDateTime', 'classEndDateTime', 'comments'];
        
        requiredFields.forEach(field => {
          if (!currentModal.find(`#${field}`).val()) {
            currentModal.find(`#${field}`).addClass('is-invalid');
            isValid = false;
          }
        });

        if (isValid) {
          const formData = {
            professor: currentModal.find('#professor').val(),
            mode_of_class: currentModal.find('#modeOfClass').val(),
            type_of_class: currentModal.find('#typeOfClass').val(), 
            class_start_date_time: currentModal.find('#classStartDateTime').val(),
            class_end_date_time: currentModal.find('#classEndDateTime').val(),
            comments: currentModal.find('#comments').val(),
            subject_id: subjectId.toString(),
            stud_2_id: "13507",
          };

          console.log("Form Data:", formData);
          
          // Call POST_TADI with the form data
          POST_TADI(formData);
        }
      });
    },
  });
}

function displaySubjectTable(result) {
  const tableRows = result.length
    ? result
      .map(
        (value) => `
            <tr>
                <td>${value.subj_code}</td>
                <td>${value.subj_desc}</td>
                <td>${value.prof_name ? value.prof_name : "No instructor"}</td>
                <td><button class="btn btn-sm w-100" ${value.prof_name ? value.prof_name : "disabled"} style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#modal${value.subj_id}">TADI</button></td>
            </tr>
        `
      )
      .join("")
    : "";

  $("tbody").html(tableRows);
}

function displayTadiModals(result) {
  const tadiModal = result
    .map(
      (value) => `
                   <div class="modal fade" id="modal${value.subj_id}" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                    <div class="subject-info">
                        <h5 class="modal-title" id="tadiModalLabel1">${value.prof_name ? value.prof_name : "No instructor"}</h5>
                        <p class="subject-details mb-0">Course Code: ${value.subj_code}</p>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="tadiForm${value.subj_id}">
                        <div class="row my-4">
                        <div class="col">
                                <label for="professor" class="form-label">Professor</label>
                                <select class="form-select" id="professor" required>
                                    <option value="" selected disabled>Select Professor</option>
                                    ${value.prof_name ? `<option value="${value.prof_name}" selected>${value.prof_name}</option>` : '<option value="" selected disabled>No instructor assigned</option>'}
                                </select>
                            </div>

                            <div class="col">
                                <label for="modeOfClass" class="form-label">Mode Of Class</label>
                                <select class="form-select" id="modeOfClass" required>
                                    <option value="" selected disabled>Select Mode</option>
                                    <option value="Synchronous">Synchronous</option>
                                    <option value="Asynchronous">Asynchronous</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="typeOfClass" class="form-label">Type Of Class</label>
                                <select class="form-select" id="typeOfClass" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="regular">Regular Class</option>
                                    <option value="makeup">Make up Class</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col">
                                <label for="classStartDateTime" class="form-label">Class Start Schedule</label>
                                <input type="datetime-local" class="form-control" id="classStartDateTime" required>
                            </div>

                            <div class="col">
                                <label for="classEndDateTime" class="form-label">Class End Schedule</label>
                                <input type="datetime-local" class="form-control" id="classEndDateTime" required>
                            </div>
                        </div>
     
                        <div class="mb-4">
                            <label for="comments" class="form-label">Report</label>
                            <textarea class="form-control" id="comments" rows="5" placeholder="Enter any additional comments or notes here..." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn submitTadi" data-subject-id="${value.subj_id}" style="background-color: #181a46; color: white;">Submit</button>
                </div>
            </div>
        </div>
    </div>
        `
    )
    .join("");

  $(".modal-container").html(tadiModal);
}

// POST

function POST_TADI(formData) {
  console.log(formData);
}



function GET_TADILIST() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: 'GET_TADI_LIST_STUDENT_2',
    },
    dataType: "json",
    success: function (result) {
      
      console.log(result);
     
    },
  });
}

