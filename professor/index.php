<?php
session_start();

// "13506";


$_SESSION['USERID'] = "255";
$_SESSION['LVLID'] = "2";
$_SESSION['YRID'] = "16";
$_SESSION['PRDID'] = "5";
$_SESSION['SUBACT'] = "1";

echo var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="css_tadi.css">
    <script src="tool/jquery-3.6.0.min.js"></script>

</head>

<body>
    <section>
        <div class="container-fluid mt-4">
            <h2 class="mb-4 text-center">Student Academic Tadi</h2>
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md">
                    <select class="form-select" id="academicLevel" name="academicLevel">
                        <option selected>Status Level</option>
                        <option value="1">Basic Education</option>
                        <option value="2">Tertiary</option>
                        <option value="3">Graduate School</option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select" id="academicYearLevel" name="academicYearLevel">
                        <option selected>Year Level</option>
                        <!-- <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option> -->


                    </select>
                </div>

                <div class="col-md">
                    <select class="form-select" id="period" name="period">
                        <option selected>Period</option>
                        <option value="1">1st Sem</option>
                        <option value="2">2nd Sem</option>
                        <option value="3">Mid Year </option>
                    </select>
                </div>
                <div class="col-md">
                    <select class="form-select" id="academicSchoolYear" name="academicSchoolYear">
                        <option selected>School Year</option>
                        <!-- <option value="1">2023-2024</option>
                        <option value="2">2024-2025</option> -->
                    </select>
                </div>
                <div class="col-md">
                    <input type="text" class="form-control" id="subj_code" name="subjectCode" placeholder="Subject Code">
                </div>
                <div class="col-md">
                    <button type="button" class="btn w-100" style="background-color: #181a46; color: white;">Search</button>
                </div>
            </div>

            <div class="mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Quarterly Performance Report</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="line-height: 2.5;">
                                <thead style="background-color: #181a46; color: white;">
                                    <tr>
                                        <th scope="col">Subject Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Section</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="prof_dashboard_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TADI Modals -->
            <div class="modal fade" id="tadiModal" tabindex="-1" aria-labelledby="tadiModalLabel" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                            <div class="subject-info">
                                <h5 class="modal-title" id="tadi_subj_name">Physical-Education</h5>   
                                <!-- <p class="subject-details mb-0" id="courseCode">Course Code: PE_02</p> -->
                                <p class="subject-details mb-0" id="section_name">Course Code: PE_02</p>
                            </div>
                        </div>
                        <div class="modal-body">
                        <div class="row justify-content-center align-items-center g-3">

                            <div class="col-md">
                                <select class="form-select" id="Section" name="Section">
                                <option selected>Date</option>
                                <option value="1">#</option>
                                <option value="2">#</option>
                                <option value="3">#</option>
                                </select>
                            </div>

                            <div class="col-md">
                                <button type="button" class="btn w-100" style="background-color: #181a46; color: white;">Search</button>
                                </div>
                            </div>
             <!-- TADI_SUBJECT MODAL -->
            
                            <div class="mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" style="line-height: 2.5;">
                                <thead style="background-color: #181a46; color: white;">
                                    <tr>
                                            <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>   
                                    </tr>
                                </thead>
                                <tbody class="prof_tadi_list_table">
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

                 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal fade" id="tadiModal2" tabindex="-1" aria-labelledby="tadiModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                <div class="subject-info">
                    <h5 class="modal-title" id="tadi_modal_label"></h5>
                    <p id="subject_code" class="subject-details mb-0"></p>
                    <p id="tadi_date" class="mb-0"></p>
                </div>
                <!-- Close Button on Top Right -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-4">
                    <div class="col flex">
                        <h6>Professor Name:</h6>
                        <p id="prof_name"></p>
                    </div>

                    <div class="col flex">
                        <h6>Learning Delivery Modalities:</h6>
                        <p id="modalities"></p>
                    </div>

                    <div class="col flex">
                        <h6>Session Type:</h6>
                        <p id="session_type"></p>
                    </div>

                    <div class="row my-4">
                        <div class="col-4 flex">
                            <h6>Class Start Time:</h6>
                            <p id="time_in"></p>
                        </div>

                        <div class="col flex">
                            <h6>Class End Time:</h6>
                            <p id="time_out"></p>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="flex">
                                <h6 class="mb-4">Remarks:</h6>

                                <div class="border border-secondary-subtle p-3 border-1 rounded">
                                    <p id="report"> </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>


</body>

</html>
