<?php

include('../configuration/connection-config.php');

    session_start();

    if($_POST['type'] == 'APPROVE_TADI'){
        $tadi_id = $_POST['tadi_id'];
        $is_confirm = $_POST['is_confirm'];

        $qry = "UPDATE `schooltadi` 
                SET `schltadi_isconfirm` = 1, `schltadi_status` = 1
                WHERE `schltadi_id` = $tadi_id";

        $stmt = $dbPortal->prepare($qry);
        $stmt->bind_param("ii", $is_confirm, $tadi_id);
        
        if($stmt->execute()){
            $response = array(
                'status' => 'success',
                'message' => 'TADI form updated successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Error updating TADI form'
            );
        }

        $stmt->close();
        $dbPortal->close();
    }
    
    echo json_encode($fetch);

?>