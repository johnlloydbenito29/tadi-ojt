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

    if($_GET['type'] == 'GET_ACADEMIC_PRD'){

            $qry = " SELECT  `SchlAcadPrd_NAME` `Period_Name`,
		                     `SchlAcadPrd_DESC` `Period_Desc`,
		                     `SchlAcadPrdSms_ID` `Period_ID`
                    
                     FROM   	`schoolacademicperiod`

                     WHERE   `SchlAcadPrdSms_ID` = 5 AND
                            `SchlAcadPrd_STATUS`= 1 AND
                        `SchlAcadPrd_ISACTIVE` = 1";

        $rreg = $dbPortal->query($qry);
        $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
        $dbPortal->close();

    }

    if($_GET['type'] == 'GET_YEAR_LEVEL'){

           $qry = " SELECT  `SchlAcadYrLvl_NAME` `Yrlvl_Name`,
		                    `SchlAcadYrLvl_DESC` `Yrlvl_Desc`,
		                    `SchlAcadYrLvlSms_ID` `Yrlvl_ID`
                    
                   FROM   	`schoolacademicyearlevel`

                   WHERE    `SchlAcadYrLvlSms_ID` = 8 AND
                            `SchlAcadYrLvl_STATUS`= 1 AND
                            `SchlAcadYrLvl_ISACTIVE` = 1";

         $rreg = $dbPortal->query($qry);
         $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
         $dbPortal->close();

    }






    echo json_encode($fetch);

?>