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
            } style="background-color: #181a46; color: white;" id="tadiModalHandler${index}" data-bs-toggle="modal" data-bs-target="    #tadiModal1">VIEW</button></td>
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



function displayModal(value) {

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

  const instructor = value.prof_name ? `<option value="${value.prof_id}">${value.prof_name}</option>` : "<option value='' selected disabled>No instructor assigned</option>"; 
  const subjoff_id = value.subj_id ? `<input type="text" style="display: none;" id="subjoff_id" name="subjoff_id" value="${value.subj_id}">` : "";
  
  $("#instructor").html(instructor);
  $("#subjoff_id").html(subjoff_id);

}



