<?php
    include('../configuration/connection-config.php');

    session_start();

    $fetch = array('success' => false);

    // if ($_POST['type'] == 'SUBMIT_TADI') {
    //     // Validate required POST parameters exist
    //     $required_fields = array(
    //         'learning_delivery_modalities',
    //         'session_type', 
    //         'classStartDateTime',
    //         'classEndDateTime',
    //         'comments'
    //     );

    //     foreach ($required_fields as $field) {
    //         if (!isset($_POST[$field]) || empty($_POST[$field])) {
    //             $fetch['error'] = "Missing required field: $field";
    //             echo json_encode($fetch);
    //             exit;
    //         }
    //     }

    //     try {
    //         // Sanitize input data
    //         $schltadi_mode = $dbPortal->real_escape_string($_POST['learning_delivery_modalities']);
    //         $schltadi_type = $dbPortal->real_escape_string($_POST['session_type']);
    //         $schltadi_date = date('Y-m-d');
    //         $schltadi_timein = date('H:i:s', strtotime($_POST['classStartDateTime']));
    //         $schltadi_timeout = date('H:i:s', strtotime($_POST['classEndDateTime']));
    //         $schltadi_activity = $dbPortal->real_escape_string($_POST['comments']);

    //         $sql = "INSERT INTO student_tadi 
    //                (`schltadi_mode`,
    //                 `schltadi_type`,
    //                 `schltadi_date`,
    //                 `schltadi_timein`,
    //                 `schltadi_timeout`,
    //                 `schltadi_activity`,
    //                 `schltadi_isactive`,
    //                 `schltadi_status`,
    //                 `schltadi_isconfirm`,
    //                 `schlstud_id`,
    //                 `schlacadlvl_id`,
    //                 `schlacadyr_id`,
    //                 `schlprof_id`,
    //                 `schlenrollsubjoff_id`)
    //                 VALUES 
    //                 ('$schltadi_mode', 
    //                 '$schltadi_type', 
    //                 '$schltadi_date',
    //                 '$schltadi_timein',
    //                 '$schltadi_timeout',
    //                 '$schltadi_activity',
    //                 '1, 1, 0, 1290, 2, 16, 6, 1555')";

    //         if ($dbPortal->query($sql) === TRUE) {
    //             $fetch['success'] = true;
    //         } else {
    //             throw new Exception("Error inserting record: " . $dbPortal->error);
    //         }

    //     } catch (Exception $e) {
    //         $fetch['error'] = $e->getMessage();
    //     } finally {
    //         $dbPortal->close();
    //     }
    // }



    if ($_POST['type'] == 'SUBMIT_TADI') {

        $form_data = $_POST['form_data'];
        
        try {
            // Sanitize input data
            $prof_id = $form_data['instructor'];
            $schltadi_mode = $dbPortal->real_escape_string($form_data['learning_delivery_modalities']);
            $schltadi_type = $dbPortal->real_escape_string($form_data['session_type']);
            $schltadi_date = date('Y-m-d');
            $schltadi_timein = date('H:i:s', strtotime($form_data['classStartDateTime']));
            $schltadi_timeout = date('H:i:s', strtotime($form_data['classEndDateTime']));
            $schltadi_activity = $dbPortal->real_escape_string($form_data['comments']);

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
                    `schlenrollsubjoff_id`)
                    VALUES 
                    (255, 
                    '$schltadi_type', 
                    '$schltadi_date',
                    '$schltadi_timein',
                    '$schltadi_timeout',
                    '$schltadi_activity',
                    1, 
                    1, 
                    0, 
                    1290,
                     2, 
                     16, 
                     6,
                      1555)";

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