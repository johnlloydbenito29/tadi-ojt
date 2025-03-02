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
          $(this).addClass("is-invalid");
          $(this).next(".invalid-feedback").text("Class end time must be later than start time");
          $(this).val("");
        } else {
          $(this).removeClass("is-invalid");
        }
      });

      // Reset form when modal is closed
      $('#modal').on('hidden.bs.modal', function () {
        $('#tadiForm')[0].reset();
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
      displaySubjectTable(result);
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
    currentModal.find(".form-select, .form-control").removeClass("is-invalid");

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

    // Validate class times
    const startTime = currentModal.find("#classStartDateTime").val();
    const endTime = currentModal.find("#classEndDateTime").val();

    if (startTime && endTime && endTime <= startTime) {
      currentModal.find("#classEndDateTime").addClass("is-invalid");
      currentModal.find("#classEndDateTime").siblings(".invalid-feedback").text("Class end time must be later than start time");
      isValid = false;
    }

    // Validate comments field for special characters and length
    const comments = currentModal.find("#comments").val();
    const specialCharsRegex = /[<>{}[\]\\\/;()&$#@!%^*+=|`]/; // Regex for restricted special characters

    if (specialCharsRegex.test(comments)) {
      currentModal.find("#comments").addClass("is-invalid");
      currentModal.find("#comments").siblings(".invalid-feedback").text("Comments cannot contain special characters like < > { } [ ] \\ /");
      isValid = false;
    }

    // Check minimum comment length 
    if (comments.length < 50) {
      currentModal.find("#comments").addClass("is-invalid");
      currentModal.find("#comments").siblings(".invalid-feedback").text("Comments must be at least 50 characters long");
      isValid = false;
    }

    if (isValid) {
      const formId = currentModal.find("form").attr("id");
      const myform = document.getElementById("tadiForm");
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
    ? result.reduce((acc, value, index) => {
      $.each([value], function (key, item) {
        acc += `
                  <tr key="${item.subj_id}">
                      <td>${item.subj_code}</td>
                      <td>${item.subj_desc}</td>
                      <td>${item.prof_name ? item.prof_name : "No instructor"}</td>
                      <td><button class="btn btn-sm w-100" ${item.prof_name ? item.prof_name : "disabled"} style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#modal">TADI</button></td>
                  </tr>
                `;
      });
      return acc;
    }, "")
    : "";

  console.log("result =>", result);

  $("tbody").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#tadiModalHandler${index}`;
    $(document).on("click", tadiHandler, function () {
      displayTadi(value, index);
      GET_SUBJECTLIST(value.subj_id)
    });
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
      handleTadiSubmission();
    },
  });
}

function displayTadi(value) {
  console.log(value);
  let formattedDate = new Date().toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });

  $("#subjoff_id").val(`${value.subj_id}`);
  $("#tadi_modal_label").text(value.subj_desc);
  $("#subject_details").text(`Course Code: ${value.subj_code}`);
  $("#date_now").text(formattedDate);

  const instructor = value.prof_name
    ? `<option value="${value.prof_id}">${value.prof_name}</option>`
    : "<option value='' selected disabled>No instructor assigned</option>";
  const subjoff_id = value.subj_id
    ? `<input type="text" style="display: none;" id="subjoff_id" name="subjoff_id" value="${value.subj_id}">`
    : "";

  $("#instructor").html(instructor);
  $("#subjoff_id").html(subjoff_id);
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

          console.log("result =>", result.data);

          const toast = new bootstrap.Toast($("#successToast")[0]);
          $("#toastMessage").text(result.message);
          toast.show();

          if (result.count <= 3 && result.count > 0) {
            if (confirm(`Would you like to submit another TADI? (${result.count}/3 submitted today)`)) {
              $('#tadiForm')[0].reset();
              $('#modal').modal('hide');
            } else {
              $('#tadiForm')[0].reset();
              $('#modal').modal('hide');
            }
          }

        } else {
          const errorAlert = $("#errorAlert");
          $("#errorAlertMessage").text(result.message);
          errorAlert.removeClass("d-none");
        }
      } catch (e) {
        console.log(e);
        const toast = new bootstrap.Toast($("#errorToast")[0]);
        $("#errorToastMessage").text("An error occurred while processing the response");
        toast.show();
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", error);
      console.error("Response Text:", xhr.responseText);
      alert("Error submitting TADI: " + error);
    },
  });
}
