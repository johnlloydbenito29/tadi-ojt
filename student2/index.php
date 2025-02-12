<?php

session_start();

$_SESSION['USERID'] = "13506";
$_SESSION['LVLID'] = "2";
$_SESSION['YRID'] = "16";
$_SESSION['PRDID'] = "5";
$_SESSION['YRLVLID'] = "9";
$_SESSION['CRSEID'] = "19";


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


            <div class="mt-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Quarterly Performance Report</h4>
                        <div class="table-responsive">
                            <table class="table table-hover" style="line-height: 2.5;">
                                <thead style="background-color: #181a46; color: white;">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Subject Code</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Instructor</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
        
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
                                <h5 class="modal-title" id="tadi_modal_label"></h5>
                                <p id="subject_code" class="subject-details mb-0"></p>
                                <p id="tadi_date" class="mb-0"></p>
                            </div>
                        </div>
<<<<<<< HEAD
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
=======
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
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
>>>>>>> issue_14

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

                                                            <div class="border border-secondary-subtle p-3 border-1 rounded">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                            </div>
                                                        </div>
                                                    </div>

<<<<<<< HEAD
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
=======
                                                </div>
                                            </div>

>>>>>>> issue_14
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal">Not Approve</button>
                                    <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal">Approve</button>
                                </div>

                            </div>
<<<<<<< HEAD
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal" id="status_disapprove"> Not Approve</button>
                                <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal" id="status_approve" >Approve</button>
                            </div>
=======
>>>>>>> issue_14
                        </div>
                    </div>
                </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>

</body>

</html>