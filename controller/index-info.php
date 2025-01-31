<?php 
    include('../configuration/connection-config.php');

    if($_GET['type'] == 'GET_SCHOOL_YEAR'){

        $qry = "SELECT  `SchlAcadYr_NAME` `AcadYr_Name`,
                        `SchlAcadYr_DESC` `AcadYr_Desc`,
                        `SchlAcadYrSms_ID` `AcadYr_ID`
                    
                FROM    `schoolacademicyear`

                WHERE `SchlAcadYr_ID` = 14 AND
                    `SchlAcadYr_STATUS`= 1 AND
                    `SchlAcadYr_ISACTIVE` = 1";

        $rreg = $dbPortal->query($qry);
        $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
        $dbPortal->close();

    }

    echo json_encode($fetch);

?>