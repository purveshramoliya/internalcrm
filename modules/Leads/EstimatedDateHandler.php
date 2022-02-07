<?php
function handleLeadsTargetCalculator($entityData)
{
    global $adb;
    $projectData = $entityData->{'data'};
    $id = $projectData['id'];
    $id = explode('x', $id)[1];
    $recordInstance = Vtiger_Record_Model::getInstanceById($id);
    
    $user = $recordInstance->get('assigned_user_id');
    $createddate = $recordInstance->get('createdtime');

    $startDate = date('Y-m-01', strtotime($createddate));
    $endDate = date('Y-m-t', strtotime($createddate));

    $query = "SELECT vtiger_leadstargets.*, vtiger_leadstargetscf.* from vtiger_leadstargets
		left join vtiger_crmentity on (vtiger_leadstargets.leadstargetsid = vtiger_crmentity.crmid)
		left join vtiger_leadstargetscf on (vtiger_leadstargets.leadstargetsid = vtiger_leadstargetscf.leadstargetsid)
		where vtiger_crmentity.smownerid =  $user and vtiger_leadstargetscf.cf_1105 = '$startDate' and vtiger_leadstargetscf.cf_1107 = '$endDate' ";

    $result = $adb->pquery($query, array());
    $recentlyClosedProjects = [];
    if ($result) {
        $rowCount = $adb->num_rows($result);
        while ($rowCount > 0) {
            $rowData = $adb->query_result_rowdata($result, $rowCount - 1);
            array_push($recentlyClosedProjects, $rowData);
            --$rowCount;
        }
    }

    if (!empty($recentlyClosedProjects)) {

        $query = "SELECT count(*) as 'numberofleadscreated' FROM `vtiger_leaddetails` 
    		left join vtiger_crmentity on (vtiger_leaddetails.leadid = vtiger_crmentity.crmid) 
    		where vtiger_crmentity.smownerid = $user and vtiger_leaddetails.converted = '0' 
    		and ( vtiger_crmentity.createdtime BETWEEN '$startDate' AND '$endDate') and vtiger_crmentity.deleted = 0 ";
        $result = $adb->pquery($query, array());
        $numberofleadscreated = 0;
        if ($result) {
            $rowCount = $adb->num_rows($result);
            while ($rowCount > 0) {
                $rowData = $adb->query_result_rowdata($result, $rowCount - 1);
                $numberofleadscreated =  $rowData['numberofleadscreated'];
                --$rowCount;
            }
        }
        

        foreach ($recentlyClosedProjects as $userQuotaentry) {
            $target = $userQuotaentry['cf_1101'];
            $gap = $target - $numberofleadscreated;
            $conversionRatio = ($numberofleadscreated/$target) * 100;
            $PtQuery = $adb->pquery("update vtiger_leadstargetscf set cf_1103 = $numberofleadscreated, cf_1111 = $gap, cf_1113 = $conversionRatio where leadstargetsid = " . $userQuotaentry['leadstargetsid']);
            $PtFieldsCount = $adb->num_rows($PtQuery);
        }
    }
}
