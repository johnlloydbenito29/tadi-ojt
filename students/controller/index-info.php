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

    $qry = "    SELECT `enr_reg_asmt`.`SchlAcadSubj_ID` `subj_offered` 
 
                FROM `schoolenrollmentregistration` `schl_enr_reg`
            
                    LEFT JOIN `schoolenrollmentadmission` `schl_enr_adm` 
                                ON `schl_enr_reg`.`SchlEnrollRegSms_ID` = `schl_enr_adm`.`SchlEnrollReg_ID`
                        LEFT JOIN `schoolenrollmentassessment` `enr_reg_asmt`
                                ON `schl_enr_adm`.`SchlEnrollAdmSms_ID` = `enr_reg_asmt`.`SchlEnrollAdm_ID`
            
                WHERE `schl_enr_reg`.`SchlEnrollRegSms_ID` = 335";

    $rreg = $dbPortal->query($qry);
    $subj_list = $rreg->fetch_assoc();
    
    $int_subj_list = $subj_list['subj_offered'];

    $qry2 = "SELECT 	`schl_enr_subj_off`.`SchlAcadSubj_ID` `subj_id`,
                        `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                        `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,
                        `schl_acad_subj`.`SchlAcadSubj_NAME` `subj_name`,

                        CONCAT (`schl_emp`.`SchlEmp_LNAME` , ', ', `schl_emp`.`SchlEmp_FNAME` )`prof_name`

            FROM 	`schoolenrollmentsubjectoffered` `schl_enr_subj_off`

                LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                    ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`
                    
                LEFT JOIN `schoolemployee` `schl_emp`
                    ON `schl_enr_subj_off`.`SchlProf_ID` = `schl_emp`.`SchlEmpSms_ID`
                
            WHERE 	 `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID` IN ($int_subj_list)
        ";
    $rreg = $dbPortal->query($qry2);
    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
    $dbPortal->close();

}

    echo json_encode($fetch);

?>