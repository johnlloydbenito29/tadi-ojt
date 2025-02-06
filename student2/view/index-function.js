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

      var displaytable = "";

      $.each(result, function(key, value){
    
        displaytable += "<tr>";
    
        displaytable += "<td>" + value.subj_code + "</td>" + 
                        "<td>" + value.subj_desc + "</td>" + 
                        "<td>" + value.prof_name + "</td>" + 
                        "<td>" + value.tadi_date + "</td>" + 
                      "</tr>";
    
    
    
      })

      $("tbody tr").remove();
      $("tbody").append(displaytable);
    },
  });
}



