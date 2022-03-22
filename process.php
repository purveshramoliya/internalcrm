<?php

require_once('include/utils/utils.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');

global $adb,$log; 
$adb = PearDatabase::getInstance();
$record=$_POST['record'];
$documenttype=$_POST['DocumentType'];

if($documenttype == 'Appointment')
{
   $rcheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Rejected'";
   $rcheck_result = $adb->pquery($rcheck_query);

   if($adb->num_rows($rcheck_result)>=1)
   {
    echo "You have already Rejected The Appointment Letter.";
    die();
}
elseif(isset($_POST['Accept']) && $adb->num_rows($rcheck_result)<=1){
             $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Accepted' WHERE joineeid =".$record); //write this query according to your table schema
             echo "You have Accepted The Appointment Letter.";
             die();
         }

         $acheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Accepted'";
         $acheck_result = $adb->pquery($acheck_query);

         if($adb->num_rows($acheck_result)>=1)
         {
            echo "You have already Accepted The Appointment Letter.";
            die();
        }
        elseif(isset($_POST['Reject']) && $adb->num_rows($acheck_result)<=1){
            $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Rejected' WHERE joineeid =".$record); //write this query according to your table schema
            echo "You have Rejected The Appointment Letter.";
            die();
        }
    }

    if($documenttype == 'Offer')
{
   $rcheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1350='Rejected'";
   $rcheck_result = $adb->pquery($rcheck_query);

   if($adb->num_rows($rcheck_result)>=1)
   {
    echo "You have already Rejected The Offer Letter";
    die();
}
elseif(isset($_POST['Accept']) && $adb->num_rows($rcheck_result)<=1){
             $adb->pquery("UPDATE vtiger_joineecf SET cf_1350 ='Accepted' WHERE joineeid =".$record); //write this query according to your table schema
             echo "You have Accepted The Offer Letter";
             die();
         }

         $acheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1350='Accepted'";
         $acheck_result = $adb->pquery($acheck_query);

         if($adb->num_rows($acheck_result)>=1)
         {
            echo "You have already Accepted The Offer Letter";
            die();
        }
        elseif(isset($_POST['Reject']) && $adb->num_rows($acheck_result)<=1){
            $adb->pquery("UPDATE vtiger_joineecf SET cf_1350 ='Rejected' WHERE joineeid =".$record); //write this query according to your table schema
            echo "You have Rejected The Offer Letter";
            die();
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
          //header("Location:http://localhost/realestate/index.php");
    ?>

