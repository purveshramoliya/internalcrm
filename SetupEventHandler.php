<?php
require_once('include/database/PearDatabase.php');
include_once('include/events/include.inc');

$adb = PearDatabase::getInstance();
$em = new VTEventsManager($adb);

$module = 'Joinee';

$em->registerHandler('vtiger.entity.beforesave', 'modules/'.$module.'/'.$module.'ActiveHandler.php', $module.'ActiveHandler');
//$em->registerHandler('vtiger.entity.beforesave.modifiable', 'modules/'.$module.'/'.$module.'Handler.php', $module.'Handler');
//$em->registerHandler('vtiger.entity.beforesave.final', 'modules/'.$module.'/'.$module.'Handler.php', $module.'Handler');
$em->registerHandler('vtiger.entity.aftersave', 'modules/'.$module.'/'.$module.'ActiveHandler.php', $module.'ActiveHandler');

echo 'Events Added Successfully.';
?>