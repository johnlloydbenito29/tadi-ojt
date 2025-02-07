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
  console.log('result =>', result);


  const tableRows = result.length
    ? result
      .reduce((acc, value, index) => {
        $.each([value], function (key, item) {
          acc += `
                  <tr key="${item.subj_code}">
                      <td>${item.subj_code}</td>
                      <td>${item.subj_desc}</td>
                      <td>${item.prof_name ? item.prof_name : "No instructor"}</td>
                      <td>${new Date(item.tadi_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})}</td>
                      <td><button class="btn btn-sm w-100" ${item.prof_name ? item.prof_name : "disabled"
            } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="#tadiModal">VIEW</button></td>
                  </tr>
                `;
        });
        return acc;     
      }, "")
    : `<tr>
          <td colspan="5" class="text-center">No tadi forms available</td>
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
}



