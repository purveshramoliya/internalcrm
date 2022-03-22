<?php

require_once 'include/utils/utils.php';
require_once 'include/utils/VtlibUtils.php';
require_once 'modules/Vtiger/helpers/ShortURL.php';
require_once 'vtlib/Vtiger/Mailer.php';

$content = 'Dear Customer,<br><br> 
						You recently requested a password reset for your VtigerCRM Open source Account.<br> 
						To create a new password, </a> 
						<br><br>
						This request was made and will expire in next 24 hours.<br><br> 
						Regards,<br> 
						VtigerCRM Open source Support Team.<br>';

		$subject = 'Vtiger CRM: Password Reset';

		$mail = new Vtiger_Mailer();
		$mail->IsHTML();
		$mail->Body = $content;
		$mail->Subject = $subject;
		$mail->AddAddress('purveshramoliya@gmail.com');

		$status = $mail->Send(true);
		if ($status === 1 || $status === true) {
			header('Location:  index.php?modules=Users&view=Login&mailStatus=success');
		} else {
			header('Location:  index.php?modules=Users&view=Login&error=statusError');
		}
// require_once 'vtlib/Vtiger/Mailer.php';
// global $HELPDESK_SUPPORT_EMAIL_ID;

// $subject='hello';
// $description='description';
// $mailer = new Vtiger_Mailer();
// $mailer->IsHTML(true);
// $mailer->ConfigSenderInfo($HELPDESK_SUPPORT_EMAIL_ID);
// $mailer->Subject =$subject;
// $mailer->Body = $description;
// $mailer->AddAddress("purveshramoliya@gmail.com");
// //$mailer->AddAttachment('attatchments/yourattachment.docx', decode_html('yourattachment.docx'));
// //$status = $mailer->Send(true);

//   if ( !$mailer->Send() ){
//   	echo "Ffff";
//   	exit();
//             return false;
//         }
// else
// {
// 	echo "yes";
// 	exit();
//         return true;
//     } 
// ?>