<?php
class ProjectHandler extends VTEventHandler {

	function handleEvent($eventName, $entityData) {
		global $log, $adb;

		if($eventName == 'vtiger.entity.aftersave') {
			$moduleName = $entityData->getModuleName();
			if ($moduleName == 'Project') {
				
               $projectype=$entityData->get('projectype');
               $modeid=$entityData->get('id');
               $projectid=$_REQUEST['currentid'];
             
            if(is_null($modeid))
                {
			      $PtQuery = $adb->pquery("SELECT * from vtiger_inventoryproductrel where id=".$projectype);
			      $PtFieldsCount = $adb->num_rows($PtQuery);
			      //$projectid=$entityData->get('id');

		            for($i=0; $i<$PtFieldsCount; $i++) {
			         	$Pt_Productname = $adb->query_result($PtQuery, $i, 'productname');
					    $focus = CRMEntity::getInstance('ProjectTask');
					    $focus->id = $entityData->getId();
					    //$focus->mode = 'edit';
						$focus->column_fields['projecttaskname'] = $Pt_Productname;
						$focus->column_fields['projectid'] = $projectid;
						$focus->column_fields['projecttaskpriority'] = 'high';
						$focus->column_fields['projecttaskstatus'] = 'Open';
						$focus->column_fields['projecttasktype'] = 'Other';

						$focus->save("ProjectTask");		
                    }
                }
			}
		}
	}
}

?>