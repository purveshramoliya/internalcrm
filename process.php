<?php

require_once('include/utils/utils.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');

global $adb,$log; 
$adb = PearDatabase::getInstance();
$record=$_POST['record'];


         $rcheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Rejected'";
         $rcheck_result = $adb->pquery($rcheck_query);

         if($adb->num_rows($rcheck_result)>=1)
          {
            echo "You have already Rejected The Offer";
            die();
          }
         elseif(isset($_POST['Accept']) && $adb->num_rows($rcheck_result)<=1){
             $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Accepted' WHERE joineeid =".$record); //write this query according to your table schema
             echo "You have Accepted the task";
             die();
         }

         $acheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Accepted'";
         $acheck_result = $adb->pquery($acheck_query);

         if($adb->num_rows($acheck_result)>=1)
          {
            echo "You have already Accepted The Offer";
            die();
          }
         elseif(isset($_POST['Reject']) && $adb->num_rows($acheck_result)<=1){
            $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Rejected' WHERE joineeid =".$record); //write this query according to your table schema
            echo "You have Rejected the offer";
            die();
         }


        header('Location: ' . $_SERVER['HTTP_REFERER']);
          //header("Location:http://localhost/realestate/index.php");
?>
         
        