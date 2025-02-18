<?php 
    include('../configuration/connection-config.php');

    session_start();

    // dashboard prof
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
                    `schl_acad_sec`.`SchlAcadSec_NAME`  `subj_sec_name`,
                    `schl_enr_subj_off`.`SchlEnrollSubjOff_ISACTIVE` `subj_act`,
                    (
                        SELECT 
                            CONCAT(
                                `SchlEnrollRegStudInfo_FIRST_NAME`,' ',
                                `SchlEnrollRegStudInfo_MIDDLE_NAME`,' ',
                                `SchlEnrollRegStudInfo_LAST_NAME`
                                
                            )

                        FROM
                            `schooltadi` AS schl_td
                        JOIN
                            `schoolstudent` AS schl_stud ON schl_td.`schlstud_id` = schl_stud.`SchlStudSms_ID`
                        JOIN
                            `schoolenrollmentregistration` AS schl_enr_reg ON schl_stud.`SchlEnrollRegColl_ID` = schl_enr_reg .`SchlEnrollRegSms_ID`
                        JOIN
                            `schoolenrollmentregistrationstudentinformation` AS schl_reg_stud ON schl_enr_reg .`SchlEnrollRegSms_ID` = schl_reg_stud.`SchlEnrollReg_ID`
                        WHERE
                            schl_td.`schlenrollsubjoff_id` = `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID`
                        ORDER BY
                            schl_stud.`SchlStudSms_ID`  
                        LIMIT 1
                    ) AS stud_name
                FROM
                    `schoolenrollmentsubjectoffered` AS `schl_enr_subj_off`
                LEFT JOIN
                    `schoolacademicsubject` AS `schl_acad_subj` ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`
                LEFT JOIN
                    `schoolacademicsection` AS `schl_acad_sec` ON `schl_enr_subj_off`.`SchlAcadSec_ID` = `schl_acad_sec`.`SchlAcadSecSms_ID`
                WHERE
                    `schl_enr_subj_off`.`SchlAcadLvl_ID` = $LVLID AND 
                    `schl_enr_subj_off`.`SchlAcadYr_ID` = $YRID AND 
                    `schl_enr_subj_off`.`SchlAcadPrd_ID` = $PRDID AND 
                    `schl_enr_subj_off`.`SchlProf_ID` = $USERID AND 
                    `schl_enr_subj_off`.`SchlEnrollSubjOff_ISACTIVE` = 1";


        $rreg = $dbPortal->query($qry);
        $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
        $dbPortal->close();

    }
    //for removal 
    if($_GET['type'] == 'GET_STUDENT_LIST'){
        
            $qry = "   SELECT 	
                            CONCAT( `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_FIRST_NAME`, ' ', 
                        `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_MIDDLE_NAME`, ' ', 
                        `schl_enr_reg_stud_info`.`SchlEnrollRegStudInfo_LAST_NAME`) `stud_name`,
                        
                        `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                        `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,s
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
                    `schl_tadi`.`schltadi_isconfirm` = 1 ";

            $rreg = $dbPortal->query($qry);
            $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
            $dbPortal->close();

    }
    //student tadi second
    if($_GET['type'] == 'GET_TADI_SUBJ_LIST'){

    $USERID = $_SESSION['USERID'];
    $val = $_GET['value'];
    
    $qry = "   SELECT  *, CONCAT(
                `SchlEnrollRegStudInfo_FIRST_NAME`,' ',
                `SchlEnrollRegStudInfo_MIDDLE_NAME`,' ',
                `SchlEnrollRegStudInfo_LAST_NAME`) AS STUD_NAME
            
                    FROM
                        `schooltadi` AS schl_td
                    LEFT JOIN `schoolstudent` AS schl_stud 
                        ON schl_td.`schlstud_id` = schl_stud.`SchlStudSms_ID`
                    LEFT JOIN `schoolenrollmentregistration` AS schl_enr_reg 
                        ON schl_stud.`SchlEnrollRegColl_ID` = schl_enr_reg .`SchlEnrollRegSms_ID`
                    LEFT JOIN`schoolenrollmentregistrationstudentinformation` AS schl_reg_stud 
                        ON schl_enr_reg .`SchlEnrollRegSms_ID` = `schl_reg_stud`.`SchlEnrollReg_ID`
                    WHERE 
                    `schlprof_id` = $USERID AND 
                    `schlenrollsubjoff_id` =  $val AND 
                    `schltadi_isconfirm` = 1 
        
";

        $rreg = $dbPortal->query($qry);
        $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
        $dbPortal->close();

}

    if($_GET['type'] == 'GET_TADI_LIST_STUDENT_2'){
        

        $qry = "SELECT
                tadi.schltadi_id,
                acad_subj.SchlAcadSubj_CODE AS subj_code,
                acad_subj.SchlAcadSubj_NAME AS subj_name,
                acad_subj.SchlAcadSubj_DESC AS subj_desc,
                CONCAT(emp.SchlEmp_LNAME, ',', emp.SchlEmp_FNAME, ' ', emp.SchlEmp_MNAME) AS prof_name,
                tadi.schltadi_date,
                tadi.schltadi_mode,
                tadi.schltadi_type,
                tadi.schltadi_timein,
                tadi.schltadi_timeout,
                tadi.schltadi_activity,
                tadi.schltadi_isactive,
                tadi.schltadi_status,
                tadi.schltadi_isconfirm,
                tadi.schlstud_id,
                tadi.schlacadlvl_id,
                tadi.schlacadyr_id,
                tadi.schlenrollsubjoff_id,
                tadi.schlprof_id,
                (
                    SELECT
                        CONCAT(
                            reg_stud_info.SchlEnrollRegStudInfo_FIRST_NAME,
                            ' ',
                            reg_stud_info.SchlEnrollRegStudInfo_MIDDLE_NAME,
                            ' ',
                            reg_stud_info.SchlEnrollRegStudInfo_LAST_NAME
                        )
                            FROM
                                schooltadi AS st
                            JOIN
                                schoolstudent AS stud ON st.schlstud_id = stud.SchlStudSms_ID
                            JOIN
                                schoolenrollmentregistration AS enr_reg ON stud.SchlEnrollRegColl_ID = enr_reg.SchlEnrollRegSms_ID
                            JOIN
                                schoolenrollmentregistrationstudentinformation AS reg_stud_info ON enr_reg.SchlEnrollRegSms_ID = reg_stud_info.SchlEnrollReg_ID
                            WHERE
                                st.schlenrollsubjoff_id = enr_subj_off.SchlEnrollSubjOffSms_ID
                            ORDER BY
                                stud.SchlStudSms_ID
                            LIMIT 1
                        ) AS stud_name
                    FROM
                        schooltadi AS tadi
                    LEFT JOIN
                        schoolenrollmentsubjectoffered AS enr_subj_off ON tadi.schlenrollsubjoff_id = enr_subj_off.SchlEnrollSubjOffSms_ID
                    LEFT JOIN
                        schoolacademicsubject AS acad_subj ON enr_subj_off.SchlAcadSubj_ID = acad_subj.SchlAcadSubjSms_ID
                    LEFT JOIN
                        schoolemployee AS emp ON tadi.schlprof_id = emp.SchlEmpSms_ID
                    WHERE
                        tadi.schltadi_isactive = 1
                        AND tadi.schltadi_status = 1
                        AND tadi.schltadi_isconfirm = 1";

                    $rreg = $dbPortal->query($qry);
                    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
                    $dbPortal->close();
    }


    if($_GET['type'] == 'CHECK_MATCHED_SUBJ_ID'){

        $subj_id = $_GET['subj_id'];

        $qry = "SELECT 
                    `schl_tadi`.`schltadi_id` `tadi_id`,
                    `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                    `schl_acad_subj`.`SchlAcadSubj_NAME` `subj_name`,
                    `schl_acad_subj`.`SchlAcadSubj_DESC` `subj_desc`,
                    CONCAT ( `schl_emp`.`SchlEmp_FNAME`, ' ',
                            `schl_emp`.`SchlEmp_LNAME`) `prof_name`,
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
                    `schl_tadi`.`schlprof_id` `prof_id`,
                    CONCAT(
                `SchlEnrollRegStudInfo_FIRST_NAME`,' ',
                `SchlEnrollRegStudInfo_MIDDLE_NAME`,' ',
                `SchlEnrollRegStudInfo_LAST_NAME`) AS STUD_NAME
                    
 

                FROM 	`schooltadi` `schl_tadi`
                
		    LEFT JOIN `schoolstudent` AS schl_stud 
                        ON schl_tadi.`schlstud_id` = schl_stud.`SchlStudSms_ID`
                        
                    LEFT JOIN `schoolenrollmentregistration` AS schl_enr_reg 
                        ON schl_stud.`SchlEnrollRegColl_ID` = schl_enr_reg .`SchlEnrollRegSms_ID`
                        
                    LEFT JOIN`schoolenrollmentregistrationstudentinformation` AS schl_reg_stud 
                        ON schl_enr_reg .`SchlEnrollRegSms_ID` = `schl_reg_stud`.`SchlEnrollReg_ID`
                    

                    LEFT JOIN `schoolenrollmentsubjectoffered` `schl_enr_subj_off`
                        ON `schl_tadi`.`schlenrollsubjoff_id` = `schl_enr_subj_off`.`SchlEnrollSubjOffSms_ID`

                    LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                        ON `schl_enr_subj_off`.`SchlAcadSubj_ID` =  `schl_acad_subj`.`SchlAcadSubjSms_ID`
                    
                    LEFT JOIN `schoolemployee` `schl_emp`
                        ON `schl_tadi`.`schlprof_id` = `schl_emp`.`SchlEmpSms_ID`
                        
                WHERE 	
                    `SchlEnrollSubjOffSms_ID` = $subj_id AND
                    `schltadi_isconfirm` = 1
                    
                order by  `schl_tadi`.`schltadi_date` desc";

                    $rreg = $dbPortal->query($qry);
                    $fetch = $rreg->fetch_all(MYSQLI_ASSOC);
                    $dbPortal->close();
    }

    // option main dashboard 
    if ($_GET['type'] == 'GET_DEPARTMENTAL_SUBJECT') {

        $lvlid = $_GET['lvl_id'];
        $prdid = $_GET['prd_id'];
        $yrid = $_GET['yr_id'];
        $yrlvlid = $_GET['yrlvl_id'];
    
        $qry = "  SELECT  `schl_acad_sec`.`SchlAcadSec_NAME`  `subj_sec_name`,
                                    `schl_enr_subj_off`.`SchlProf_ID`,
                                    CONCAT(emp.SchlEmp_LNAME, ',', emp.SchlEmp_FNAME, ' ', emp.SchlEmp_MNAME) AS prof_name,
                                    `schl_acad_subj`.`SchlAcadSubj_desc` `subj_desc`,
                                    `schl_acad_subj`.`SchlAcadSubj_CODE` `subj_code`,
                                    `schl_enr_subj_off`.`SchlEnrollSubjOff_SCHEDULE_2` subj_sched
                                    
    
                                    FROM `schoolenrollmentsubjectoffered` `schl_enr_subj_off`
    
                                    LEFT JOIN `schoolacademicsubject` `schl_acad_subj`
                                    ON `schl_enr_subj_off`.`SchlAcadSubj_ID` = `schl_acad_subj`.`SchlAcadSubjSms_ID`
    
                                    LEFT JOIN `schoolacademiccourses` `schl_acad_crses`
                                    ON `schl_enr_subj_off`.`SchlAcadCrses_ID` = `schl_acad_crses`.`SchlAcadCrseSms_ID`
    
                                    LEFT JOIN `schooldepartment` `schl_dept`
                                    ON `schl_acad_crses`.`SchlDept_ID` = `schl_dept`.`SchlDeptSms_ID`
    
                                    LEFT JOIN`schoolacademicsection` AS `schl_acad_sec`
                                    ON `schl_enr_subj_off`.`SchlAcadSec_ID` = `schl_acad_sec`.`SchlAcadSecSms_ID`
    
    
                                    LEFT JOIN schoolemployee AS emp
                                    ON `schl_enr_subj_off`. `SchlProf_ID`= emp.`SchlEmpSms_ID`
                                    WHERE
                                    `schl_enr_subj_off`.`SchlAcadLvl_ID` = $lvlid  AND -- academic level
                                    `schl_enr_subj_off`.`SchlAcadYr_ID`  = $yrid AND  -- year
                                    `schl_enr_subj_off`.`SchlAcadPrd_ID` = $prdid  AND -- period
                                    `schl_enr_subj_off`.`SchlAcadYrLvl_ID` = $yrlvlid AND -- year level
                                    `schl_dept`.`SchlDeptSms_ID` = 6 and
                                    `schl_enr_subj_off`.`SchlEnrollSubjOff_ISACTIVE` = 1";
    
        $rreg = $dbPortal->query($qry);
        $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
        $dbPortal->close();
    }

    if($_GET['type'] == 'GET_ACADEMIC_LEVEL'){

        $qry = " SELECT  `SchlAcadLvl_NAME` `AcadLvl_Name`,
                         `SchlAcadLvl_DESC` `AcadLvl_Desc`,
                         `SchlAcadLvlSms_ID` `AcadLvl_ID`
            
                 FROM    `schoolacademiclevel`

                 WHERE   
                        `SchlAcadLvl_ISACTIVE` = 1";

      $rreg = $dbPortal->query($qry);
      $fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
      $dbPortal->close();

    }


    if ($_GET['type'] == 'GET_ACADEMIC_YEAR_LEVEL') {

	$lvlid = $_GET['lvl_id'];


	$qry = "    SELECT  `SchlAcadYrLvlSms_ID` `ACAD_YRLVL_ID`,
						`SchlAcadYrLvl_NAME` `ACAD_YRLVL_NAME`

				from    `schoolacademicyearlevel`

				where 	`SchlAcadYrLvl_STATUS` = 1 AND 
						`SchlAcadYrLvl_ISACTIVE` = 1 AND 
						`SchlAcadLvl_ID` = $lvlid ";

	$rreg = $dbPortal->query($qry);
	$fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
	$dbPortal->close();
}

