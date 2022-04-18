<?php

require_once('include/utils/utils.php');
require_once('include/logging.php');
require_once('include/database/PearDatabase.php');

global $adb,$log; 
$adb = PearDatabase::getInstance();
$record=$_POST['record'];
$documenttype=$_POST['DocumentType'];

// Accept appointment letter
if($documenttype == 'Appointment' && isset($_POST['Accept']))
{
 $acheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1350='Accepted'";
 $acheck_result = $adb->pquery($acheck_query);
 $query= $adb->pquery("SELECT cf_1350 FROM `vtiger_joineecf` where joineeid=".$record);
 $appdata=$adb->query_result($query,0,'cf_1350');
 
  if($appdata == 'Rejected')
      {
         echo "You cannot Accept After Rejecation of an appointment letter.";
      }
      elseif($adb->num_rows($acheck_result)>=1)
      {
       echo "You have already Accepted The Appointment Letter.";
      }
      elseif($adb->num_rows($acheck_result)<=0){
       $adb->pquery("UPDATE vtiger_joineecf SET cf_1350 ='Accepted' WHERE joineeid =".$record); 
       echo "You have Accepted The Appointment Letter.";
      }
}

   // reject appointment letter
if($documenttype == 'Appointment' && isset($_POST['Reject']))
{
 $rcheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1350='Rejected'";
 $rcheck_result = $adb->pquery($rcheck_query);
 $query= $adb->pquery("SELECT cf_1350 FROM `vtiger_joineecf` where joineeid=".$record);
 $appdata=$adb->query_result($query,0,'cf_1350');

      if($appdata == 'Accepted')
       {
        echo "You cannot Reject After Acceptation of an appointment letter.";
      }
      elseif($adb->num_rows($rcheck_result)>=1)
      {
         echo "You have already Rejected The Appointment Letter.";
      }
      elseif($adb->num_rows($rcheck_result)<=0){
                     $adb->pquery("UPDATE vtiger_joineecf SET cf_1350 ='Rejected' WHERE joineeid =".$record); //write this query according to your table schema
                     echo "You have Rejected The Appointment Letter.";
      }
}

// accept offer letter
if($documenttype == 'Offer' && isset($_POST['Accept']))
{
   $acheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Accepted'";
   $acheck_result = $adb->pquery($acheck_query);
   $query= $adb->pquery("SELECT cf_1348 FROM `vtiger_joineecf` where joineeid=".$record);
   $appdata=$adb->query_result($query,0,'cf_1348');

      if($appdata == 'Rejected')
      {
          echo "you cannot Accept After rejecation of an offer letter.";
      }
      elseif($adb->num_rows($acheck_result)>=1)
      {
          echo "You have already Accepted The Offer Letter";
      }
      elseif($adb->num_rows($acheck_result)<=0){
            $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Accepted' WHERE joineeid =".$record); //write this query according to your table schema
           //echo "You have Accepted The Offer Letter";
            $contents='<html>
                <head>
                <title></title>
                </head>
                <body>
                <table>
                <tr><td>
                <p>Congratulations,</p>
                </td></tr>
                <tr><td>
                <p>This is to formally offer you the job from <b>BIZTECHNOSYS</b>. We strongly believe that your skill and expertise will help our company to reach great heights.</p>
                </td></tr>
                <br/>
                </table>
                </body>
                </html>';
                echo $contents;
      }
}

   // reject offer letter
if($documenttype == 'Offer' && isset($_POST['Reject']))
{
   $rcheck_query="SELECT joineeid FROM `vtiger_joineecf` where joineeid=".$record." and cf_1348='Rejected'";
   $rcheck_result = $adb->pquery($rcheck_query);
   $query= $adb->pquery("SELECT cf_1348 FROM `vtiger_joineecf` where joineeid=".$record);
   $appdata=$adb->query_result($query,0,'cf_1348');
      if($appdata == 'Accepted')
         {
            echo "you cannot Reject After Acceptation of an offer letter.";
         }
      elseif($adb->num_rows($rcheck_result)>=1)
         {
            echo "You have already Rejected The Offer Letter";
         }
      elseif($adb->num_rows($rcheck_result)<=0){
            $adb->pquery("UPDATE vtiger_joineecf SET cf_1348 ='Rejected' WHERE joineeid =".$record); 
            //write this query according to your table schema
            echo "You have Rejected The Offer Letter";
   }
}

   header('Location: ' . $_SERVER['HTTP_REFERER']);
   //header("Location:http://localhost/realestate/index.php");
?>