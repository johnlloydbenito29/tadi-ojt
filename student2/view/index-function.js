function displayTadiTable(result) {

  
  var displaytable = "";

  $.each(result, function(key, value){

    displaytable += "<tr>";

    displaytable += "<td>" + value.subj_code + "</td>" + 
                    "<td>" + value.subj_desc + "</td>" + 
                    "<td>" + (value.prof_name ? value.prof_name : "NO INSTRUCTOR") + "</td>" + 
                    "<td>" + value.tadi_date + "</td>" + 
                           
                   "</tr>";



  })
  $("tbody tr").remove();
  $("tbody").append(displaytable);
}



function GET_TADILIST() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_TADI_LIST_STUDENT_2",
    },
    dataType: "json",
    success: function (result) {
      console.log("result ajax", result)

      
      var displaytable = "";

      $.each(result, function(key, value){
    
        displaytable += "<tr>";
    
        displaytable += "<td>" + value.subj_code + "</td>" + 
                        "<td>" + value.subj_desc + "</td>" + 
                        "<td>" + value.prof_name + "</td>" + 
                        "<td>" + value.tadi_date + "</td>" + 
                        "<td><button class=\"btn btn-sm w-100\" style=\"background-color: #181a46; color: white;\" data-bs-toggle=\"modal\" data-bs-target=\"#tadiModal1\">VIEW</button></td>" +
                      "</tr>";
    
    
    
      })

      $("tbody tr").remove();
      $("tbody").append(displaytable);
    },
  });
}


function viewTadi(value) {

  console.log(value);
  let formattedDate = new Date().toLocaleDateString("en-PH", {
    month: "long",
    day: "numeric",
    year: "numeric",
  });

  $("#").text(value.subj_desc);
  $("#subject_details").text(`Course Code: ${value.subj_code}`);
  $("#date_now").text(formattedDate);
  $("#subjoff_id").val(`${value.subj_id}`);

 
}
