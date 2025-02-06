function displaySubjectTable(result) {
  const tableRows = result.length
    ? result
        .map(
          (value) => `
            <tr key="${value.subj_id}">
                <td>${value.subj_code}</td>
                <td>${value.subj_desc}</td>
                <td>${value.prof_name ? value.prof_name : "No instructor"}</td>
                <td><button class="btn btn-sm w-100" ${
                  value.prof_name ? value.prof_name : "disabled"
                } style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#modal${
            value.subj_id
          }">TADI</button></td>
            </tr>
        `
        )
        .join("")
    : "";

  $("tbody").html(tableRows);
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

      const tableRows = result.length
    ? result
      .map(
        (value) => `
            <tr>
                <td>${value.subj_code}</td>
                <td>${value.subj_desc}</td>
                <td>${value.prof_name ? value.prof_name : "No instructor"}</td>
                <td>${value.subj_code}</td>
                <td><button class="btn btn-sm w-100" ${value.prof_name ? value.prof_name : "disabled"} style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#modal${value.subj_id}">TADI</button></td>
            </tr>
        `
      )
      .join("")
    : "";

  $("tbody").html(tableRows);
     
    },
  });
}