if ($_GET['type'] == 'GET_ACADEMIC_PERIOD') {


	$lvlid = $_GET['lvl_id'];

	$qry = "    SELECT 	`schl_acad_prd`.`SchlAcadPrdSms_ID` `acad_prd_id`,
											`schl_acad_prd`.`SchlAcadPrd_NAME` `acad_prd_name`

					                FROM 	`schoolacademicyearperiod` `schl_acad_yr_prd`

						            	LEFT JOIN `schoolacademicperiod` `schl_acad_prd`
							        		ON `schl_acad_yr_prd`.`SchlAcadPrd_ID` =  `schl_acad_prd`.`SchlAcadPrdSms_ID`

					                WHERE 	`schl_acad_yr_prd`.`SchlAcadLvl_ID` = $lvlid AND
											`schl_acad_yr_prd`.`SchlAcadYrPrd_ISACTIVE` = 1 AND 
											`schl_acad_yr_prd`.`SchlAcadYrPrd_ISOPEN` = 1";

	$rreg = $dbPortal->query($qry);
	$fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
	$dbPortal->close();
}
if ($_GET['type'] == 'GET_ACAD_YEAR') {


	$lvlid = $_GET['lvl_id'];
	$prdid = $_GET['prd_id'];

	$qry = "  SELECT  `schl_acad_yr_prd`.`SchlAcadLvl_ID` `YEAR_ID`,
						`schl_yr`.`SchlAcadYr_DESC` `YEAR_NAME`  
						
				FROM `schoolacademicyearperiod` `schl_acad_yr_prd`
											
					LEFT JOIN `schoolacademicyear` `schl_yr`  
						ON `schl_acad_yr_prd`.`SchlAcadYr_ID` = `schl_yr`.`SchlAcadYrSms_ID`

				WHERE 	`schl_acad_yr_prd`.`SchlAcadYrPrd_ISOPEN` = 1 AND
						`schl_acad_yr_prd`.`SchlAcadYrPrd_ISACTIVE` = 1 AND
						`schl_acad_yr_prd`.`SchlAcadLvl_ID` = $lvlid AND 
						`schl_acad_yr_prd`.`SchlAcadPrd_ID` = $prdid";

	$rreg = $dbPortal->query($qry);
	$fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
	$dbPortal->close();
}
    echo json_encode($fetch);

?>




