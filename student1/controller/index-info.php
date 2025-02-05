<?php 
    include('../configuration/connection-config.php');

    session_start();


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

    if($_GET['type'] == 'GET_ACADEMIC_LEVEL'){

        $qry = " SELECT  `SchlAcadLvl_NAME` `AcadLvl_Name`,
                         `SchlAcadLvl_DESC` `AcadLvl_Desc`,
                         `SchlAcadLvlSms_ID` `AcadLvl_ID`
            
                 FROM    `schoolacademiclevel`

                 WHERE   `SchlAcadLvlSms_ID` = 2 AND
                         `SchlAcadLvl_STATUS`= 1 AND
                         `SchlAcadLvl_ISACTIVE` = 1";

      $rreg = $dbPortal->query($qry);
      $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
      $dbPortal->close();

 }

 if($_GET['type'] == 'GET_SUBJECT_LIST'){

    $LVLID = $_SESSION['LVLID'];
    $YRID = $_SESSION['YRID'];
    $PRDID = $_SESSION['PRDID'];
    $YRLVLID = $_SESSION['YRLVLID'];
    $CRSEID = $_SESSION['CRSEID'];

    $qry = "   SELECT 	
                        `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID` `subj_id`,
                        `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                        `schl_acad_subj`.`SchlAcadSubj_desc` `subj_desc`,
                        `schl_enr_subj_off`.`SchlEnrollSubjOff_UNIT` `schl_subj_unit`,
                        `schl_enr_subj_off`.`SchlProf_ID` `prof_id`,
                        (
                        SELECT 
                            REPLACE (GROUP_CONCAT(`schl_emp`.`SchlEmp_FNAME`,' ',`schl_emp`.`SchlEmp_LNAME` ), ',', ' / ')
                            
                            FROM `schoolemployee` `schl_emp`
                            
                            WHERE FIND_IN_SET(`schl_emp`.`SchlEmpSms_ID`, `schl_enr_subj_off`.`SchlProf_ID`)
                        ) `prof_name`

                FROM 	`schoolenrollmentsubjectoffered` `schl_enr_subj_off`

                    LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                        ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`
                        
                    LEFT JOIN `schoolemployee` `schl_emp`
                        ON `schl_enr_subj_off`.`SchlProf_ID` = `schl_emp`.`SchlEmpSms_ID`
                        
                WHERE 	`schl_enr_subj_off`.`SchlAcadLvl_ID` =  $LVLID AND 
                        `schl_enr_subj_off`.`SchlAcadYr_ID`  = $YRID AND 
                        `schl_enr_subj_off`.`SchlAcadPrd_ID` =  $PRDID AND 
                        `schl_enr_subj_off`.`SchlAcadYrLvl_ID` = $YRLVLID  AND 
                        `schl_enr_subj_off`.`SchlAcadCrses_ID` = $CRSEID

		


";

    $rreg = $dbPortal->query($qry);
    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
    $dbPortal->close();

}

    echo json_encode($fetch);

?>