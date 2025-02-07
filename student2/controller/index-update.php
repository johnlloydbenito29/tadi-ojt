<?php

include('../configuration/connection-config.php');

    session_start();

    $response = array(
        'status' => 0,
        'message' => ""
    );

    if($_POST['type'] == 'UPDATE_TADI_STATUS'){
        $id = $_POST['id'];
        $status = $_POST['status'];

        $qry = "UPDATE `schooltadi` 
                SET `schltadi_isconfirm` = $status
                WHERE `schltadi_id` = $id";

        $rreg = $dbPortal->query($qry);

        $count = mysqli_affected_rows($dbPortal);

        if($count < 1){
            
            $response['message'] = 'Update of status is not succeded';
            
        } else {
            $response['status'] = 1;
            $response['message'] = 'Update of status is successful';


        } 

        

        $dbPortal->close();

    }
    
    echo json_encode($response);

?>