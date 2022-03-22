<?php
/***********************************************************************************************
** The contents of this file are subject to the Vtiger Module-Builder License Version 1.3
 * ( "License" ); You may not use this file except in compliance with the License
 * The Original Code is:  Technokrafts Labs Pvt Ltd
 * The Initial Developer of the Original Code is Technokrafts Labs Pvt Ltd.
 * Portions created by Technokrafts Labs Pvt Ltd are Copyright ( C ) Technokrafts Labs Pvt Ltd.
 * All Rights Reserved.
**
*************************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Joinee extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_joinee';
	var $table_index= 'joineeid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_joineecf', 'joineeid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_joinee', 'vtiger_joineecf');
	
	
	/**
	 * Other Related Tables
	 */
	var $related_tables = Array( 
					'vtiger_joineecf' => Array('joineeid')
					);

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_joinee'   => 'joineeid',
	    'vtiger_joineecf' => 'joineeid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Joinee No' => Array('joinee', 'joineeno'),
/*'Joinee No'=> Array('joinee', 'joineeno'),*/
		'Assigned To' => Array('crmentity','smownerid')
	);
	var $list_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Joinee No' => 'joineeno',
/*'Joinee No'=> 'joineeno',*/
		'Assigned To' => 'assigned_user_id'
	);

	// Make the field link to detail view
	var $list_link_field = 'joineeno';

	// For Popup listview and UI type support
	var $search_fields = Array(
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Joinee No' => Array('joinee', 'joineeno'),
/*'Joinee No'=> Array('joinee', 'joineeno'),*/
		'Assigned To' => Array('vtiger_crmentity','assigned_user_id'),
	);
	var $search_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Joinee No' => 'joineeno',
