<?php

    // if($_GET['type'] == 'GET_TADI_LIST_STUDENT_2'){

    //     $qry = "SELECT 	
    //                 `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
    //                 `schl_acad_subj`.`SchlAcadSubj_NAME` `subj_name`,
    //                 `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,
    //                 CONCAT ( `schl_emp`.`SchlEmp_LNAME`, ',',
    //                     `schl_emp`.`SchlEmp_FNAME`, ' ',
    //                     `schl_emp`.`SchlEmp_MNAME`) `prof_name`,
    //                 `schl_tadi`.`schltadi_date` `tadi_date`

                    

    //             FROM 	`schooltadi` `schl_tadi`

    //                 LEFT JOIN `schoolenrollmentsubjectoffered` `schl_enr_subj_off`
    //                     ON `schl_tadi`.`schlenrollsubjoff_id` = `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID`

    //                 LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
    //                     ON `schl_enr_subj_off`.`SchlAcadSubj_ID` =  `schl_acad_subj`.`SchlAcadSubjSms_ID`
                    
    //                 LEFT JOIN `schoolemployee` `schl_emp`
    //                     ON `schl_tadi`.`schlprof_id` = `schl_emp`.`SchlEmpSms_ID`
                        
    //             WHERE 	
    //                 `schl_tadi`.`schltadi_isactive` = 1 AND 
    //                 `schl_tadi`.`schltadi_status` = 1 AND 
    //                 `schl_tadi`.`schltadi_isconfirm` = 0 ";

    //                 $rreg = $dbPortal->query($qry);
    //                 $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
    //                 $dbPortal->close();
    //                 }
    //               echo json_encode($fetch);

?>