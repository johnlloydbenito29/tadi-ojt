<?php
include('../configuration/connection-config.php');

session_start();


if ($_POST['type'] == 'SUBMIT_TADI') {
    // Retrieve data from POST request
    $professor_id = $_POST['schlprof_id'];
    $mode_of_class = $_POST['schltadi_mode'];
    $type_of_class = $_POST['schltadi_type'];
    $comments = $_POST['schltadi_activity'];
    $subject_id = $_POST['schlenrollsubjoff_id'];
   

    // Prepare the SQL statement
    $stmt = $dbPortal->prepare("INSERT INTO schooltadi 
            (schlprof_id, schltadi_mode, schltadi_type, schltadi_activity, 
             schlenrollsubjoff_id) 
            VALUES ('$professor_id','$mode_of_class','$type_of_class','$comments','$subject_id')");

    // Execute the statement
    if ($stmt->execute()) {
        // Success response
        echo json_encode(array('success' => true));
    } else {
        // Error response
        echo json_encode(array('success' => false, 'error' => $stmt->error));
    }

    // Close statement and connection
    $stmt->close();
    $dbPortal->close(); 
}
?>