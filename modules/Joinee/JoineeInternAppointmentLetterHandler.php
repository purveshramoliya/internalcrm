<?php

class JoineeInternAppointmentLetterHandler extends VTEventHandler
{

	function handleEvent($eventName, $entityData)
	{

		if ($eventName == 'vtiger.entity.aftersave') {

			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$status = $entityData->get('cf_1340');

			if ($moduleName == 'Joinee' &&  $status== 'Active') {
				global $log,$adb;
				require_once("vtlib/Vtiger/Mailer.php");
				global $site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;

			//Joinee details
				$todaydate = date('d-m-Y');
				$empno = $entityData->get('joinee_no');
				$firstname = $entityData->get('joinee_tks_firstname');
				$lastname = $entityData->get('joinee_tks_lastname');
				$position = $entityData->get('joinee_tks_positiontitle');
				$to_email = $entityData->get('joinee_tks_emailid');
				$type = $entityData->get('cf_1346');
				$address =$entityData->get('joinee_tks_address');
				$Joiningdate = $entityData->get('cf_1334');
				$managername = $entityData->get('assigned_user_id');
				$appointmentnotification = $entityData->get('cf_1342');
				$ctcdigit = $entityData->get('cf_1330');
				$thsdigit = $entityData->get('cf_1332');
				$allctc = (int)str_replace(',', '', $ctcdigit);
				$allths = (int)str_replace(',', '', $thsdigit);
				$ctcvalue = number_format($allctc, 2);
				$thsvalue = number_format($allths, 2);

				/*FULL BASIC= ROUND(MONTHLY_CTC*40/100,0)
				FULL HRA =ROUND(FULL BASIC*50/100,0)
				FULL CONVEYANCE= IF(MONTHLY_CTC>0,1800,0)
				FULL MEDICAL ALLOWANCE= IF(MONTHLY_CTC>0,1250,0)
				FULL SPECIAL ALLOWANCE =ROUND(MONTHLY_CTC)-(FULL BASIC+FULL HRA+FULL MEDICAL+FULL CONVEYANCE)*/


				//salary breakdown
				$basic= ROUND($allths*40/100);
				$hra= ROUND($basic*50/100);
				$conveyance=1800;
				$medicalallowance=1250;
				$totalspend=$basic+$hra+$conveyance+$medicalallowance;
				$specialallowance=ROUND($allths-$totalspend);
				$totalerning=$basic+$hra+$conveyance+$medicalallowance+$specialallowance;

				$netpay=$totalerning-200;

				if( $type == 'Intern')
				{

					if ($appointmentnotification != 'on')
					{
						if(isset($netpay))
						{
							$number = round($netpay);
							$no = floor($netpay);
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
							$netpayword=$result . "Rupees";
						}


						$body='
						<html>
						<head>
						<title></title>
						</head>
						<body>
						<div>
						<img  class="logo" src="includes/mpdf/header.png" alt="header">
						</div>
						<div>
						<div class="rightdate"><p>Date:'.$todaydate.'<p></div>
						<div class="a"><h2><u>INTERNSHIP - APPOINTMENT LETTER</u></h2></div>
						<table>
						<tr><td>
						<div class="div-left">
						<p>To,</p>
						<p>Candidate Name:'.$firstname.' '.$lastname.',</p>
						<p>Address:'.$address.',</p></br>
						</div>
						</td></tr>
						<tr><td>
						<div class="div-left">
						<p>Dear '.$firstname.' '.$lastname.',</p></br>
						</div>
						</td></tr>
						<tr><td>
						<p>We are pleased to appoint you as “'.$position.'” with effect from '.$joiningdate.' in our organization.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>1. Stipend</b></p>
						<p>You’re eligible for a Stipend of INR '.$thsdigit.' /- per month for the first 3 months of Internship.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>2. Internship Period</b></p>
						<p>You will be on Internship for a period of <b>3-months</b> which may be extended by the company at its discretion. At the end of the internship period, the Company may confirm your services for a permanent appointment subject to your performance meeting the requisite standard set by the company. Post Internship Confirmation, you will be on probation for a period of 3 months.</p>
						<p>During your Internship, before leaving the organization by your own decision, need to serve <b>1 month (one month)</b> notice period after submitting the resignation letter.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>3. Location:</b></p>
						<p>You will be initially based in India at our Bangalore office. You must however be prepared to work at such other headquarters or locations of company within India or abroad (USA, Europe, other Locations) depending upon the exigencies of work. Your employment is subject to transfer to any of the companys affiliates, subsidiaries or sister concerns.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>4. Reporting Line and Performance Assessment:</b></p>
						<p>Initially you will be reporting to the '.$managername.' who will assess your performance on a daily basis.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>5. Working Hours/Days:</b></p>
						<p>Currently we work from Monday to Friday 10:00 am to 7.00 pm. You are expected to work with us from Our Office at Bangalore. Your work time may be changed based on the requirements of projects executed and/or as decided by the company.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>6. Leave benefits:</b></p>
						<p>As per the current policy, you are entitled to a total of <b>1 leave per month Leaves</b> will be updated in monthly basis in your login portal. Unused leaves can be accumulated and used as per the company policy.</p>
						</br>
						</td></tr>
						<tr><td>
						<p><b>7. Termination:</b></p>
						<p>Your employment may be terminated as under – </p>
						<p><b>I.</b> During the internship period, either party may terminate the internship appointment at any time upon Thirty days’ notice, with or without cause.</p>
						<p><b>II.</b> During internship period, you may terminate the internship appointment, upon 30days prior written notice.</p>
						<p><b>II.</b> Company at its sole discretion can roll-out termination of Internship with immediate effect in the case of any behavioral issues or performance issues.</p>
						<p>The above policy is subjected to revision from time to time at the sole discretion of the company.</p>
						</br>
						</td></tr>
						<tr><td>
						
						<tr><td>
						<p>We welcome you at our organization for a long-term association.</p>
						</td></tr>
						</br>
						</table>
						<div class="outerDiv">
						<div class="leftDiv">
						<p><b>For Biztechnosys Infotech Pvt.Ltd.</b></p>
						<img  class="sign" src="includes/mpdf/sign.png" alt="sign">
						<p><b>Mr. Sathiaraj T</b></p>
						<p><b>Manager - Human Resource Manger& Admin</b></p><br/><br/>
						<p>Signature:_________________</p>
						</div>
						<div class="rightDiv">
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p><br/><br/>
						<p style="padding-left:150px;">Date:_________________</p>
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
						$attachment=$mpdf->Output('Offerlatter-'.$empno.'.pdf','S');


					//trigger send email
		//if ($sendEmail && $entityData->get('emailoptout') == 0) {
						$emailData = Joinee::getAppointmentLetterEmailContents($entityData,'AppointmentLetter');
						$subject = $emailData['subject'];
						if(empty($subject)) {
							$subject = 'Offer Letter';
						}
						$subject = decode_html(getMergedDescription($subject, $entityId,'Joinee'));
						$contents = $emailData['body'];
						$contents= decode_html(getMergedDescription($contents, $entityId, 'Joinee'));
						if(empty($contents)) {
							$contents = 'AppointmentLetter';
						}


						$mail = new Vtiger_Mailer();
						$mail->IsHTML(true);
						$fromEmail = Emails_Record_Model::getFromEmailAddress();
				//$fromEmail='lokesh.s@biztechnosys.com';
						$fromName='HR Manager';
						$mail->ConfigSenderInfo($fromEmail,$fromName);
						$mail->Subject = $subject;
						$mail->Body = $contents;
						$mail->AddStringAttachment($attachment, 'Appointment Latter', 'base64', 'application/pdf');
						$mail->SendTo($to_email, 'Candidate', true, false, true);

						if ($appointmentnotification == 0) {
							$adb->pquery('update vtiger_joineecf set cf_1342=1 where joineeid='.$entityId);
						}
					}
				}
			}
		}
	}
}
