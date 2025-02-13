<?php
include('../configuration/connection-config.php');

session_start();


if ($_GET['type'] == 'GET_SCHOOL_YEAR') {

	$qry = "SELECT  `SchlDeptHead_ID` `Schldept_NAME`,
						`SchlDept_ISACTIVE`
					
				FROM    `schooldepartment`

				WHERE `SchlDeptHead_ID` = 96 AND
					`SchlDept_NAME`=  AND
					`SchlAcadYr_ISACTIVE` = 1";

	$rreg = $dbPortal->query($qry);
	$fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
	$dbPortal->close();
}

if ($_GET['type'] == 'GET_ACADEMIC_PRD') {

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

if ($_GET['type'] == 'GET_YEAR_LEVEL') {

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

if ($_GET['type'] == 'GET_ACADEMIC_LEVEL') {


	$qry = "    SELECT 	DISTINCT `schl_acad_yr_prd`.`SchlAcadLvl_ID` `LVL_ID`,
								`schl_acad_lvl`.`SchlAcadLvl_NAME` `LVL_NAME`

				FROM 	`schoolacademicyearperiod` `schl_acad_yr_prd`

					LEFT JOIN `schoolacademiclevel` `schl_acad_lvl`
						ON `schl_acad_yr_prd`.`SchlAcadLvl_ID` = `schl_acad_lvl`.`SchlAcadLvlSms_ID`

				WHERE 	`schl_acad_yr_prd`.`SchlAcadYrPrd_ISOPEN` = 1 AND 
					`schl_acad_yr_prd`.`SchlAcadYrPrd_ISACTIVE` = 1";



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



//////GET INSTRUCTOR LIST


if ($_GET['type'] == 'GET_PROF') {


	$lvlid = $_GET['lvl_id'];
	$prdid = $_GET['prd_id'];
	$yrid = $_GET['yr_id'];

	$qry = "  SELECT
					schl_enr_subj_off.`SchlEnrollSubjOffSms_ID` subj_id,
					schl_acad_subj.`SchlAcadSubj_CODE` subj_code,
					schl_acad_subj.`SchlAcadSubj_desc` subj_desc,
					schl_enr_subj_off.`SchlEnrollSubjOff_ISACTIVE` subj_act,
					(
						SELECT
							CONCAT(SchlEmp_FNAME,' ',SchlEmp_LNAME)
													FROM
														schooltadi AS schl_td
													JOIN
														schoolemployee AS schl_emp ON schl_td.`schlprof_id` = schl_emp.`SchlEmpSms_ID`
													WHERE
														schl_td.`schlenrollsubjoff_id` = schl_enr_subj_off.`SchlEnrollSubjOffSms_ID`
													ORDER BY
														schl_emp.`SchlEmpSms_ID`  
													LIMIT 1
												) AS schl_emp
				FROM	schoolenrollmentsubjectoffered AS schl_enr_subj_off
					LEFT JOIN schoolacademicsubject AS schl_acad_subj ON schl_enr_subj_off.`SchlAcadSubj_ID` = schl_acad_subj.`SchlAcadSubjSms_ID`

				WHERE
						schl_enr_subj_off.`SchlAcadLvl_ID` = $lvlid AND 
						schl_enr_subj_off.`SchlAcadYr_ID` = $yrid AND 
						schl_enr_subj_off.`SchlAcadPrd_ID` = $prdid AND 
						schl_enr_subj_off.`SchlEnrollSubjOff_ISACTIVE` = 1";

	$rreg = $dbPortal->query($qry);
	$fetch = $rreg->fetch_ALL(MYSQLI_ASSOC);
	$dbPortal->close();
}





///////GET SUBJECT LIST 

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
















// if($_GET['type'] == 'GET__SUBJECT'){

//     $USERID = $_SESSION['USERID'];
//     $LVLID = $_SESSION['LVLID'];
//     $YRID = $_SESSION['YRID'];
//     $PRDID = $_SESSION['PRDID'];

//     $qry = "   SELECT 	
//                         schl_enr_subj_off.`SchlEnrollSubjOffSms_ID` subj_id,
//                         schl_acad_subj.`SchlAcadSubj_CODE` subj_code,
//                         schl_acad_subj.`SchlAcadSubj_desc` subj_desc,
//                         schl_enr_subj_off.`SchlAcadSec_ID` subj_sec_id,
//                         schl_acad_sec.`SchlAcadSec_NAME` subj_sec_name

//                 FROM 	schoolenrollmentsubjectoffered
//                         schl_enr_subj_off
//                 LEFT JOIN schoolacademicsubject
//                           schl_acad_subj
//                         ON schl_enr_subj_off.`SchlAcadSubj_ID` = schl_acad_subj.`SchlAcadSubjSms_ID`

//                  LEFT JOIN schoolacademicsection
//                            schl_acad_sec 


//                 WHERE 	schl_enr_subj_off.`SchlAcadLvl_ID` =  $LVLID AND 
//                         schl_enr_subj_off.`SchlAcadYr_ID`  = $YRID AND 
//                         schl_enr_subj_off.`SchlAcadPrd_ID` =  $PRDID AND 
//                         schl_enr_subj_off.`SchlProf_ID` LIKE '%$USERID%' 



// ";

// 	$rreg = $dbPortal->query($qry);
// 	$fetch = $rreg->fetch_all(MYSQLI_ASSOC);
// 	$dbPortal->close();
// }

echo json_encode($fetch);
