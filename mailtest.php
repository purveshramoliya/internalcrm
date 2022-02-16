<?php

				require_once 'config.inc.php';
				include_once 'modules/Emails/Models/Mailer.php';
				require_once("modules/Emails/mail.php");

				global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;
				$email='purveshr@biztechnosys.com';
				
			
			    $subject = "Joining Request Approved by BizTechnoSys"; 
 
				$htmlContent = ' 
				    <html> 
				    <head> 
				        <title>('.$username.') User login has been Approved</title> 
				    </head> 
				    <body> 
				    <p>Hi There!</p>
				        <p>Thank you for Joining BizTechnoSys,<br>
				         Your Joining request has been approved and now you can login with the username and password by clicking on the link provided.</p>
				         <p>Username : '.$username.' </p>
				         <p>Password : '.$password.' </p>
				         <a href="'.$site_URL.'">Login</a><br><br>
				    Thanks<br>
				     </body> 
				    </html>'; 
 
				send_mail('Joinee',$email, $fromName, $from, $subject, $htmlContent,'','','','','',true);
	?>