<?php
    include('../configuration/connection-config.php');

    session_start();

    $fetch = array('success' => false);


    if ($_POST['type'] == 'SUBMIT_TADI') {

        $LVLID = $_SESSION['LVLID'];
        $YRID = $_SESSION['YRID'];
        $PRDID = $_SESSION['PRDID'];
        $YRLVLID = $_SESSION['YRLVLID'];
        $CRSEID = $_SESSION['CRSEID'];
        $STUDID = $_SESSION['USERID'];

        $form_data = $_POST['form_data'];
        
        try {
            // Sanitize input data
            $prof_id = $dbPortal->real_escape_string($form_data['instructor']);
            $schltadi_mode = $dbPortal->real_escape_string($form_data['learning_delivery_modalities']);
            $schltadi_type = $dbPortal->real_escape_string($form_data['session_type']);
            $schltadi_date = date('Y-m-d');
            $schltadi_timein = date('H:i:s', strtotime($form_data['classStartDateTime']));
            $schltadi_timeout = date('H:i:s', strtotime($form_data['classEndDateTime']));
            $schltadi_activity = $dbPortal->real_escape_string($form_data['comments']);
            $subj_id = $dbPortal->real_escape_string($form_data['subjoff_id']);

            $sql = "INSERT INTO schooltadi 
                (   `schltadi_mode`,
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
                    `schlenrollsubjoff_id`,
                    `schlacadprd_id`)
                    VALUES 
                    (
                    '$schltadi_mode', 
                    '$schltadi_type', 
                    '$schltadi_date',
                    '$schltadi_timein',
                    '$schltadi_timeout',
                    '$schltadi_activity',
                    1, 
                    1, 
                    0, 
                    $STUDID,
                    $LVLID, 
                    $YRID, 
                    $prof_id,
                    $subj_id,
                    $PRDID)";

            if ($dbPortal->query($sql) === TRUE) {
                $fetch['success'] = true;
            } else {
                throw new Exception("Error inserting record: " . $dbPortal->error);
            }

        } catch (Exception $e) {
            $fetch['error'] = $e->getMessage();
        } finally {
            $dbPortal->close();
        }
    }

    echo json_encode($fetch);
?>