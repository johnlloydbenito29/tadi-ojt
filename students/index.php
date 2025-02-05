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

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="view/index-script.js"></script>
    <script src="view/index-function.js"></script>

</body>

</html>