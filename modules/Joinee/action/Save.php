<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
class Joinee_Save_Action extends Vtiger_Save_Action {

/**
 * Function to get the record model based on the request parameters
 * @param Vtiger_Request $request
 * @return Vtiger_Record_Model or Module specific Record Model instance
*/

protected function getRecordModelFromRequest(Vtiger_Request $request) {
	$recordModel = parent::getRecordModelFromRequest($request);
	return $recordModel;
}

public function process(Vtiger_Request $request) {
	parent::process($request);
	}
}
