
<?php

    session_start();

    $_SESSION['LVLID'] = 2;
    $_SESSION['PRDID'] = 5;
    $_SESSION['YRID'] = 14;

    echo var_dump($_SESSION );


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
        <div class="container mt-4">
            <h2 class="mb-4 text-center">Student Academic Tadi</h2>
            <div class="row justify-content-center align-items-center g-3">
                <div class="col-md-3">
                    <select class="form-select" id="academicyearlevel" name="academicyearlevel">
                        <option selected>Year Level</option>
                        <!-- <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option> -->

                        
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="academicSchoolYear" name="academicSchoolYear">
                        <option selected>School Year</option>
                        <!-- <option value="1">2023-2024</option>
                        <option value="2">2024-2025</option> -->
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected disabled>Period</option>
                        <option value="1">1st Sem</option>
                        <option value="2">2nd Sem</option>
                        <option value="3">Mid Year <U></U></option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn w-100" style="background-color: #181a46; color: white;">Search</button>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Quarterly Performance Report</h4>
                    <div class="table-responsive">
                        <table class="table table-hover" style="line-height: 2.5;">
                            <thead style="background-color: #181a46; color: white;">
                                <tr>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Instructor</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>OOP_1</td>
                                    <td>Object Oriented Programming</td>
                                    <td>John Adonis</td>
                                    <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal1">TADI</button></td>
                                </tr>
                                <tr>
                                    <td>DSC_2</td>
                                    <td>Discrete 2</td>
                                    <td>Pegasus Mari</td>
                                    <td><button class="btn btn-sm w-100" style="background-color: #181a46; color: white;" data-bs-toggle="modal" data-bs-target="#tadiModal2">TADI</button></td>
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
                            <h5 class="modal-title" id="tadiModalLabel1">John Adonis</h5>
                            <p class="subject-details mb-0">Subject: Filipino</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row my-4">
                                <div class="col">
                                    <label for="modeOfClass" class="form-label">Mode Of Class</label>
                                    <select class="form-select" id="modeOfClass" required>
                                        <option value="" selected disabled>Select Mode</option>
                                        <option value="Synchronous">Synchronous</option>
                                        <option value="Asynchronous">Asynchronous</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="typeOfClass" class="form-label">Type Of Class</label>
                                    <select class="form-select" id="typeOfClass" required>
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="regular">Regular Class</option>
                                        <option value="makeup">Make up Class</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="classStartDateTime" class="form-label">Class Start Schedule</label>
                                    <input type="datetime-local" class="form-control" id="classStartDateTime" required>
                                </div>

                                <div class="col">
                                    <label for="classEndDateTime" class="form-label">Class End Schedule</label>
                                    <input type="datetime-local" class="form-control" id="classEndDateTime" required>
                                </div>
                            </div>
         
                            <div class="mb-4">
                                <label for="comments" class="form-label">Report</label>
                                <textarea class="form-control" id="comments" rows="5" placeholder="Enter any additional comments or notes here..."></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: #181a46; color: white;">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tadiModal2" tabindex="-1" aria-labelledby="tadiModalLabel2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tadiModalLabel2">Customer Satisfaction TADI Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your TADI content here -->
                        <p>Detailed analysis and insights for Customer Satisfaction will be displayed here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" style="background-color: #181a46; color: white;" data-bs-dismiss="modal">Close</button>
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