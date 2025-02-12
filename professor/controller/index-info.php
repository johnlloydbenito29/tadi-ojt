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

    $USERID = $_SESSION['USERID'];
    $LVLID = $_SESSION['LVLID'];
    $YRID = $_SESSION['YRID'];
    $PRDID = $_SESSION['PRDID'];
    $SUBACT = $_SESSION['SUBACT'];

    $qry = "   SELECT 	
                            `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID` `subj_id`,
                            `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                            `schl_acad_subj`.`SchlAcadSubj_desc` `subj_desc`,
                            `schl_enr_subj_off`.`SchlAcadSec_ID` `subj_sec_id`,
                            `schl_acad_sec`.`SchlAcadSec_NAME` `subj_sec_name`,
                            `schl_enr_subj_off`.`SchlEnrollSubjOff_ISACTIVE` `subj_act`
                            
                    FROM 	`schoolenrollmentsubjectoffered` `schl_enr_subj_off`
                    LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                            ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`

                    LEFT JOIN `schoolacademicsection` `schl_acad_sec` 
                ON `schl_enr_subj_off`.`SchlAcadSec_ID` = `schl_acad_sec`.`SchlAcadSecSms_ID`

                    WHERE 	`schl_enr_subj_off`.`SchlAcadLvl_ID` =  $LVLID AND 
                            `schl_enr_subj_off`.`SchlAcadYr_ID`  = $YRID AND 
                            `schl_enr_subj_off`.`SchlAcadPrd_ID` =  $PRDID AND 
                            `schl_enr_subj_off`.`SchlProf_ID` LIKE '%$USERID%' AND
                            `schl_enr_subj_off`.`SchlEnrollSubjOff_ISACTIVE` = 1
                
                        


                    
";




    $rreg = $dbPortal->query($qry);
    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
    $dbPortal->close();

}

if($_GET['type'] == 'GET_STUDENT_LIST'){
    
    $qry = "   SELECT 	
                        CONCAT( `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_FIRST_NAME`, ' ', 
                    `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_MIDDLE_NAME`, ' ', 
                    `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_LAST_NAME`) `stud_name`,
                    
                    `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                    `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,
                    `schl_acad_sec`.`SchlAcadSec_NAME` `subj_sec_name`
                        
                FROM 	`schooltadi` `schl_tadi`
                LEFT JOIN `schoolstudent` `schl_stud`
                    ON `schl_tadi`.`schlstud_id` = `schl_stud`.`SchlStudSms_ID`
                    
                LEFT JOIN `schoolenrollmentregistration` `schl_enr_reg`
                    ON `schl_stud`.`SchlEnrollRegColl_ID` =  `schl_enr_reg`.`SchlEnrollRegSms_ID` 
                    
                LEFT JOIN `schoolenrollmentregistrationstudentinformation` `schl_enr_reg_stud_info`
                    ON `schl_enr_reg`.`SchlEnrollRegSms_ID` = `schl_enr_reg_stud_info`.`SchlEnrollReg_ID` 
                    
                LEFT JOIN `schoolenrollmentsubjectoffered` `schl_enr_subj_off`
                    ON `schl_tadi`.`schlenrollsubjoff_id` = `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID` 
                    
                LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                    ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`
                    
                LEFT JOIN `schoolacademicsection` `schl_acad_sec` 
                    ON `schl_enr_subj_off`.`SchlAcadSec_ID` = `schl_acad_sec`.`SchlAcadSecSms_ID`
                        

                WHERE 	`schl_tadi`.`schlprof_id` = 96 AND 
                `schl_tadi`.`schltadi_status` = 1 AND 
                `schl_tadi`.`schltadi_isconfirm` = 1 
                        


                    
";




    $rreg = $dbPortal->query($qry);
    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
    $dbPortal->close();

}




    echo json_encode($fetch);

?>