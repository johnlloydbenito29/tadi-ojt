<?php

include('../configuration/connection-config.php');

    session_start();

    if($_GET['type'] == 'GET_TADI_LIST_STUDENT_2'){

        $qry = "SELECT 
                    `schl_tadi`.`schltadi_id` `tadi_id`,
                    `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                    `schl_acad_subj`.`SchlAcadSubj_NAME` `subj_name`,
                    `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,
                    CONCAT ( `schl_emp`.`SchlEmp_LNAME`, ',',
                        `schl_emp`.`SchlEmp_FNAME`, ' ',
                        `schl_emp`.`SchlEmp_MNAME`) `prof_name`,
                    `schl_tadi`.`schltadi_date` `tadi_date`,
                    `schl_tadi`.`schltadi_mode` `tadi_mode`,
                    `schl_tadi`.`schltadi_type` `tadi_type`,
                    `schl_tadi`.`schltadi_timein` `time_in`,
                    `schl_tadi`.`schltadi_timeout` `time_out`,
                    `schl_tadi`.`schltadi_activity` `tadi_activity`,
                    `schl_tadi`.`schltadi_isactive` `is_active`,
                    `schl_tadi`.`schltadi_status` `tadi_status`,
                    `schl_tadi`.`schltadi_isconfirm` `is_confirm`,
                    `schl_tadi`.`schlstud_id` `stud_id`,
                    `schl_tadi`.`schlacadlvl_id` `acad_lvl_id`,
                    `schl_tadi`.`schlacadyr_id` `acad_yr_id`,
                    `schl_tadi`.`schlenrollsubjoff_id` `sub_off_id`,
                    `schl_tadi`.`schlprof_id` `prof_id`
                    
 

                FROM 	`schooltadi` `schl_tadi`

                    LEFT JOIN `schoolenrollmentsubjectoffered` `schl_enr_subj_off`
                        ON `schl_tadi`.`schlenrollsubjoff_id` = `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID`

                    LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                        ON `schl_enr_subj_off`.`SchlAcadSubj_ID` =  `schl_acad_subj`.`SchlAcadSubjSms_ID`
                    
                    LEFT JOIN `schoolemployee` `schl_emp`
                        ON `schl_tadi`.`schlprof_id` = `schl_emp`.`SchlEmpSms_ID`
                        
                WHERE 	
                    `schl_tadi`.`schltadi_isactive` = 1 AND             
                    `schl_tadi`.`schltadi_status` = 1 AND
                     `schl_tadi`.`schltadi_isconfirm` = 0";

                    $rreg = $dbPortal->query($qry);
                    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
                    $dbPortal->close();
    }

    if($_GET['type'] == 'CHECK_SUBMISSION'){

        $qry = "SELECT COUNT(*) `count`
		    
		    WHERE `schltadi_date` = '2025-02-07' AND  --current
                  `schlprof_id` = 255 AND           
                  `schlenrollsubjoff_id` = 21573
                 ";

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