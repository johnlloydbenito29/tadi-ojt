function GET_TADILIST() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_TADI_LIST_STUDENT_2",
    },
    dataType: "json",
    success: function (result) {

      displayTadiTable(result);
    },
  });
}

function displayTadiTable(result) {


  var count = 1;
  var maxRows=10;

  const limitedResult = result.slice(0, maxRows)
  const tableRows = limitedResult.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
         
         

          // Set the confirmation status based on the value of is_confirm
          // var confirmationStatus =
          // item.is_confirm == 1
          //   ? `<span class="badge bg-success">Approved</span>`
          //   : item.is_confirm == 2
          //   ? `<span class="badge bg-danger">Disapproved</span>`
          //   : `<span class="badge bg-primary">Pending</span>`;
          //<td>${ statusIdentifier(item.is_confirm)}

          acc += `
                  
                  <tr key="${item.subj_code}">
                      <td>${count}</td>
                      <td>${item.subj_code}</td>
                      <td>${item.subj_desc}</td>
                      <td>${item.prof_name }</td>
                      <td>${new Date(item.tadi_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})}</td>
                      <td><button class="btn btn-sm w-100"  } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadiModal">VIEW</button></td>
                  </tr>
                `;

                count++;
        });
        return acc;     
      }, "")
    : `<tr>
          <td colspan="7" class="text-center">No tadi forms available</td>
       </tr>`;

  $("tbody").html(tableRows);

  result.filter((value, index) => {
    const tadiHandler = `#tadiModalHandler${index}`;  
    $(document).on('click', tadiHandler, function () {
      displayModal(value, index);
    });
  });
}

function convert12HourFormat(time) {

  let [hours, minutes] = time.split(':');
  let period = hours >= 12 ? "PM" : "AM";

  hours = hours % 12 || 12;

  let formattedTime = `${hours}:${minutes} ${period}`;
  console.log(formattedTime);
  return formattedTime
}

function displayModal(value) {

  console.log(value);
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
  $("#modalities").text(value.tadi_mode.toUpperCase().replace(/_/g, ' '));
  $("#session_type").text(value.tadi_type.toUpperCase().replace(/_/g, ' '));
  $("#time_in").text(convert12HourFormat(value.time_in));
  $("#time_out").text(convert12HourFormat(value.time_out));
  $("#report").text(value.tadi_activity);

  $("#status_disapprove").attr('name',value.tadi_id);
  $("#status_approve").attr('name',value.tadi_id);

  if (value.is_confirm == 1 || value.is_confirm == 2) {
    $("#status_approve, #status_disapprove").hide();
  } else {
    $("#status_approve, #status_disapprove").show();
  }
}

function UPDATE_TADI_STATUS(status, id){
  $.ajax({
    type: "POST",
    url: "controller/index-update.php",
    data: {
      type: "UPDATE_TADI_STATUS",
      status: status,
      id: id,
    },
    dataType: "json",
    success: function (result) {
      if(result.status == 1){
        alert(result.message);
        $.ajax({
          type: "GET",
          url: "controller/index-info.php",
          data: {
            type: "GET_TADI_LIST_STUDENT_2",
          },
          dataType: "json",
          success: function (result) {
            displayTadiTable(result);
          },
        });
      } else {

        alert(result.message);
      }

    },
  });

}

function statusIdentifier (value) {
  let status

  if (value == 1) {
    status = `<span class="badge bg-success">Approved</span>`
  } else if (value == 2) {
    status = `<span class="badge bg-danger">Disapproved</span>`
  } else {
    status = `<span class="badge bg-primary">Pending</span>`
  }
 
  console.log('status =>', status);

  return status

  
}

