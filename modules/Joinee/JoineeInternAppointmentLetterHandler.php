<?php

class JoineeInternAppointmentLetterHandler extends VTEventHandler
{
	function handleEvent($eventName, $entityData)
	{
		if ($eventName == 'vtiger.entity.aftersave') {
			$moduleName = $entityData->getModuleName();
			$entityId = $entityData->getId();
			$appointment = $entityData->get('cf_1342');
			$verifieddoc = $entityData->get('cf_1344');

			if ($moduleName == 'Joinee' && $appointment == 'on') {
				require_once("vtlib/Vtiger/Mailer.php");
				global $log,$adb,$site_URL,$HELPDESK_SUPPORT_EMAIL_ID,$HELPDESK_SUPPORT_NAME;
				$from=$HELPDESK_SUPPORT_EMAIL_ID;
				$fromName=$HELPDESK_SUPPORT_NAME;

				$query=$adb->pquery("select custom_appointment from vtiger_joinee inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_joinee.joineeid where vtiger_crmentity.deleted=0 and vtiger_joinee.joineeid=".$entityId);
                $appointment_notification=$adb->query_result($query,0,'custom_appointment');

			//Joinee details
				$todaydate = date('d-m-Y');
				$empno = $entityData->get('joineeno');
				$firstname = $entityData->get('joinee_tks_firstname');
				$lastname = $entityData->get('joinee_tks_lastname');
				$position = $entityData->get('joinee_tks_positiontitle');
				$to_email = $entityData->get('joinee_tks_emailid');
				$type = $entityData->get('cf_1346');
				$location = $entityData->get('cf_1362');
				$address =$entityData->get('joinee_tks_address');
				$joiningdate = $entityData->get('cf_1334');
				$managerid = $entityData->get('joinee_tks_reportto');
				$note = $entityData->get('cf_1356');
				$ctcdigit = $entityData->get('cf_1330');
				$thsdigit = $entityData->get('cf_1332');
				$allctc = (int)str_replace(',', '', $ctcdigit);
				$allths = (int)str_replace(',', '', $thsdigit);
				$ctcvalue = number_format($allctc);
				$thsvalue = number_format($allths);

				$mquery=$adb->pquery('SELECT `first_name`,`last_name` FROM `vtiger_users`where id='.$managerid);
				$mfname=$adb->query_result($mquery,0,'first_name');
				$mlname=$adb->query_result($mquery,0,'last_name');
				$managername=$mfname.' '.$mlname;


				if( $type == 'Intern' && $appointment_notification == 0)
				{
					if(isset($allths))
					{
						$number = round($allths);
						$no = floor($allths);
						$point = round($number - $no, 2) * 100;
						$hundred = null;
						$digits_1 = strlen($no);
						$i = 0;
						$str = array();
						$words = array('0' => '', '1' => 'One', '2' => 'Two',
							'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
							'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
							'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
							'13' => 'Thirteen', '14' => 'Fourteen',
							'15' => 'Fifteen', '16' => 'sixteen', '17' => 'Seventeen',
							'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
							'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
							'60' => 'Sixty', '70' => 'Seventy',
							'80' => 'Eighty', '90' => 'Ninety');
						$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
						while ($i < $digits_1) {
							$divider = ($i == 2) ? 10 : 100;
							$number = floor($no % $divider);
							$no = floor($no / $divider);
							$i += ($divider == 10) ? 1 : 2;
							if ($number) {
								$plural = (($counter = count($str)) && $number > 9) ? '' : null;
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
						$thsword=$result . "Rupees Only";
					}

					$body='
					<html>
					<head>
					<title></title>
					</head>
					<body>
					<hr>
					<div class="page">
					<div class="rdate">
					<b>Date: '.$todaydate.'</b>
					</div>
					<div class="a">
					<h2><u>INTERNSHIP - APPOINTMENT LETTER</u></h2>
					</div>
					<table>
					<tr><td>
					<div class="div-left">
					<p><b>To</b>,</p>
					<p><b>'.$firstname.' '.$lastname.'</b>,</p>
					<p><b>'.$address.'</b>,</p></br>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					</div>
					</td></tr>
					<tr><td>
					<div class="div-left">
					<p>Dear <b>'.$firstname.' '.$lastname.'</b>,</p></br>
					</div>
					</td></tr>
					<tr><td>
					<p>We are pleased to appoint you as ???<b>'.$position.'</b>??? with effect from <b>'.$joiningdate.'</b> in our organization.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>1. Stipend</b></p>
					<p>You???re eligible for a <b>Stipend of INR '.$thsvalue.'</b>/- per month for the first 6 months of Internship.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>2. Internship Period</b></p>
					<p>You will be on Internship for a period of <b>6-months</b> which may be extended by the company at its discretion. At the end of the internship period, the Company may confirm your services for a permanent appointment subject to your performance meeting the requisite standard set by the company. Post Internship Confirmation, you will be on probation for a period of 3 months.</p>
					<p>During your Internship, before leaving the organization by your own decision, need to serve <b>1 month (one month)</b> notice period after submitting the resignation letter.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>3. Location:</b></p>
					<p>You will be initially based in India at our <b>'.$location.' office</b>. You must however be prepared to work at such other headquarters or locations of company within India or abroad (USA, Europe, other Locations) depending upon the exigencies of work. Your employment is subject to transfer to any of the companys affiliates, subsidiaries or sister concerns.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>4. Reporting Line and Performance Assessment:</b></p>
					<p>Initially you will be reporting to the <b>'.$managername.'</b> who will assess your performance on a daily basis.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>5. Working Hours/Days:</b></p>
					<p>Currently we work from <b>Monday to Friday 10:00 am to 7.00 pm.</b> You are expected to work with us from Our Office at Bangalore. Your work time may be changed based on the requirements of projects executed and/or as decided by the company.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>6. Leave benefits:</b></p>
					<p>As per the current policy, you are entitled to a total of <b>1 leave per month Leaves</b> will be updated in monthly basis in your login portal. Unused leaves can be accumulated and used as per the company policy.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>7. Termination:</b></p>
					<p>Your employment may be terminated as under ??? </p>
					<p><b>I.</b> During the internship period, either party may terminate the internship appointment at any time upon Thirty days??? notice, with or without cause.</p>
					<p><b>II.</b> During internship period, you may terminate the internship appointment, upon 30days prior written notice.</p>
					<p><b>II.</b> Company at its sole discretion can roll-out termination of Internship with immediate effect in the case of any behavioral issues or performance issues.</p>
					<p>The above policy is subjected to revision from time to time at the sole discretion of the company.</p>
					</br>
					</td></tr>
					<tr><td>
					<p>We welcome you at our organization for a long-term association.</p>
					<p>&nbsp;</p>
					</td></tr>
					<tr><td>';
					if(!empty($note))
					{
					$body .='<p class="pera"><b> NOTE: </b> '.$note.'</p>';
				    }
					$body .='</td></tr>
					</table>
					<div class="outerDiv">
					<div class="leftDiv">
					<p><b>For Biztechnosys Infotech Pvt.Ltd.</b></p>
					<img class="sign" src="includes/mpdf/sign.png" alt="sign">
					<p><b>Mr. Sathiaraj T</b></p>
					<p><b>Manager - Human Resource & Admin</b></p><br/>
					</div>
					</div>
					<div class="leftDiv">
					<p>Signature: _________________</p>
					</div>
					<div class="rightDiv">
					<p style="padding-left:150px;">Date: _________________</p>
					</div>
					</body>
					</html>';

					ob_start();
					$body = iconv("UTF-8","UTF-8//IGNORE",$body);
					include("includes/mpdf/mpdf/mpdf.php");
				    $mpdf=new mPDF('c','A4','','',0,0,15,15,0,0,0,0); 
					$mpdf->setAutoTopMargin = 'stretch';
					$mpdf->SetHTMLHeader('<img src="includes/mpdf/header.png"/>');
					$mpdf->setAutoBottomMargin = 'stretch';
                    $mpdf->SetHTMLFooter('<img src="includes/mpdf/footer.png"/>');    
					$stylesheet = file_get_contents('includes/mpdf/mpdfstyletables.css');
					$mpdf->WriteHTML($stylesheet,1);
                        //write html to PDF
					$mpdf->WriteHTML($body,2);
                        //output pdf
					$attachment=$mpdf->Output('Appointment Letter-'.$empno.'.pdf','S');

					   //trigger send email
					$emailData = Joinee::getAppointmentLetterEmailContents($entityData,'AppointmentLetter');
					$subject = $emailData['subject'];
					if(empty($subject)) {
						$subject = 'Appointment Letter';
					}
					$subject = decode_html(getMergedDescription($subject, $entityId,'Joinee'));
					$contents = $emailData['body'];
					$contents= decode_html(getMergedDescription($contents, $entityId, 'Joinee'));
					if(empty($contents)) {
						$contents = 'Appointment Letter';
					}

					$mail = new Vtiger_Mailer();
					$mail->IsHTML(true);
					$mail->ConfigSenderInfo($from,$fromName);
					$mail->Subject = $subject;
					$mail->Body = $contents;
					$mail->AddStringAttachment($attachment, 'Appointment Letter.pdf', 'base64', 'application/pdf');
					$mail->AddAddress($to_email);
					$status = $mail->Send(true);

					if(isset($status))
					{
						$adb->pquery("update vtiger_joinee set custom_appointment=1 where joineeid=".$entityId);
					}
				}
			}
		}
	}
}
