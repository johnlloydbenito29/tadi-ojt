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
          optAcadLvl += "<option value='" + value.AcadLvl_ID + "'>" + value.AcadLvl_Name + "</option>";
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
      handleTadiSubmission();
    },
  });
}

// Handle Submission

function handleTadiSubmission() {
  $(document).on("click", ".submitTadi", function (e) {
    e.preventDefault();

    const subjectId = $(this).data("subject-id");
    const currentModal = $(`#modal`);

    // Remove any existing error styles
    currentModal
      .find(".form-select, .form-control")
      .removeClass("is-invalid");

    // Check each required field within the current modal
    let isValid = true;

    const requiredFields = [
      "instructor",
      "learning_delivery_modalities",
      "session_type",
      "classStartDateTime",
      "classEndDateTime",
      "comments",
    ];

    requiredFields.forEach((field) => {
      if (!currentModal.find(`#${field}`).val()) {
        currentModal.find(`#${field}`).addClass("is-invalid");
        isValid = false;
      }
    });

    if (isValid) {
      const formId = currentModal.find("form").attr("id");
      const myform = document.getElementById(formId);
      const tadi_form = new FormData(myform);
      const formData = Object.fromEntries(tadi_form);

      console.log("formData =>", formData);

      POST_TADI(formData);
    }
  });
}

// Display

function displaySubjectTable(result) {
  const tableRows = result.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `
                  <tr key="${item.subj_id}">
                      <td>${item.subj_code}</td>
                      <td>${item.subj_desc}</td>
                      <td>${item.prof_name ? item.prof_name : "No instructor"}</td>
                      <td><button class="btn btn-sm w-100" ${item.prof_name ? item.prof_name : "disabled"
            } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#modal">TADI</button></td>
                  </tr>
                `;
        });
        return acc;
      }, "")
    : "";

  $("tbody").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#tadiModalHandler${index}`;
    $(document).on('click', tadiHandler, function () {
      updateModal(value, index);
    });
  });
}

function handleTadiModal(value, index) {
  $(document).on('click', `#tadiModalHandler${index}`, function () {
    console.log("value =>", value, index);
  });
}

function displayTadiModals(result) {
  const subjectId = $(this).data("subject-id");
  const currentModal = $(`#modal${subjectId}`);
  let formattedDate = new Date().toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });

  console.log(currentModal);

  // Get all modals and update their titles
  result.forEach((value) => {
    const currentModal = $(`#modal${value.subj_id}`);
    currentModal
      .find(".modal-header .subject-info .modal-title")
      .text(value.prof_name ? value.prof_name : "No instructor");
    currentModal
      .find(".modal-header .subject-info .subject-details")
      .text(`Course Code: ${value.subj_code}`);
  });

  const tadiModal = result
    .map(
      (value) => `
                   <div class="modal fade" id="modal${value.subj_id
        }" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                    <div class="subject-info">
                        <h5 class="modal-title" id="tadiModalLabel1">${value.prof_name ? value.prof_name : "No instructor"
        }</h5>
                        <p class="subject-details mb-0">Course Code: ${value.subj_code
        }</p>                
                    </div>

                             <p>${formattedDate}</p>
                </div>
                <div class="modal-body">

                    <form id="tadiForm${value.subj_id}">
                         <input type="text" style="display: none;" id="subjoff_id" name="subjoff_id" value="${value.subj_id
        }">
                        <div class="row my-4">
                        <div class="col">
                                <label for="instructor" class="form-label">Instructor</label>
                                <select class="form-select" name="instructor" id="instructor" required>
                                    <option value="" selected disabled>Select Instructor</option>
                                    ${value.prof_name
          ? `<option value="${value.prof_id}" selected>${value.prof_name}</option>`
          : '<option value="" selected disabled>No instructor assigned</option>'
        }
                                </select>
                            </div>

                            <div class="col">
                                <label for="learning_delivery_modalities" class="form-label">Learning Delivery Modalities</label>
                                <select class="form-select" name="learning_delivery_modalities" id="learning_delivery_modalities" required>
                                    <option value="" selected disabled>Select Mode</option>
                                    <option value="online_learning">Online Learning</option>
                                    <option value="onsite_learning">OnSite Learning</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="session_type" class="form-label">Session Type</label>
                                  <select class="form-select" name="session_type" id="session_type" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="regular">Regular Class</option>
                                     <option value="makeup">Make-Up Class</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="classStartDateTime" class="form-label">Class Start Schedule</label>
                                <input type="time" class="form-control" name="classStartDateTime" id="classStartDateTime" required>
                            </div>

                            <div class="col-4">
                                <label for="classEndDateTime" class="form-label">Class End Schedule</label>
                                <input type="time" class="form-control" name="classEndDateTime" id="classEndDateTime" required>
                            </div>
                        </div>
     
                        <div class="mb-4">
                            <label for="comments" class="form-label">Report</label>
                            <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="Enter any additional comments or notes here..." required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn submitTadi" data-subject-id="${value.subj_id
        }" style="background-color: #181a46; color: white;">Submit</button>
                </div>
            </div>
        </div>
    </div>
        `
    )
    .join("");

  $(".modal-container").html(tadiModal);
}

function updateModal(value) {

  console.log(value);
  let formattedDate = new Date().toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });

  $("#tadi_modal_label").text(value.subj_desc);
  $("#subject_details").text(`Course Code: ${value.subj_code}`);
  $("#date_now").text(formattedDate);

  let optInstructor = "";

  if (value.prof_name) {
    optInstructor += `<option value='${value.prof_id}' selected>${value.prof_name}</option>`;
  } else {
    optInstructor += `<option value='' selected disabled>No instructor assigned</option>`;
  }

  $("#instructor option").remove();
  $("#instructor").append(optInstructor);

}

// POST

function POST_TADI(formData) {
  $.ajax({
    url: "controller/index-post.php",
    type: "POST",
    data: {
      type: "SUBMIT_TADI",
      form_data: formData,
    },
    success: function (response) {
      try {
        const result = JSON.parse(response);
        if (result.success) {
          alert("TADI submitted successfully");
          location.reload();
        } else {
          alert(
            "Error submitting TADI: " + (result.message || "Unknown error")
          );
        }
      } catch (e) {
        console.error("Invalid JSON response:", response);
        alert("Error processing server response");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", error);
      console.error("Response Text:", xhr.responseText);
      alert("Error submitting TADI: " + error);
    },
  });
}
