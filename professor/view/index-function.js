function GET_SUBJECTLIST() {
  $.ajax({
      type: "GET",
      url: "controller/index-info.php",
      data: {
          type: "GET_SUBJECT_LIST",
      },
      dataType: "json",
      success: function (result) {
        
          DISPLAY_PROFESSOR_SUBJECT(result);
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
                        id="viewTadiRecord${index}" data-bs-toggle="modal" data-bs-target="#tadiModal" name="${item.subj_id}">
                      VIEW TADI</button></td>
                  </tr>
                `;
        });
        return acc;
      }, "")
    : "";

  

  $(".prof_dashboard_table").html(tableRows);
  result.forEach((value, index) => {
    $(document).on("click",`#viewTadiRecord${index}` , function () {
      const subjOff_id = $(this).attr("name"); // Get the subj_id from the button's name attribute
      GET_SUBJ_OFFERED(subjOff_id); 
      
    });
  });
}

    // prof_tadi_summary_modal
function displayModalHeader(value) {  
    
  $("#tadi_subj_name").text(value.subj_desc);
  $("#section_name").text(value.subj_sec_name);
}    


function displaySubjectTadi(result) {

  var count = 1;
  const tableRows = result.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `

                  <tr key="${item.schltadi_id}">
                      <td>${count}</td>
                      <td>${item.STUD_NAME}</td>
                      <td>${new Date(item.tadi_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})}</td>
                      <td><button class="btn btn-sm w-100" 
                      style="background-color: #181a46; color: white;" id="view_button${index}" data-bs-toggle="modal" data-bs-target="#tadiModal2">VIEW</button></td>
                  </tr>
                `;

                count++;
        });
        return acc;     
      }, "")
    : `<tr>
          <td colspan="5" class="text-center">No tadi forms available</td>
       </tr>`;

  $(".prof_tadi_list_table").html(tableRows);
  

  result.filter((value, index) => {
    const tadiHandler = `#view_button${index}`;  
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
      displaySectionTableModal(result)
      

    },
  });
}



function displayModal(value) {

  console.log("modal",value);
  let formattedDate = new Date(value.tadi_date).toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });
  

  $("#tadi_modal_label").text(value.subj_name);
  $("#subject_code").text(value.subj_code);
  $("#tadi_date").text(formattedDate);
  $("#prof_name").text(value.prof_name);
  $("#prof_name").text(value.prof_name);
  // $("#modalities").text(value.tadi_mode.toUpperCase().replace(/_/g, ' '));
  // $("#session_type").text(value.tadi_type.toUpperCase().replace(/_/g, ' '));
  $("#time_in").text(convert12HourFormat(value.time_in));
  $("#time_out").text(convert12HourFormat(value.time_out));
  $("#report").text(value.tadi_activity);
}


function GET_SUBJ_OFFERED(subjOff_id) {
 
  
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "CHECK_MATCHED_SUBJ_ID",
      subj_id: subjOff_id,
    },
    dataType: "json",
    success: function (result) {
      console.log("Confirmation Result: ", result);
      displaySubjectTadi(result)

      

      

    },
  });
  // Display the name (or use it elsewhere)

}