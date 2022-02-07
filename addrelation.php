<?php
/*
create_relation.php
Create this file into your root directory of vtiger i.e. vtigercrm/
and then run this file directly using your browser 
for example localhost/vtigercrm/create_relation.php
*/
include_once('vtlib/Vtiger/Module.php');//HelpDesk
$moduleInstance = Vtiger_Module::getInstance('ServiceContracts');
$accountsModule = Vtiger_Module::getInstance('Calendar');
$relationLabel  = 'Calendar';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel, Array('ADD','SELECT') //you can do select also Array('ADD','SELECT')
);

echo "done";