<?php
 require_once 'vtlib/Vtiger/Mailer.php';
 global $HELPDESK_SUPPORT_EMAIL_ID;

 $subject='hello';
 $description='description';
 $mailer = new Vtiger_Mailer();
 $mailer->IsHTML(true);
 $mailer->ConfigSenderInfo($HELPDESK_SUPPORT_EMAIL_ID);
 $mailer->Subject =$subject;
 $mailer->Body = $description;
 $mailer->AddAddress("purveshramoliya@gmail.com");
 //$mailer->AddAttachment('attatchments/yourattachment.docx', decode_html('yourattachment.docx'));
  $status = $mailer->Send(true);

   if ( !$mailer->Send() ){
            return false;
        }
 else{
        return true;
    } 
 ?>