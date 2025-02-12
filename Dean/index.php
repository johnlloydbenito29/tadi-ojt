<?php

session_start();

$_SESSION['USERID'] = "13506";
$_SESSION['LVLID'] = "2";
$_SESSION['YRID'] = "16";
$_SESSION['PRDID'] = "5";
$_SESSION['YRLVLID'] = "9";
$_SESSION['CRSEID'] = "19";


echo var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>DeanDashboard</title>
    <link rel="stylesheet" href="css_tadi.css">
    <script src="tool/jquery-3.6.0.min.js"></script>
    <script 
    src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </script>

</head>

<body>
    <section>
        <div class="container-fluid mt-4">
            <h2 class="mb-4 text-center">Dean Academic Tadi</h2>
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md">
                    <select class="form-select" id="academiclevel" name="academiclevel">
                        <option selected>Academic Level</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select" id="academicyearlevel" name="academicyearlevel">
                        <option>Year Level</option>
                        <!-- <option value="1">2024-2025</option>
                        <option value="2">2023-2024</option> -->
                        <!-- <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option> -->
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="academicperiod" name="academicperiod">
                        <option selected>Period</option>
                        <!-- <option value="1">1st Sem</option>
                        <option value="2">2nd Sem</option>
                        <option value="3">Mid Year <U></U></option> -->
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="acadyear" name="acadyear">
                        <option selected>Academic Year</option>
                        <!-- <option value="1">2023-2024</option>
                        <option value="2">2024-2025</option> -->
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="academicSchoolYear" name="academicSchoolYear">
                        <option value=>Type</option>
                        <option value="box-two">Instructor</option>
                        <option value="card-body">Subject</option>
                        <!-- <option value="1">2023-2024</option>
                        <option value="2">2024-2025</option> -->
                    </select>
                </div>
                <div class="col-md box box-two" style="display:none;">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search Instructor">
                </div>
                <div class="col-md">
                    <button type="button" class="btn w-100" style="background-color:#181a46; color: white;">Search</button>
                </div>
            </div>
            </div>
            

            <div class="mt-4 ps-3 pe-3">
                <div class="card shadow-sm id=divOne">
                    <div class="card-body">
                        <div class="box box-two" style="display:none;">
                        <h4 class="card-title mb-3">Instructor</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="line-height: 2.5;">
                                <thead style="background-color: #181a46; color: white;">
                                    <tr>
                                        <th scope="col">Name of Instructor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col">John Artemson De Guzman</td>
                                        <td class="col-2"><button class="btn btn-sm w-100"
                                                style="background-color: #181a46; color: white;" data-bs-toggle="modal"
                                                data-bs-target="#tadiModal1">VIEW TADI</button></td>
                                    </tr>
                                    <tr>
                                        <td>Rendel Francisco</td>
                                        <td><button class="btn btn-sm w-100"
                                                style="background-color: #181a46; color: white;" data-bs-toggle="modal"
                                                data-bs-target="#tadiModal2">VIEW TADI</button></td>
                                    </tr>
                                    <td>Karl Michael Flores</td>
                                    <td><button class="btn btn-sm w-100"
                                            style="background-color: #181a46; color: white;" data-bs-toggle="modal"
                                            data-bs-target="#tadiModal2">VIEW TADI</button></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- TADI Modals -->
            <div class="modal fade" id="tadiModal1" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true"
                data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between align-items-start"
                            style="background-color: #181a46; color: white;">
                            <div class="subject-info">
                                <h5 class="modal-title" id="tadiModalLabel1">Subject Tadi's</h5>
                                <p class="subject-details mb-0"></p>
                            </div>
                            <button type="button" style="background-color: rgb(255, 255, 255);"  class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="accordion accordion-flush" id="accordion-body">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Software Engineering

                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="modal-body">
                                            <div class="row mt-4">
                                                <div class="col flex">
                                                    <h6>Professor Name:</h6>
                                                    <p>John Artemson De Guzman</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Mode of Class:</h6>
                                                    <p>Asynchronous</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Type of Class:</h6>
                                                    <p>Regular Class</p>
                                                </div>

                                                <div class="row my-4">
                                                    <div class="col-4 flex">
                                                        <h6>Class Start Schedule:</h6>
                                                        <p>1:00 PM</p>
                                                    </div>

                                                    <div class="col flex">
                                                        <h6>Class End Schedule:</h6>
                                                        <p>4:00 PM</p>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <div class="flex">
                                                            <h6 class="mb-4">Report:</h6>

                                                            <div
                                                                class="border border-secondary-subtle p-3 border-1 rounded">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut aliquip
                                                                    ex ea commodo consequat. Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore
                                                                    eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                    cupidatat non proident, sunt in culpa qui officia
                                                                    deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!--ACCORDION-2-->

                        <div class="accordion accordion-flush" id="accordion-body">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        Parallel and Distributed

                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="modal-body">
                                            <div class="row mt-4">
                                                <div class="col flex">
                                                    <h6>Professor Name:</h6>
                                                    <p>John Artemson De Guzman</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Mode of Class:</h6>
                                                    <p>Asynchronous</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Type of Class:</h6>
                                                    <p>Regular Class</p>
                                                </div>

                                                <div class="row my-4">
                                                    <div class="col-4 flex">
                                                        <h6>Class Start Schedule:</h6>
                                                        <p>5:00 PM</p>
                                                    </div>

                                                    <div class="col flex">
                                                        <h6>Class End Schedule:</h6>
                                                        <p>7:08 PM</p>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <div class="flex">
                                                            <h6 class="mb-4">Report:</h6>

                                                            <div
                                                                class="border border-secondary-subtle p-3 border-1 rounded">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut aliquip
                                                                    ex ea commodo consequat. Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore
                                                                    eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                    cupidatat non proident, sunt in culpa qui officia
                                                                    deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--Accordion 3-->
                        <div class="accordion accordion-flush" id="accordion-body">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        Information and Security

                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="modal-body">
                                            <div class="row mt-4">
                                                <div class="col flex">
                                                    <h6>Professor Name:</h6>
                                                    <p>John Artemson De Guzman</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Mode of Class:</h6>
                                                    <p>Asynchronous</p>
                                                </div>

                                                <div class="col flex">
                                                    <h6>Type of Class:</h6>
                                                    <p>Regular Class</p>
                                                </div>

                                                <div class="row my-4">
                                                    <div class="col-4 flex">
                                                        <h6>Class Start Schedule:</h6>
                                                        <p>5:00 PM</p>
                                                    </div>

                                                    <div class="col flex">
                                                        <h6>Class End Schedule:</h6>
                                                        <p>7:08 PM</p>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <div class="flex">
                                                            <h6 class="mb-4">Report:</h6>

                                                            <div
                                                                class="border border-secondary-subtle p-3 border-1 rounded">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco laboris nisi ut aliquip
                                                                    ex ea commodo consequat. Duis aute irure dolor in
                                                                    reprehenderit in voluptate velit esse cillum dolore
                                                                    eu fugiat nulla pariatur. Excepteur sint occaecat
                                                                    cupidatat non proident, sunt in culpa qui officia
                                                                    deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

   

    <div class="mt-4 ps-3 pe-3">
        <div class="card shadow-sm">
            <div class="card-body box" style="display:none;">
                
                <h4 class="card-title mb-3">Subject</h4>
                <div class="table-responsive">
                    <table class="table table-hover" style="line-height: 2.5;">
                        <thead style="background-color: #181a46; color: white;">
                            <tr>
                                <th scope="col">Subject Code</th>
                                <th scope="col">Description</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Instructor/Professor</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>OOP_1</td>
                                <td>Object Oriented Programming</td>
                                <td>Monday 1:00-4:00PM</td>
                                <td>Jonah Pasis</td>
                                <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">VIEW TADI</button></td>
                            </tr>
                            <tr>
                                <td>DSC_2</td>
                                <td>Discrete 2</td>
                                <td>Saturday 8:00-10:00AM</td>
                                <td>Louise Mae Lopez</td>
                                <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal2">VIEW TADI</button></td>
                            </tr>
                            <td>PE_02</td>
                                <td>Swimming</td>
                                <td>Monday 8:00-11:00AM</td>
                                <td>Ayleen Samonte</td>
                                <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">VIEW TADI</button></td>
                            </tr>
                            <td>COMPORG</td>
                                <td>Computer Organization</td>
                                <td>Thursday 8:30-9:00AM</td>
                                <td>Alvin Certeza</td>
                                <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">VIEW TADI</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TADI Modals -->
    <div class="modal fade" id="tadiModal1" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                    <div class="subject-info">
                        <h5 class="modal-title" id="tadiModalLabel1">Physical Education</h5>
                        <p class="subject-details mb-0">Course Code: PE_02</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col flex">
                            <h6>Professor Name:</h6>
                            <p>Jonah Pasis</p>
                        </div>

                        <div class="col flex">
                            <h6>Mode of Class:</h6>
                            <p>Asynchronous</p>
                        </div>

                        <div class="col flex">
                            <h6>Type of Class:</h6>
                            <p>Regular Class</p>
                        </div>


                    </div>


                    <div class="row my-4">
                        <div class="col-4 flex">
                            <h6>Class Start Schedule:</h6>
                            <p>1:00 PM</p>
                        </div>

                        <div class="col flex">
                            <h6>Class End Schedule:</h6>
                            <p>4:05 PM</p>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="flex">
                                <h6 class="mb-4">Report:</h6>

                                <div class="border border-secondary-subtle p-3 border-1 rounded">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color:rgb(0, 0, 0); color: white;" data-bs-dismiss="modal">Close</button>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tadiModal2" tabindex="-1" aria-labelledby="tadiModalLabel2" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                    <div class="subject-info">
                        <h5 class="modal-title" id="tadiModalLabel2">Discrete 2</h5>
                        <p class="subject-details mb-0">Course Code: DSC_2</p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row mt-4">
                        <div class="col flex">
                            <h6>Professor Name:</h6>
                            <p>Louise Mae Lopez</p>
                        </div>

                        <div class="col flex">
                            <h6>Mode of Class:</h6>
                            <p>Asynchronous</p>
                        </div>

                        <div class="col flex">
                            <h6>Type of Class:</h6>
                            <p>Regular Class</p>
                        </div>


                    </div>


                    <div class="row my-4">
                        <div class="col-4 flex">
                            <h6>Class Start Schedule:</h6>
                            <p>8:00 AM</p>
                        </div>

                        <div class="col flex">
                            <h6>Class End Schedule:</h6>
                            <p>10:05 AM</p>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="flex">
                                <h6 class="mb-4">Report:</h6>

                                <div class="border border-secondary-subtle p-3 border-1 rounded">
                                    <p>N/A</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color:rgb(0, 0, 0); color: white;" data-bs-dismiss="modal">Close</button>
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
      $("select").change(function(){
        $(this).find("option:selected").each(function(){
          var optionValue = $(this).attr("value");
          if (optionValue) {
            $(".box").not("." + optionValue).hide();
            $("." + optionValue).show();
          } else {
            $(".box").hide(); // Hide all if no option is selected
          }
        });
      });
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>

</body>

</html>