<?php

include('../configuration/connection-config.php');

session_start();

$response = array(
    'status' => 0,
    'message' => "",
    'student_name' => "",
    'student_section' => ""
);

if ($_POST['type'] == 'UPDATE_TADI_STATUS') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $qry = "UPDATE `schooltadi` 
            SET `schltadi_isconfirm` = $status
            WHERE `schltadi_id` = $id";

    $rreg = $dbPortal->query($qry);

    $count = mysqli_affected_rows($dbPortal);

    if ($count < 1) {
        $response['message'] = 'Update of status is not succeeded';
    } else {
        $response['status'] = 1;
        $response['message'] = 'Update of status is successful';

        // Fetch the updated student information
        $qry = "SELECT 
                    CONCAT(sch_enr_reg_stud_info.SchlEnrollRegStudInfo_FIRST_NAME, ' ', 
                    sch_enr_reg_stud_info.SchlEnrollRegStudInfo_MIDDLE_NAME, ' ', 
                    sch_enr_reg_stud_info.SchlEnrollRegStudInfo_LAST_NAME) AS student_name,
                    sch_acad_sec.SchlAcadSec_NAME AS student_section
                FROM schooltadi sch_tadi
                LEFT JOIN schoolstudent sch_stud ON sch_tadi.schlstud_id = sch_stud.SchlStudSms_ID
                LEFT JOIN schoolenrollmentregistration sch_enr_reg ON sch_stud.SchlEnrollRegColl_ID = sch_enr_reg.SchlEnrollRegSms_ID
                LEFT JOIN schoolenrollmentregistrationstudentinformation sch_enr_reg_stud_info ON sch_enr_reg.SchlEnrollRegSms_ID = sch_enr_reg_stud_info.SchlEnrollReg_ID
                LEFT JOIN schoolenrollmentsubjectoffered sch_enr_subj_off ON sch_tadi.schlenrollsubjoff_id = sch_enr_subj_off.SchlEnrollSubjOffSms_ID
                LEFT JOIN schoolacademicsection sch_acad_sec ON sch_enr_subj_off.SchlAcadSec_ID = sch_acad_sec.SchlAcadSecSms_ID
                WHERE sch_tadi.schltadi_id = $id";

        $result = $dbPortal->query($qry);
        $student_info = $result->fetch_assoc();

        if ($student_info) {
            $response['student_name'] = $student_info['student_name'];
            $response['student_section'] = $student_info['student_section'];
        }
    }

    $dbPortal->close();
}

echo json_encode($response);

?>