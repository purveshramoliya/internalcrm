<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

//Same as Accounts Detail View
class Joinee_DetailView_Model extends Vtiger_DetailView_Model {

	public function getDetailViewLinks($linkParams) {
		$currentUserModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();

		//$linkModelList = parent::getDetailViewLinks($linkParams);
		$moduleModel = $this->getModule();
		$recordModel = $this->getRecord();
		$emailModuleModel = Vtiger_Module_Model::getInstance('Emails');
		$linkModelList = Vtiger_DetailView_Model::getDetailViewLinks($linkParams);

		$joineeModuleModel = Vtiger_Module_Model::getInstance('Joinee');
		if($currentUserModel->hasModuleActionPermission($joineeModuleModel->getId(), 'CreateView')) {
			$basicActionLink = array(
				'linktype' => 'DETAILVIEW',
				'linklabel' => 'LBL_BONDLETTER',
				'linkurl' => $recordModel->getBondLetterUrl(),
				'linkicon' => ''
			);
			$linkModelList['DETAILVIEW'][] = Vtiger_Link_Model::getInstanceFromValues($basicActionLink);
		}
		if(Users_Privileges_Model::isPermitted($moduleModel->getName(), 'ConvertLead', $recordModel->getId()) && Users_Privileges_Model::isPermitted($moduleModel->getName(), 'EditView', $recordModel->getId()) && !$recordModel->isLeadConverted()) {
			$basicActionLink = array(
				'linktype' => 'DETAILVIEWBASIC',
				'linklabel' => 'LBL_CONVERT_USER',
				'linkurl' => 'Javascript:Joinee_Detail_Js.convertLead("'.$recordModel->getConvertLeadUrl().'",this);',
				'linkicon' => ''
			);
			$linkModelList['DETAILVIEWBASIC'][] = Vtiger_Link_Model::getInstanceFromValues($basicActionLink);
		}

		return $linkModelList;
	}

}
