<?php

function getPreferedCurrencyConversionRateofUser($userId) {
     global $adb;
	$PtQuery = $adb->pquery("SELECT * from vtiger_users where id = " . $userId);
	$PtFieldsCount =$adb->num_rows($PtQuery);
	$currecyId = '';
	for ($i = 0; $i < $PtFieldsCount; $i++) {
		$currecyId = $adb->query_result($PtQuery, $i, 'currency_id');
	}

	$PtQuery = $adb->pquery("SELECT * from vtiger_currency_info where id = " . $currecyId);
	$PtFieldsCount =$adb->num_rows($PtQuery);
	$conversion_rate = '';
	for ($i = 0; $i < $PtFieldsCount; $i++) {
		$conversion_rate = $adb->query_result($PtQuery, $i, 'conversion_rate');
	}
	
	return $conversion_rate;
}

function handleSetEstimatedDate($entityData) {
        global $adb;
    
        $projectData = $entityData->{'data'};
        $id = $projectData['id'];
        $id = explode('x', $id)[1];
  
	    $recordInstance = Vtiger_Record_Model::getInstanceById($id);
		$user = $recordInstance->get('assigned_user_id');
		$duedate = $recordInstance->get('closingdate');

		$startDate = date('Y-m-01', strtotime($duedate));
		$endDate = date('Y-m-t', strtotime($duedate));

		$query = "SELECT vtiger_targets.*,vtiger_targetscf.* from vtiger_targets
		left join vtiger_crmentity on (vtiger_targets.targetsid = vtiger_crmentity.crmid)
		left join vtiger_targetscf on (vtiger_targets.targetsid = vtiger_targetscf.targetsid)
		where vtiger_crmentity.smownerid =  $user and vtiger_crmentity.deleted = 0 
		and vtiger_targetscf.cf_1071 = '$startDate' and vtiger_targetscf.cf_1073 = '$endDate' ";
		

		$result = $adb->pquery($query, array());
		$recentlyClosedProjects = [];
		if($result){
			$rowCount = $adb->num_rows($result);
			while ($rowCount > 0) {
				$rowData = $adb->query_result_rowdata($result,$rowCount-1);
				array_push($recentlyClosedProjects, $rowData);
				--$rowCount;
			}
		}
        
		if(!empty($recentlyClosedProjects)){
		$query = "SELECT SUM(`vtiger_potential`.`amount`) as 'totalamt' FROM `vtiger_potential` 
		left join vtiger_crmentity on (vtiger_potential.potentialid = vtiger_crmentity.crmid) 
		where vtiger_crmentity.smownerid = $user and vtiger_crmentity.deleted = 0
		and vtiger_potential.sales_stage IN ('Closed Won' ,'Closed Won not shipped','won but not shipped')
		and ( vtiger_potential.closingdate BETWEEN '$startDate' AND '$endDate')";
		$result = $adb->pquery($query, array());
		$achieved = 0;
		if($result){
			$rowCount = $adb->num_rows($result);
			while ($rowCount > 0) {
				$rowData = $adb->query_result_rowdata($result,$rowCount-1);
				$achieved = $rowData['totalamt'];
				--$rowCount;
			}
		}

		$numberOFDeals = 0;
		$query = "SELECT count(*) as 'numberofdeals' FROM `vtiger_potential` 
		left join vtiger_crmentity on (vtiger_potential.potentialid = vtiger_crmentity.crmid) 
		where vtiger_crmentity.smownerid = $user and vtiger_crmentity.deleted = 0
		and ( vtiger_potential.closingdate BETWEEN '$startDate' AND '$endDate')";
		$result = $adb->pquery($query, array());
		if($result){
			$rowCount = $adb->num_rows($result);
			while ($rowCount > 0) {
				$rowData = $adb->query_result_rowdata($result,$rowCount-1);
				$numberOFDeals = $rowData['numberofdeals'];
				--$rowCount;
			}
		}

		$numberOFDealsClosed = 0;
		$query = "SELECT count(*) as 'numberofdealsclosed' FROM `vtiger_potential` 
		left join vtiger_crmentity on (vtiger_potential.potentialid = vtiger_crmentity.crmid) 
		where vtiger_crmentity.smownerid = $user and vtiger_crmentity.deleted = 0
		and vtiger_potential.sales_stage IN ('Closed Won' ,'Closed Won not shipped','won but not shipped')
		and ( vtiger_potential.closingdate BETWEEN '$startDate' AND '$endDate')";
		$result = $adb->pquery($query, array());
		if($result){
			$rowCount = $adb->num_rows($result);
			while ($rowCount > 0) {
				$rowData = $adb->query_result_rowdata($result,$rowCount-1);
				$numberOFDealsClosed = $rowData['numberofdealsclosed'];
				--$rowCount;
			}
		}

		$totaldealAmount = 0;
		$query = "SELECT SUM(vtiger_potential.amount) as 'totaldealamount' FROM `vtiger_potential` 
		left join vtiger_crmentity on (vtiger_potential.potentialid = vtiger_crmentity.crmid) 
		where vtiger_crmentity.smownerid = $user and vtiger_crmentity.deleted = 0
		and ( vtiger_potential.closingdate BETWEEN '$startDate' AND '$endDate')";
		$result = $adb->pquery($query, array());
		if($result){
			$rowCount = $adb->num_rows($result);
			while ($rowCount > 0) {
				$rowData = $adb->query_result_rowdata($result,$rowCount-1);
				$totaldealAmount = $rowData['totaldealamount'];
				--$rowCount;
			}
		}

		$conversionRatio = ($numberOFDealsClosed/$numberOFDeals) * 100;

		$curencyConversionValue = getPreferedCurrencyConversionRateofUser($user);

		foreach($recentlyClosedProjects as $userQuotaentry){
			$gap = ($userQuotaentry['cf_1075'] * $curencyConversionValue ) - ($achieved * $curencyConversionValue );
			$gap = $gap / $curencyConversionValue;
		
			$query = "update vtiger_targetscf set cf_1077 = $totaldealAmount, cf_1089 = $conversionRatio, cf_1079 = $numberOFDealsClosed, cf_1087 = $achieved, cf_1079 = $numberOFDeals , cf_1083 = $gap where targetsid = " . $userQuotaentry['targetsid'];
			$adb->pquery($query);
		}
	}
}


