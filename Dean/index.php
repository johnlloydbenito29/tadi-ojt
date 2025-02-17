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
                    <option value="" disabled>Academic Level</option>

                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select" id="academicyearlevel" name="academicyearlevel">
                        <option>Year Level</option>
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="academicperiod" name="academicperiod">
                        <option selected>Period</option>
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="acadyear" name="acadyear">
                        <option selected>Academic Year</option>
                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="type" name="type">
                        <option value="all">All</option>
                        <option value="instructor">Instructor</option>
                        <option value="subject">Subject</option>
                    </select>
                </div>

                <div class="col-md box box-one" style="display:none;">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search Subject">
                </div>

                <div class="col-md box box-two" style="display:none;">
                    <input type="text" class="form-control" id="searchValInstr" placeholder="Search Instructor">
                </div>

                <div class="col-md">
                    <button type="button" id="search_button" name="search_button" class="btn w-100" style="background-color:#181a46; color: white;">Search</button>
                </div>
            </div>
        </div>

        <div class="mt-4 ps-3 pe-3">
            <div class="card shadow-sm">
                <div class="card-body box box-one">
                    <h4 class="card-title mb-3">Subject</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" style="line-height: 2.5;">
                            <thead style="background-color: #181a46; color: white;">
                                <tr>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Schedule</th>
                                    <th scope="col">Instructor/Professor</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="subject">
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

  
        <div class="mt-4 ps-3 pe-3 box box-two mb-4">
            <div class="card shadow-sm" id="div">
                <div class="card-body box box-two">
                    <h4 class="card-title mb-3">Instructor</h4>
                    <div>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" style="line-height: 2.5;">
                                <thead style="background-color: #181a46; color: white;">
                                    <tr>
                                        <th scope="col">Name of Instructor</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col-2"></th>
                                    </tr>
                                </thead>
                                <tbody id="instructor">
                                    <tr>
                                        <td colspan="5" class="text-center">No data available</td>
                                    </tr>
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
                        <button type="button" style="background-color: rgb(255, 255, 255);" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="mt-4 ps-3 pe-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="box box-two" style="display:none;">
                                    <h4 class="card-title mb-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover" style="line-height: 2.5;">
                                                <thead style="background-color: #181a46; color: white;">

                                                </thead>
                                                <tbody id="instructor">
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

                </div>
            </div>

        </div>


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
                        <button type="button" style="background-color: rgb(255, 255, 255);" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="mt-4 ps-3 pe-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="box box-two" style="display:none;">
                                    <h4 class="card-title mb-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover" style="line-height: 2.5;">
                                                <thead style="background-color: #181a46; color: white;">

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

                </div>
            </div>

        </div>

        <!-- TADI Modals -->
        <div class="modal fade" id="tadiModal1" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                        <div class="subject-info">
                            <h5 class="modal-title" id="tadiModal1">Physical Education</h5>
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
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#type").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").hide();
                        if (optionValue === "instructor") {
                            $(".box-two").show();
                        } else if (optionValue === "subject") {
                            $(".box-one").show();
                        }
                    } else {
                        $(".box").show(); // Hide all if no option is selected
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>



</body>

</html>