/*'Joinee No'=> 'joineeno',*/
		'Assigned To' => 'assigned_user_id',
	);

	// For Popup window record selection
	var $popup_fields = Array ('joineeno');

	// For Alphabetical search
	var $def_basicsearch_col = 'joineeno';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'joineeno';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('joineeno','assigned_user_id');

	var $default_order_by = 'joineeno';
	var $default_sort_order='ASC';

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
		global $adb;
 		if($eventType == 'module.postinstall') {
			// TODO Handle actions after this module is installed.
			Joinee::checkWebServiceEntry();
			Joinee::createUserFieldTable($moduleName);
			Joinee::addInTabMenu($moduleName);
		} else if($eventType == 'module.disabled') {
			// TODO Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			// TODO Handle actions after this module is updated.
			Joinee::checkWebServiceEntry();
		}
 	}
	
	/*
	 * Function to handle module specific operations when saving a entity
	 */
	function save_module($module)
	{
		global $adb;
		$q = 'SELECT '.$this->def_detailview_recname.' FROM '.$this->table_name. ' WHERE ' . $this->table_index. ' = '.$this->id;
		
		$result =  $adb->pquery($q,array());
		$cnt = $adb->num_rows($result);
		if($cnt > 0) 
		{
			$label = $adb->query_result($result,0,$this->def_detailview_recname);
			$q1 = 'UPDATE vtiger_crmentity SET label = \''.$label.'\' WHERE crmid = '.$this->id;
			$adb->pquery($q1,array());
		}
	}


	//type argument included when when addin customizable tempalte for sending offer letter
	 public static function getOfferLetterEmailContents($entityData, $type='') {
        require_once 'config.inc.php';
	 	global $site_URL, $HELPDESK_SUPPORT_EMAIL_ID;

	 	$adb = PearDatabase::getInstance();
	 	$moduleName = $entityData->getModuleName();
	 	$entityId = $entityData->getId();
	 	if(isset($entityId))
	 	{
	 		$Link=$site_URL.'UploadDocuments.php?record_id='.$joineeid;

	 	$OfferLink ='<form name="form1" method="post" action="'.$site_URL.'process.php">'
        .'<div>'
        .'<input type="hidden" name="record" value='.$entityId.'>'
        .'<input type="hidden" name="DocumentType" value="Offer">'
        .'<input type="submit" name="Accept" value="Accept" style=" background-color: #0066ff;color: #f2f2f2;font: bolder 1.0em Tahoma; border: 1px solid #001a66;padding: 5px;margin-right:10px;margin-top:10px;"/>'
        .'<input type="submit" name="Reject" value="Reject" style=" background-color: #0066ff;color: #f2f2f2;font: bolder 1.0em Tahoma; border: 1px solid #001a66;padding: 5px;margin-right:10px;margin-top:10px;"/>'
        .'</div>'
        .'</form>';
	 	}
	 	
	 	$DocumentLink = vtranslate('Please ',$moduleName).'<a href="'.$Link.'" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">'.  vtranslate('click here', $moduleName).'</a>';
	 	//here id is hardcoded with 5. it is for support start notification in vtiger_notificationscheduler
	 	$query='SELECT vtiger_emailtemplates.subject,vtiger_emailtemplates.body
	 				FROM vtiger_emailtemplates WHERE vtiger_emailtemplates.templateid=26';

	 	$result = $adb->pquery($query, array());
	 	$body=decode_html($adb->query_result($result,0,'body'));
	 	$contents=$body;
	 	$contents = str_replace('$joinee-joinee_tks_firstname$',$entityData->get('joinee_tks_firstname')." ".$entityData->get('joinee_tks_lastname'),$contents);
	 	$contents = str_replace('$joinee-joinee_tks_positiontitle$',$entityData->get('joinee_tks_positiontitle'),$contents);
	 	$contents = str_replace('$joinee-cf_1334$',$entityData->get('cf_1334'),$contents);
	 	$contents = str_replace('$URL$',$DocumentLink,$contents);
	 	$contents = str_replace('$OfferLink$',$OfferLink,$contents);
	 	// $contents = str_replace('$support_team$',getTranslatedString('Support Team', $moduleName),$contents);
	 	// $contents = str_replace('$logo$','<img src="cid:logo" />',$contents);

	 	if($type == "OfferLetter") {
	 		$temp=$contents;
	 		$value["subject"]=decode_html($adb->query_result($result,0,'subject'));
	 		$value["body"]=$temp;
	 		return $value;
	 	}
	 	return $contents;
	 }

	 //type argument included when when addin customizable tempalte for sending appointment letter
	 public static function getAppointmentLetterEmailContents($entityData, $type='') {
        require_once 'config.inc.php';
	 	global $site_URL, $HELPDESK_SUPPORT_EMAIL_ID;

	 	$adb = PearDatabase::getInstance();
	 	$moduleName = $entityData->getModuleName();
	 	$entityId = $entityData->getId();

	 	if(isset($entityId))
	 	{
	 	$Link ='<form name="form1" method="post" action="'.$site_URL.'process.php">'
        .'<div>'
        .'<input type="hidden" name="record" value='.$entityId.'>'
        .'<input type="hidden" name="DocumentType" value="Appointment">'
        .'<input type="submit" name="Accept" value="Accept" style=" background-color: #0066ff;color: #f2f2f2;font: bolder 1.0em Tahoma; border: 1px solid #001a66;padding: 5px;margin-right:10px;margin-top:10px;"/>'
        .'<input type="submit" name="Reject" value="Reject" style=" background-color: #0066ff;color: #f2f2f2;font: bolder 1.0em Tahoma; border: 1px solid #001a66;padding: 5px;margin-right:10px;margin-top:10px;"/>'
        .'</div>'
        .'</form>';
	 	}
	 
	 	//here id is hardcoded with 27. it is for support start notification in vtiger_notificationscheduler
	 	$query='SELECT vtiger_emailtemplates.subject,vtiger_emailtemplates.body FROM vtiger_emailtemplates WHERE vtiger_emailtemplates.templateid=27';

	 	$result = $adb->pquery($query, array());
	 	$body=decode_html($adb->query_result($result,0,'body'));
	 	$contents=$body;
	 	$contents = str_replace('$joinee-joinee_tks_firstname$',$entityData->get('joinee_tks_firstname')." ".$entityData->get('joinee_tks_lastname'),$contents);
	 	$contents = str_replace('$joinee-joinee_tks_positiontitle$',$entityData->get('joinee_tks_positiontitle'),$contents);
	 	$contents = str_replace('$joinee-cf_1334$',$entityData->get('cf_1334'),$contents);
	 	$contents = str_replace('$Link$',$Link,$contents);
	 	// $contents = str_replace('$support_team$',getTranslatedString('Support Team', $moduleName),$contents);
	 	// $contents = str_replace('$logo$','<img src="cid:logo" />',$contents);

	 	if($type == "AppointmentLetter") {
	 		$temp=$contents;
	 		$value["subject"]=decode_html($adb->query_result($result,0,'subject'));
	 		$value["body"]=$temp;
	 		return $value;
	 	}
	 	return $contents;
	 }

	/**
	 * Function to check if entry exsist in webservices if not then enter the entry
	 */
	static function checkWebServiceEntry() {
		global $log;
		$log->debug("Entering checkWebServiceEntry() method....");
		global $adb;

		$sql       =  "SELECT count(id) AS cnt FROM vtiger_ws_entity WHERE name = 'Joinee'";
		$result   	= $adb->query($sql);
		if($adb->num_rows($result) > 0)
		{
			$no = $adb->query_result($result, 0, 'cnt');
			if($no == 0)
			{
				$tabid = $adb->getUniqueID("vtiger_ws_entity");
				$ws_entitySql = "INSERT INTO vtiger_ws_entity ( id, name, handler_path, handler_class, ismodule ) VALUES".
						  " (?, 'Joinee','include/Webservices/VtigerModuleOperation.php', 'VtigerModuleOperation' , 1)";
				$res = $adb->pquery($ws_entitySql, array($tabid));
				$log->debug("Entered Record in vtiger WS entity ");	
			}
		}
		$log->debug("Exiting checkWebServiceEntry() method....");					
	}
	
	static function createUserFieldTable($module)
	{
		global $log;
		$log->debug("Entering createUserFieldTable() method....");
		global $adb;
		
		$sql	=	"CREATE TABLE IF NOT EXISTS `vtiger_".$module."_user_field` (
  						`recordid` int(19) NOT NULL,
					  	`userid` int(19) NOT NULL,
  						`starred` varchar(100) DEFAULT NULL,
  						 KEY `record_user_idx` (`recordid`,`userid`)
						) 			
						ENGINE=InnoDB DEFAULT CHARSET=utf8";
		$result	=	$adb->pquery($sql,array());					
	}
	
	static function addInTabMenu($module)
	{
		global $log;
		$log->debug("Entering addInTabMenu() method....");
		global $adb;
		$gettabid	=	$adb->pquery("SELECT tabid,parent FROM vtiger_tab WHERE name = ?",array($module));
		$tabid		=	$adb->query_result($gettabid,0,'tabid');
		$parent		=	$adb->query_result($gettabid,0,'parent');
		$parent		=	strtoupper($parent);
		
		$getmaxseq	=	$adb->pquery("SELECT max(sequence)+ 1 as maxseq FROM vtiger_app2tab WHERE appname = ?",array($parent));
		$sequence	=	$adb->query_result($getmaxseq,0,'maxseq');
		
		$sql		=	"INSERT INTO `vtiger_app2tab` (`tabid` ,`appname` ,`sequence` ,`visible`)VALUES (?, ?, ?, ?)";
		$result		=	$adb->pquery($sql,array($tabid,$parent,$sequence,1));		
	}
	
}