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
                                        <th scope="col">Student Name</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>OOP_1</td>
                                        <td>Object Oriented Programming</td>
                                        <td>BSCS 4A</td>
                                        <td>Jonah Pasis</td>
                                        <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">VIEW</button></td>
                                    </tr>
                                    <tr>
                                        <td>DSC_2</td>
                                        <td>Discrete 2</td>
                                        <td>BSIT-CS 4A</td>
                                        <td>Louise Mae Lopez</td>
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

                                        <div class="border border-secondary-subtle p-3 border-1 rounded">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal">Not Approve</button>
                                <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal">Approve</button>
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