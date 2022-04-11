<?php

class JoineeInternOfferLetterHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$offer = $entityData->get('cf_1336');

			if ($moduleName == 'Joinee' && $offer == 'on') {
				require_once("vtlib/Vtiger/Mailer.php");
				global $log,$adb,$site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;

				$query=$adb->pquery("select custom_offer from vtiger_joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_joinee.joineeid=".$entityId);
                $offer_notification=$adb->query_result($query,0,'custom_offer');

			//Joinee details
				$todaydate = date('d-m-Y');
				$documentlink=$site_URL.'UploadDocuments.php?record_id='.$entityId;
				$empno = $entityData->get('joineeno');
				$firstname = $entityData->get('joinee_tks_firstname');
				$lastname = $entityData->get('joinee_tks_lastname');
				$position = $entityData->get('joinee_tks_positiontitle');
				$to_email = $entityData->get('joinee_tks_emailid');
				$type = $entityData->get('cf_1346');
				$ctcdigit = $entityData->get('cf_1330');
				$thsdigit = $entityData->get('cf_1332');
				$allths = (int)str_replace(',', '', $thsdigit);
				$thsvalue = number_format($allths, 2);
				$joiningdate = $entityData->get('cf_1334');

				if( $type == 'Intern' && $offer_notification == 0)
				{
					if(isset($allths))
					{
						$number = round($allths);
						$no = floor($number);
						$point = round($number - $no, 2) * 100;
						$hundred = null;
						$digits_1 = strlen($no);
						$i = 0;
						$str = array();
						$words = array('0' => '', '1' => 'one', '2' => 'two',
							'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
							'7' => 'seven', '8' => 'eight', '9' => 'nine',
							'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
							'13' => 'thirteen', '14' => 'fourteen',
							'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
							'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
							'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
							'60' => 'sixty', '70' => 'seventy',
							'80' => 'eighty', '90' => 'ninety');
						$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
						while ($i < $digits_1) {
							$divider = ($i == 2) ? 10 : 100;
							$number = floor($no % $divider);
							$no = floor($no / $divider);
							$i += ($divider == 10) ? 1 : 2;
							if ($number) {
								$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
								$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
								$str [] = ($number < 21) ? $words[$number] .
								" " . $digits[$counter] . $plural . " " . $hundred
								:
								$words[floor($number / 10) * 10]
								. " " . $words[$number % 10] . " "
								. $digits[$counter] . $plural . " " . $hundred;
							} else $str[] = null;
						}
						$str = array_reverse($str);
						$result = implode('', $str);
						$thsword=$result . "Rupees";
					}

					$body='<html>
					<head>
					<title></title>
					</head>
					<body>
					<div>
					<div>
					<img  class="logo" src="includes/mpdf/header.png" alt="header">
					</div>
					<div>
					<p style="text-align: right;"><b>Date:'.$todaydate.'</b></p>          
					<div class="a">
					<h2><u>OFFER LETTER OF INTERNSHIP</u></h2>
					</div>
					<table>
					<tr>
					<td>
					<div class="div-left">
					<p>Dear <b>'.$firstname.' '.$lastname.'</b>,</p>
					</div>
					</td>
					</tr>
					<tr>
					<td>
					<p>With reference to your application and subsequent interview with us,we are pleased to extend an offer of Internship to you in our organization at the position of “<b>'.$position.'</b>”, at a <b>stipend of INR '.$thsvalue.'/- Per Month (INR '.$thsword.').</b></p>
					</td>
					</tr>
					<tr>
					<td>
					<p>
					The first <b>3</b> months of your service will be on <b>Internship</b>, at the end of which, the company may confirm your services, subject to your performance meeting our requisite standards. You will be on <b>Internship</b> till the time you receive the confirmation letter. You have to serve <b>3</b> months’ notice period from the date of resignation <b>Internship confirmation letter</b> from the HR.
					</p>
					</td>
					</tr>
					<tr>
					<td>
					<p>
					On the date Internship Confirmation, you will receive your <b>Appointment letter</b>. You may need to submit the essential documents requested by the HR.Kindly sign the copy as a token of your acceptance of the offer and return us the same.
					</p>
					</td>
					</tr>
					<tr>
					<td>
					<p>
					We look forward to having a long-term association with you.
					</p>
					</td>
					</tr>
					<br/>
					</table>
					<div class="outerDiv">
					<div class="leftDiv">
					<p>Thanking You,</p>
					<p><b>For Biztechnosys Infotech Pvt.Ltd.</b></p>
					<img  class="sign" src="includes/mpdf/sign.png" alt="sign">
					<p><b>Sathiaraj T</b></p>
					<p><b>Manager - Human Resource & Admin</b></p>
					<p></p>
					</div>
					<div class="rightDiv">
					<p></p>
					<p style="padding-left:150px;"><b><u>Accepted the Offer</u></b></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p style="padding-left:150px;"><b>_____________________</b></p>
					<p style="padding-left:150px;"><b>Signature of the candidate</b></p>
					<p style="padding-left:150px;"><b>I will join on:</b></p>
					</div>
					<div style="clear: both;"></div>
					</div>
					</div>
					</div>
					</body>
					</html>';

					ob_start();
					$body = iconv("UTF-8","UTF-8//IGNORE",$body);
					include("includes/mpdf/mpdf/mpdf.php");

					$mpdf=new mPDF('c','A4','','',15,15,15,15,15,15);  
					$stylesheet = file_get_contents('includes/mpdf/mpdfstyletables.css');
					$mpdf->WriteHTML($stylesheet,1);
                   //write html to PDF
					$m=$mpdf->WriteHTML($body,2);
                   //output pdf
					$attachment=$mpdf->Output('OfferLetter-'.$empno.'.pdf','S');

					//trigger send email
					$emailData = Joinee::getOfferLetterEmailContents($entityData,'OfferLetter');
					$subject = $emailData['subject'];
					if(empty($subject)) {
						$subject = 'Offer Letter';
					}
					$subject = decode_html(getMergedDescription($subject, $entityId,'Joinee'));
					$contents = $emailData['body'];
					$contents= decode_html(getMergedDescription($contents, $entityId, 'Joinee'));
					if(empty($contents)) {
						$contents = 'Offer Letter';
					}

					$mail = new Vtiger_Mailer();
					$mail->IsHTML(true);
					$mail->ConfigSenderInfo($from,$fromName);
					$mail->Subject = $subject;
					$mail->Body = $contents;
					$mail->AddStringAttachment($attachment, 'OfferLetter.pdf', 'base64', 'application/pdf');
					//$mail->SendTo($to_email, 'Candidate', true, false, true);
					$mail->AddAddress($to_email);
					$status = $mail->Send(true);

					if(isset($status))
					{
						$adb->pquery("update vtiger_joinee set custom_offer=1 where joineeid=".$entityId);
					}
				}
			}
		}
	}
}
