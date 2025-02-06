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
                                        <th scope="col">Instructor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center">No subjects available</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TADI Modals -->
        <div class="modal-container"></div>

        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="tadiModalLabel1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header flex justify-content-between align-items-start" style="background-color: #181a46; color: white;">
                        <div class="subject-info">
                            <h5 class="modal-title" id="tadi_modal_label"></h5>
                            <p id="subject_details" class="subject-details mb-0"></p>
                        </div>

                        <p id="date_now"></p>
                    </div>
                    <div class="modal-body">

                        <form id="tadiForm">
                            <input type="text" style="display: none;" id="subjoff_id" name="subjoff_id">
                            <div class="row my-4">
                                <div class="col">
                                    <label for="instructor" class="form-label">Instructor</label>
                                    <select class="form-select" name="instructor" id="instructor" required>
                                        <option>Select Instructor</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="learning_delivery_modalities" class="form-label">Learning Delivery Modalities</label>
                                    <select class="form-select" name="learning_delivery_modalities" id="learning_delivery_modalities" required>
                                        <option value="" selected disabled>Select Mode</option>
                                        <option value="online_learning">Online Learning</option>
                                        <option value="onsite_learning">OnSite Learning</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label for="session_type" class="form-label">Session Type</label>
                                    <select class="form-select" name="session_type" id="session_type" required>
                                        <option value="" selected disabled>Select Type</option>
                                        <option value="regular">Regular Class</option>
                                        <option value="makeup">Make-Up Class</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-4">
                                    <label for="classStartDateTime" class="form-label">Class Start Schedule</label>
                                    <input type="time" class="form-control" name="classStartDateTime" id="classStartDateTime" required>
                                </div>

                                <div class="col-4">
                                    <label for="classEndDateTime" class="form-label">Class End Schedule</label>
                                    <input type="time" class="form-control" name="classEndDateTime" id="classEndDateTime" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="comments" class="form-label">Report</label>
                                <textarea class="form-control" name="comments" id="comments" rows="5" placeholder="Enter any additional comments or notes here..." required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn submitTadi" style="background-color: #181a46; color: white;">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>

</body>

</html>