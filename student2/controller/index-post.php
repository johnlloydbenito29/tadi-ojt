<?php
include('../configuration/connection-config.php');

session_start();

if ($_POST['type'] == 'SUBMIT_TADI') {
    $professor = $_POST['professor'];
    $mode_of_class = $_POST['mode_of_class'];
    $type_of_class = $_POST['type_of_class'];
    $class_start = $_POST['class_start_date_time'];
    $class_end = $_POST['class_end_date_time'];
    $comments = $_POST['comments'];
    $subject_id = $_POST['subject_id'];
    $stud_2_id = $_POST['stud_2_id'];

    $qry = "INSERT INTO schooltadi
            (`schltadi_mode`,
            `schltadi_type`,
            `schltadi_date`,
            `schltadi_timein`,
            `schltadi_timeout`,
            `schltadi_activity`,
            `schltadi_isactive`,
            `schltadi_status`,
            `schltadi_isconfirm`,
            `schlstud_id`,
            `schlacadlvl_id`,
            `schlacadyr_id`,
            `schlprof_id`,
            `schlenrollsubjoff_id`)
            VALUES 
            ('$professor', '$mode_of_class', '$type_of_class', '$class_start',
             '$class_end', '$comments', '$subject_id', '$stud_2_id')";

    $result = $dbPortal->query($qry);
    $fetch = array('success' => $result);
    $dbPortal->close();
}


echo json_encode($fetch);
