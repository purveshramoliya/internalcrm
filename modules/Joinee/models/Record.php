<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Joinee_Record_Model extends Vtiger_Record_Model {

	/**
	 * Function returns the url for converting lead
	 */
	function getConvertLeadUrl() {
		return 'index.php?module='.$this->getModuleName().'&view=ConvertLead&record='.$this->getId();
	}

	/**
	 * Function returns the url for create event
	 * @return <String>
	 */
	function getCreateEventUrl() {
		$calendarModuleModel = Vtiger_Module_Model::getInstance('Calendar');
		return $calendarModuleModel->getCreateEventRecordUrl().'&contact_id='.$this->getId();
	}

	/**
	 * Function returns the url for create todo
	 * @return <String>
	 */
	function getCreateTaskUrl() {
		$calendarModuleModel = Vtiger_Module_Model::getInstance('Calendar');
		return $calendarModuleModel->getCreateTaskRecordUrl().'&contact_id='.$this->getId();
	}

	public function getBondLetterUrl() {
		return "index.php?module=".$this->getModuleName()."&action=BondLetter&record=".$this->getId();
	}

	/**
	 * Function returns Account fields for Lead Convert
	 * @return Array
	 */
	function getAccountFieldsForLeadConvert() {
		$accountsFields = array();
		$privilegeModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		$moduleName = 'Users';

		if(!Users_Privileges_Model::isPermitted($moduleName, 'CreateView')) {
			return;
		}

		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		if ($moduleModel->isActive()) {
			$fieldModels = $moduleModel->getFields();
            //Fields that need to be shown
            //$complusoryFields = array('');
			foreach ($fieldModels as $fieldName => $fieldModel) {
				if($fieldModel->isMandatory() && $fieldName != 'assigned_user_id') {
                    $keyIndex = array_search($fieldName,$complusoryFields);
                    if($keyIndex !== false) {
                        unset($complusoryFields[$keyIndex]);
                    }
					$leadMappedField = $this->getConvertLeadMappedField($fieldName, $moduleName);
                    if($this->get($leadMappedField)) {
                        $fieldModel->set('fieldvalue', $this->get($leadMappedField));
                    } else {
                        $fieldModel->set('fieldvalue', $fieldModel->getDefaultFieldValue());
                    } 
					$accountsFields[] = $fieldModel;	
				}
			}
            foreach($complusoryFields as $complusoryField) {
                $fieldModel = Vtiger_Field_Model::getInstance($complusoryField, $moduleModel);
				if($fieldModel->getPermissions('readwrite') && $fieldModel->isEditable()) {
                    $industryFieldModel = $moduleModel->getField($complusoryField);
                    $industryLeadMappedField = $this->getConvertLeadMappedField($complusoryField, $moduleName);
                    if($this->get($industryLeadMappedField)) {
                        $industryFieldModel->set('fieldvalue', $this->get($industryLeadMappedField));
                    } else {
                        $industryFieldModel->set('fieldvalue', $industryFieldModel->getDefaultFieldValue());
                    }
                    $accountsFields[] = $industryFieldModel;
                }
            }
		}
		return $accountsFields;
	}

	/**
	 * Function returns field mapped to Leads field, used in Lead Convert for settings the field values
	 * @param <String> $fieldName
	 * @return <String>
	 */
	function getConvertLeadMappedField($fieldName, $moduleName) {
		$mappingFields = $this->get('mappingFields');

		if (!$mappingFields) {
			$db = PearDatabase::getInstance();
			$mappingFields = array();

			$result = $db->pquery('SELECT * FROM vtiger_convertusermapping', array());
			$numOfRows = $db->num_rows($result);

			$accountInstance = Vtiger_Module_Model::getInstance('Users');
			$accountFieldInstances = $accountInstance->getFieldsById();

			$leadInstance = Vtiger_Module_Model::getInstance('Joinee');
			$leadFieldInstances = $leadInstance->getFieldsById();

			for($i=0; $i<$numOfRows; $i++) {
				$row = $db->query_result_rowdata($result,$i);
				if(empty($row['leadfid'])) continue;

				$leadFieldInstance = $leadFieldInstances[$row['leadfid']];
				if(!$leadFieldInstance) continue;

				$leadFieldName = $leadFieldInstance->getName();
				$accountFieldInstance = $accountFieldInstances[$row['accountfid']];
				if ($row['accountfid'] && $accountFieldInstance) {
					$mappingFields['Users'][$accountFieldInstance->getName()] = $leadFieldName;
				}
			}
			$this->set('mappingFields', $mappingFields);
		}
		return $mappingFields[$moduleName][$fieldName];
	}

	/**
	 * Function returns the fields required for Lead Convert
	 * @return <Array of Vtiger_Field_Model>
	 */
	function getConvertLeadFields() {
		$convertFields = array();
		$accountFields = $this->getAccountFieldsForLeadConvert();
		if(!empty($accountFields)) {
			$convertFields['Accounts'] = $accountFields;
		}
		return $convertFields;
	}


	/**
	 * Function to check whether the lead is converted or not
	 * @return True if the Lead is Converted false otherwise.
	 */
    function isLeadConverted() {
        $db = PearDatabase::getInstance();
        $id = $this->getId();
        $sql = "select converted from vtiger_leaddetails where converted = 1 and leadid=?";
        $result = $db->pquery($sql,array($id));
        $rowCount = $db->num_rows($result);
        if($rowCount > 0){
            return true;
        }
        return false;
    }

    function getRoleInfo() {
		$adb = PearDatabase::getInstance();
        $sql = "SELECT * FROM `vtiger_role` ORDER BY rolename ASC";
		$result = $adb->pquery($sql, array());
		$num_rows = $adb->num_rows($result);
		$result_array = Array();

		for ($i = 0; $i < $num_rows; $i++) {
			$getRoleInfo_details[$i]['roleid'] = $adb->query_result($result, $i, 'roleid');
			$getRoleInfo_details[$i]['rolename'] = $adb->query_result($result, $i, 'rolename');	
		}
		return $getRoleInfo_details;
	}

	function CurrentRoleId() {
        $db = PearDatabase::getInstance();
        $id = $this->getId();
        $sql = "select cf_1328 from vtiger_joineecf where joineeid=?";
        $result = $db->pquery($sql,array($id));
        $role = $db->query_result($result,0,'cf_1328');
        $getroleid=substr($role, strpos($role, '-') + 1);
        return $getroleid;
    }
}
