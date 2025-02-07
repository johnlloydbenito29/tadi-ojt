<?php

session_start();

$_SESSION['LVLID'] = 2;
$_SESSION['PRDID'] = 5;
$_SESSION['YRID'] = 14;

echo var_dump($_SESSION);


3

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
                                        <th scope="col">Period</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>OOP_1</td>
                                        <td>Object Oriented Programming</td>
                                        <td>1st Sem</td>
                                        <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">VIEW</button></td>
                                    </tr>
                                    <tr>
                                        <td>DSC_2</td>
                                        <td>Discrete 2</td>
                                        <td></td>
                                        <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal2">VIEW</button></td>
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
                        <div class="row justify-content-center align-items-center g-3">

                            <div class="col-md">
                                <select class="form-select" id="academicLevel" name="academicLevel">
                                <option selected>Section</option>
                                <option value="1">#</option>
                                <option value="2">#</option>
                                <option value="3">#</option>
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
                                <option value="3">Mid Year</option>
                                </select>
                            </div>
                                <div class="col-md">
                                <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student Name">
                            </div>
                            <div class="col-md">
                                <button type="button" class="btn w-100" style="background-color: #181a46; color: white;">Search</button>
                                </div>
                            </div>
                            <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                                <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="d-flex justify-content-between w-100">
                                <div >Louise Mae Lopez</div>
                                    <div class="text-end">
                                    <span class="badge bg-primary me-2" >BSIT 4A</span>
                                    <span class="badge me-2" style="color: black;">Approved by: Jane Doe</span>
                                    <span class="badge me-2" style="color: black;">Feb 2 2025</span>

                                
                                </div>
                                </div>
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <h6>Professor Name:</h6>
                                        <p>John Artemson De Guzman</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h6>Mode of Class:</h6>
                                        <p>Asynchronous</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h6>Type of Class:</h6>
                                        <p>Regular Class</p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                        <h6>Class Start Schedule:</h6>
                                        <p>October 26, 2023 1:00 PM</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h6>Class End Schedule:</h6>
                                        <p>October 26, 2023 4:00 PM</p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                        <h6>Report:</h6>
                                        <div class="border border-secondary-subtle p-3 border-1 rounded">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    <div class="d-flex justify-content-between w-100">
                                        <div >Jonah Pasis</div>
                                            <div class="text-end">
                                            <span class="badge bg-primary me-2" >BSIT 4A</span>
                                            <span class="badge me-2" style="color: black;">Approved by: Jane Doe</span>
                                            <span class="badge me-2" style="color: black;">Feb 2 2025</span>
                                        </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <p>Content for Accordion Item 2.  You can add more information here.</p>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                        <h6>Class Start Schedule:</h6>
                                        <p>November 2, 2023 2:00 PM</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h6>Class End Schedule:</h6>
                                        <p>November 2, 2023 5:00 PM</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                    <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Accordion Item #3 (Example)
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                    <p>Content for Accordion Item 3.  You can add more information here.</p>
                                    <div class="row mt-4">
                                        <div class="col-md-4">
                                        <h6>Class Start Schedule:</h6>
                                        <p>November 9, 2023 10:00 AM</p>
                                        </div>
                                        <div class="col-md-4">
                                        <h6>Class End Schedule:</h6>
                                        <p>November 9, 2023 1:00 PM</p>
                                        </div>
                                    </div>
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
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>

</body>

</html>