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
                        "<td><button class=\"btn btn-sm w-100\" style=\"background-color: #181a46; color: white;\" data-bs-toggle=\"modal\" data-bs-target=\"#tadiModal1\">VIEW</button></td>" +
                      "</tr>";
    
      })

      $("tbody tr").remove();
      $("tbody").append(displaytable);
    }

    


    
  });
}


function GET_PROF() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_PROF",
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
                        "<td><button class=\"btn btn-sm w-100\" style=\"background-color: #181a46; color: white;\" data-bs-toggle=\"modal\" data-bs-target=\"#tadiModal1\">VIEW</button></td>" +
                      "</tr>";
    
      })

      $("tbody tr").remove();
      $("tbody").append(displaytable);
    }

    


    
  });
}

function GET_DEPARTMENTAL_SUBJECT() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_DEPARTMENTAL_SUBJECT",
    },
    dataType: "json",
    success: function (result) {

      console.log('###result', result);
      
      // var displaytable = "";

      // $.each(result, function(key, value){
    
      //   displaytable += "<tr>";
    
      //   displaytable += "<td>" + value.subj_code + "</td>" + 
      //                   "<td>" + value.subj_desc + "</td>" + 
      //                   "<td>" + value.prof_name + "</td>" + 
      //                   "<td>" + value.tadi_date + "</td>" + 
      //                   "<td><button class=\"btn btn-sm w-100\" style=\"background-color: #181a46; color: white;\" data-bs-toggle=\"modal\" data-bs-target=\"#tadiModal1\">VIEW</button></td>" +
      //                 "</tr>";
    
      // })

      // $("tbody tr").remove();
      // $("tbody").append(displaytable);
    }


  });
}
function GET_DEPARTMENTAL_INSTRUCTOR() {
  $.ajax({
    type: "GET",
    url: "controller/index-info.php",
    data: {
      type: "GET_DEPARTMENTAL_INSTRUCTOR",
    },
    dataType: "json",
    success: function (result) {

      console.log('##result', result);

    }


  });
}


