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

function GET_SUBJECTLIST(result) {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_STUDENT_LIST",
    },
    dataType: "json",
    success: function (result) {
    
    },
  });
}

function GET_STUDENTLIST() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_SUBJECT_LIST",
    },
    dataType: "json",
    success: function (result) {
      DISPLAY_PROFESSOR_SUBJECT(result);
      GET_SUBJECTLIST();

    },
  });
}


// Handle Submission

// function handleTadiSubmission() {
//   $(document).on("click", ".submitTadi", function (e) {
//     e.preventDefault();

//     const subjectId = $(this).data("subject-id");
//     const currentModal = $(`#modal`);

//     // Remove any existing error styles
//     currentModal.find(".form-select, .form-control").removeClass("is-invalid");

//     // Check each required field within the current modal
//     let isValid = true;

//     const requiredFields = [
//       "instructor",
//       "learning_delivery_modalities",
//       "session_type",
//       "classStartDateTime",
//       "classEndDateTime",
//       "comments",
//     ];

//     requiredFields.forEach((field) => {
//       if (!currentModal.find(`#${field}`).val()) {
//         currentModal.find(`#${field}`).addClass("is-invalid");
//         isValid = false;
//       }
//     });

//     // Validate class times
//     const startTime = currentModal.find("#classStartDateTime").val();
//     const endTime = currentModal.find("#classEndDateTime").val();

//     if (startTime && endTime && endTime <= startTime) {
//       currentModal.find("#classEndDateTime").addClass("is-invalid");
//       alert("Class end time must be later than start time");
//       isValid = false;
//     }

//     if (isValid) {
//       const formId = currentModal.find("form").attr("id");
//       const myform = document.getElementById("tadiForm");
//       const tadi_form = new FormData(myform);
//       const formData = Object.fromEntries(tadi_form);

//       console.log("formData =>", formData);

//       POST_TADI(formData);
//     }
//   });
// }

// Display
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

  console.log("result =>", result);

  $("tbody").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#viewModal${index}`;

    console.log("tadiHandler =>", tadiHandler);
    $(document).on("click", tadiHandler, function () {
      displayModal(value, index);
    });
  });
}


// function Student_LIST() {
//   $.ajax({
//     url: 'controller/index-info.php',
//     type: 'GET',
//     data: { type: 'GET_STUDENT_LIST' },
//     success: function(response) {
//       var data = JSON.parse(response);
//       var accordionHtml = '';
//       data.forEach(function(item, index) {
//         accordionHtml += `
//           <div class="accordion-item">
//             <h2 class="accordion-header">
//               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse${index}" aria-expanded="false" aria-controls="flush-collapse${index}">
//                 <div class="d-flex justify-content-between w-100">
//                   <div id="studentName">${item.stud_name}</div>
//                   <div class="text-end">
//                     <span class="badge bg-primary me-2">${item.subj_sec_name}</span>
//                     <span class="badge me-2" style="color: black;">${item.subj_desc}</span>
//                     <span class="badge me-2" style="color: black;">${item.subj_sec_name}</span>
//                   </div>
//                 </div>
//               </button>
//             </h2>
//             <div id="flush-collapse${index}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
//               <div class="accordion-body">
//                 <!-- Additional details can be added here -->
//               </div>
//             </div>
//           </div>`;
//       });
//       $('#accordionFlushExample').append(accordionHtml);
//     },
//     error: function(error) {
//       console.log('Error:', error);
//     }
//   });
// }




// function displayTadi(result, index) {
//   var id = result.subj_id;

//   $.ajax({
//     url: 'controller/index-update.php', 
//     type: 'POST',
//     data: {
//       type: 'UPDATE_TADI_STATUS',
//       id: id,
//       status: 1 
//     },
//     success: function(response) {
//       var data = JSON.parse(response);
//       if (data.status === 1) {
//         $(`#tadiModal${index}`).text('schltadi_isconfirm is 1');
//         $('#studentName').text(data.student_name); 
//         $('#studentSection').text(data.student_section); 
//       }
//     },
//     error: function(error) {
//       console.log('Error:', error);
//     }
//   });
// }




// POST

// function POST_TADI(formData) {
//   $.ajax({
//     url: "controller/index-post.php",
//     type: "POST",
//     data: {
//       type: "SUBMIT_TADI",
//       form_data: formData,
//     },
//     success: function (response) {
//       try {
//         const result = JSON.parse(response);
//         if (result.success) {
//           alert("TADI submitted successfully");

//           console.log("result =>", result);
//         } else {
//           alert(
//             "Error submitting TADI: " + (result.message || "Unknown error")
//           );
//         }
//       } catch (e) {
//         console.error("Invalid JSON response:", response);
//         alert("Error processing server response");
//       }
//     },
//     error: function (xhr, status, error) {
//       console.error("AJAX Error:", error);
//       console.error("Response Text:", xhr.responseText);
//       alert("Error submitting TADI: " + error);
//     },
//   });
// }


function displayModal(value) {

  console.log('value=> ', value);
  let formattedDate = new Date(value.tadi_date).toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });
  

  $("#tadi_subj_name").text(value.subj_desc);
  $("#courseCode").text(value.subj_sec_name);
  $("#student_name").text(value.stud_name);
  // $("#tadi_date").text(formattedDate);
  // $("#prof_name").text(value.prof_name);
  // $("#prof_name").text(value.prof_name);
  // $("#session_type").text(value.tadi_type.toUpperCase().replace(/_/g, ' '));
  // $("#time_in").text(convert12HourFormat(value.time_in));
  // $("#time_out").text(convert12HourFormat(value.time_out));
  // $("#report").text(value.tadi_activity);

  // $("#status_disapprove").attr('name',value.tadi_id);
  // $("#status_approve").attr('name',value.tadi_id);
}







