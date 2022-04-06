<?php

class JoineeEmployeeAppointmentLetterHandler extends VTEventHandler
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
				$empno = $entityData->get('joinee_no');
				$firstname = $entityData->get('joinee_tks_firstname');
				$lastname = $entityData->get('joinee_tks_lastname');
				$position = $entityData->get('joinee_tks_positiontitle');
				$to_email = $entityData->get('joinee_tks_emailid');
				$type = $entityData->get('cf_1346');
				$address =$entityData->get('joinee_tks_address');
				$Joiningdate = $entityData->get('cf_1334');
				$managername = $entityData->get('assigned_user_id');
				$ctcdigit = $entityData->get('cf_1330');
				$thsdigit = $entityData->get('cf_1332');
				$allctc = (int)str_replace(',', '', $ctcdigit);
				$allths = (int)str_replace(',', '', $thsdigit);
				$ctcvalue = number_format($allctc, 2);
				$thsvalue = number_format($allths, 2);

				//salary breakdown
				$basic= ROUND($allths*40/100);
				$hra= ROUND($basic*50/100);
				$conveyance=1800;
				$medicalallowance=1250;
				$totalspend=$basic+$hra+$conveyance+$medicalallowance;
				$specialallowance=ROUND($allths-$totalspend);
				$totalerning=$basic+$hra+$conveyance+$medicalallowance+$specialallowance;

				$netpay=$totalerning-200;

				if( $type == 'Employee' && $appointment_notification == 0)
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
					<div class="a"><h2><u>APPOINTMENT LETTER</u></h2></div>
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
					<p><b>1. Salary</b></p>
					<p>Your eligible gross salary on a cost to the company basis is as detailed in Annexure I.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>2. Probation:</b></p>
					<p>You will be on probation for a period of 3 months (the probation period), which may be extended by the company at its discretion. At the end of the probation period, the Company may confirm your services for a permanent appointment subject to your performance meeting the requisite standard set by the company. You will be on probation till the time the Company issues you a confirmation letter.</p>
					<p>Before leaving the organization by your own decision, need to serve three-month notice period after submitting the resignation letter.</p>
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
					<p>As per the current policy, you are entitled to a total of Twenty-Four Leaves per annum. Leaves will be updated on a monthly basis in your login portal. Unused leaves can be accumulated and used as per the company policy.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>7. Termination:</b></p>
					<p>Your employment may be terminated as under – </p>
					<p><b>I.</b> During the probation period, either party may terminate the employment agreement at any time upon Ninety Days’ notice, with or without cause.</p>
					<p><b>II.</b> During the probation period, you may terminate the employment agreement, upon 90 days prior written notice.</p>
					<p><b>III.</b> Upon your confirmation, you shall be free to terminate the employment agreement at will and at any time, with or without cause, upon three months prior written notice from you & company can terminate the employment agreement at will and at any time, with or without cause, upon three months prior written notice desirous of terminating this employment agreement or payment of equivalent salary in lieu thereof.</p>
					<p><b>IV.</b> Company at its sole discretion can roll-out termination of employment with immediate effect in the case of any behavioral issues or performance issues.</p>
					<p>The above policy is subjected to revision from time to time at the sole discretion of the company.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>8. Taxation:</b></p>
					<p>Any amount payable by the company towards compensation, allowances, and benefits and / or any other payment would be liable to Income tax, as applicable, in your hands as per the provision of the Income-tax Act, 1961 and / or any other taxes under applicable law and the rules framed there under. Income tax as applicable will be withheld from your salary and paid to the Government of India every month. All requirements under Indian tax laws, including tax compliance and filing of tax returns, assessment etc. of your personal income, PAN No. etc. shall have to be fulfilled by you.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>9A. </b>The terms and conditions of this employment are contained in Annexure II. You are requested to sign on its duplicate copy signifying your acceptance.</p>
					<p><b>9B. </b>You shall execute the Employee Non-Disclosure Agreement (NDA) enclosed in schedule Annexure III hereof, and shall be bound by all the terms and conditions contained therein.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>10. Applicable Law:</b></p>
					<p>The applicable Indian laws shall govern this contract. The court of jurisdiction will be at Bangalore. Please return to us the duplicate copy of this letter duly signed by you signifying your acceptance of the terms and conditions stated herein.</p>
					</br>
					</td></tr>
					<tr><td>
					<p>We welcome you at our organization for a long-term association.</p>
					</td></tr>
					</br>
					</table>
					<div class="leftDiv">
					<p><b>For Biztechnosys Infotech Pvt.Ltd.</b></p>
					<img  class="sign" src="includes/mpdf/sign.png" alt="sign">
					<p><b>Mr. Sathiaraj T</b></p>
					<p><b>Manager - Human Resource Manger& Admin</b></p><br/><br/><br/><br/><br/><br/><br/>
					</div>
					<div style="clear: both;"></div>
					</div>
					</div>
					<div>
					<div class="a"><h2><u>Annexure I</u></h2></div></br>
					<div class="a"><h2>Salary Breakup</h2></div>
					<div class="div-left">
					<p>To,</p>
					<p>Candidate Name:'.$firstname.' '.$lastname.',</p>
					<p>Designation:'.$position.',</p>
					</div>

					<div style="Width:auto">
					<div class="leftDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;">
					<tr><td><b>Earnings</b></td><td>&nbsp;</td><td><b>Actual</b></td></tr>
					</table>
					</div>
					<div class="rightDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;border-left:none;">
					<tr><td><b>Deducation</b></td><td><b>Actual</b></td></tr>
					</table>
					</div>
					</div>

					<div style="Width:auto">
					<div class="leftDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;">
					<tr><td>BASIC</td><td>&nbsp;</td><td>'.$basic.'</td></tr>
					<tr><td>HRA</td><td>&nbsp;</td><td>'.$hra.'</td></tr>
					<tr><td>CONVEYANCE</td><td>&nbsp;</td><td>'.$conveyance.'</td></tr>
					<tr><td>MEDICAL ALLOWANCE</td><td>&nbsp;</td><td>'.$medicalallowance.'</td></tr>
					<tr><td>SPECIAL ALLOWANCE</td><td>&nbsp;</td><td>'.$specialallowance.'</td></tr>
					</table>
					</div>
					<div class="rightDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;border-left:none;">
					<tr><td>PROF TAX</td><td>&nbsp;</td><td>200</td></tr>
					<tr><td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
					</table>
					</div>
					</div>
					<div style="Width:auto">
					<div class="leftDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;">
					<tr class="bordertop"><td>Total Earnings: INR.</td><td>00000</td><td>'.$totalerning.'</td></tr>
					</table>
					</div>
					<div class="rightDiv">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;border-bottom: none;border-left:none;">
					<tr class="bordertop"><td>Total Deductions: INR.</td><td>200</td></tr>
					</table>
					</div>
					</div>
					<div style="Width:auto">
					<table style="border-collapse:collapse;border-spacing:0;border: 1px solid;width: 100%;">
					<tr class="bordertop"><td>Net Pay for the month (Total Earnings - Total Deductions):</td><td>'.$netpay.'</td></tr>
					<tr><td>IN words -</td><td>'.$netpayword.'</td></tr>
					</table>
					</div>

					</br>
					<div class="outerDiv">
					<div class="leftDiv">
					<p><b>Understood and Accepted</b></p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p><b>_________________</b></p>
					<p><b>Employee’s Signature</b></p>
					</div>
					<div class="rightDiv">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p style="padding-left:150px;">Date:</p>
					</div>
					</div>
					</div>
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
					<div class="a"><h2><u>Annexure II</u></h2></div></br>
					<div class="a"><u><b>Terms & conditions of the Employment</u></b></div>
					<div class="div-left">
					<p>date : </p>
					<p>Candidate Name:'.$firstname.' '.$lastname.',</p>
					<p>Designation:'.$position.',</p>
					<table>
					<tr><td></br>
					<p><b>1. Confidentiality / IPR / Employee Non-Disclosure Agreement:</b></p>
					<p>You shall not at any time during your employment or afterwards disclose to any person any confidential information, trade secrets, processes, technical knowledge or information or any other intellectual property to any person, firm, corporation or information or any other entity as to the nature of business dealings or affairs of the Company or any of its customers or clients or as to any other matters of confidential nature which may come up to your knowledge by reason of your employment with the Company.
					</p>
					<p>You acknowledge and agree that all intellectual property rights, including but not limited to all copyrights and design rights and other intellectual property rights, in any manner made or discovered by you in the course of your employment by the Company (whether or not during office hours) in connection with or in any way affecting or relating to the business from time to time of the Company or capable of being used therein or otherwise relating to your duties shall, forthwith be disclosed to the Company and shall, (unless specifically agreed in writing by the Managing Director of the Company to the contrary), belong to the Company and you shall take all steps as are necessary to vest the rights of the Company.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>2. Duties and responsibilities:</b></p>
					<p>You will do all acts and things required to be done, to maintain and carry on the business of the Company according to the policy and regulations laid by the company and the directions/instructions given to you by the company from time to time.</p>
					<p>You shall be ready to travel to any location of customers or of this company as required by the company depending upon the exigencies of work. Our offices and customer locations are in many countries across the globe.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>3. Upon breach or Misconduct:</b></p>
					<p>Your employment would be terminated by the Company, for breach of this agreement or misconduct without notice, in the event of any of the following</p>
					<p>-    Of your being found by the Company guilty of serious misconduct, like defalcation, misappropriation, dereliction of duty in discharging your duties and functions, etc.</p>
					<p>-    Of any breach of this employment agreement, the NDA (Annexure III) or the Company Policy</p>
					<p>-    Of malingering or persistent unpunctuality, neglect of duty, breach of any rules made by the Company</p>
					<p>-    Of your absence without prior sanctioned leave for a period of 7 calendar days or more.</p>
					<p>-    Of your becoming the subject of a bankruptcy order</p>
					<p>-    Of your being convicted of any criminal offense</p>
					<p>-    Of your mental or physical incapacity to discharge your functions</p>
					<p>-    Of your committing any material act of dishonesty detrimental to the interests of the Company, or of your misusing the office property and infrastructure for personal use, or deliberately harming them or stealing them.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>4. Conditions of employment:</b></p>
					<p>You will not be allowed to have or keep in your private possession, in any form or whatsoever, documents, correspondence or copies thereof that came into your possession because of your duties for the Company, except where, to the extent that, and for as long as such is required in the performance of your duties for the Company. In any case, you are obliged to immediately hand over any such documents, correspondence or copies thereof upon termination or suspension of the employment for whatever reason.</p>
					<p>In performing your duties, you shall not accept or demand any commission, consideration or allowance in whatever form, or gifts from customers, suppliers or other third parties during the term of the employment, either directly or indirectly.</p>
					<p>You shall not have the right to make any contracts or any commitments for or on behalf of the Company without a written consent of the Company. You shall not at any time during your employment with the Company under any circumstances work for any other firm or Company or persons, either whole-time or part-time and not carry on any business, or in any manner be associated with any firm or persons as advisor / consultant / Director / Partner, whether paid or not paid for your services without the prior written permission from the Company. You will be required to effectively carry out all duties, responsibilities and obligations assigned to you by your manager and / or others authorized by the Company to assign such duties and responsibilities. Your performance will be subject to a periodical appraisal by your manager. You will be governed by the service rules / regulations / standing orders and other laws that may be applicable from time to time.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>5. Penalty:</b></p>
					<p>Upon Violation of any of the requirements laid down in NDA (Annexure III) or paragraph 1 to 4 above, the Company shall have the right to terminate your employment without any notice and initiate legal proceedings against you to recover the damages from you with immediate effect, without you being able to claim any other benefit from the Company. In addition, you are very much responsible for the Materials or gadgets like Laptop, Mobile etc. provided by the company to you.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>6. Restrictions after cessation of employment with us:</b></p>
					<p>For a period of 24 months after the termination of this employment, you shall not directly or indirectly, either on your behalf or on behalf of any other person, any firm or company in relation to the business activities of this company in which you have been engaged or involved directly or indirectly:- </p>
					<p>-   Solicit, approach or offer goods or services or to entice away from the Company, person, firm or company who was a client, customer or trading partner of the Company and in each case with whom you have been actively engaged or involved by virtue of your employment at any time during the period of 24 months prior to the termination date. </p>
					<p>-   Deal with or accept custom from any person, firm or company who was a client or customer of the Company and in each case with whom you have been actively engaged or involved by virtue of your employment at any time during the period of 24 months prior to the termination date. </p>
					<p>-   Either on your behalf or on behalf of any person, firm or company in relation to the activities of the Company in which you have been employed or involved directly or indirectly approach, solicit, endeavor to entice away, employ, procure the employment of any person who was or is an employee or who is or was engaged as a consultant or whose services were provided by way of consultancy to the Company, and with whom you had dealings within the period of 24 months prior to the termination date, whether or not such person would commit any breach of his contract of employment or engagement by reason of so leaving the service of the Company or otherwise. </p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>7. Reservation of Rights:</b></p>
					<p>No forbearance, indulgence or relaxation or inaction by any Party at any time to require performance of any of the provision of these terms shall, in any way, affect, diminish or prejudice the right of such Party to require performance of that provision and any waiver or acquiescence by any party of any breach of any of these provisions shall not be construed as a waiver of any right under or arising out of these terms, or acquiescence to or recognition of rights and / or position other than as expressly stipulated in these terms.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>8. Cumulative Rights:</b></p>
					<p>All remedies of either Party under these terms, whether provided herein or conferred by statute, civil law, custom, trade, or usage, are cumulative and not alternative and may be enforced successively or concurrently.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>9. Other restrictions:</b></p>
					<p>You shall not during the continuance of this appointment or afterwards use or permit to be used any notes or memoranda that you shall maintain during the course of your employment otherwise than for the benefit of the Company, it being the intention of the parties hereto that all such notes or memorandum made by you shall be property of the Company and left at the registered office of the Company upon termination of your appointment.</p>
					<p>You shall not have the right to make any contracts or any commitments for or on behalf of the Company without a written consent of the Company.
					</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>10. Partial Invalidity:</b></p>
					<p>If any provision of these terms, or the application thereof to any person or circumstance is or is held to be invalid or unenforceable to any extent, the remainder of these terms and the application of such provision to persons or circumstance other than those as to which it is held invalid or unenforceable shall not be affected thereby, and each provision of these terms shall be valid and enforceable to the fullest extent permitted by law. Any invalid or unenforceable provision of these terms shall be replaced with a provision, which is valid and enforceable, and most nearly reflecting the original intent of the unenforceable provision.</p>
					</br>
					</td></tr>
					<tr><td>
					<p><b>11. Applicable Law:</b></p>
					<p>The applicable Indian laws shall govern this contract. The court of jurisdiction will be at Bangalore. Please sign on every page of this Terms and Conditions signifying your acceptance.</p>
					</td></tr>
					</br>
					</table>
					<div class="outerDiv">
					<div class="leftDiv">
					<p><b>Signature:_________________</b></p>
					<p><b>Name of the Candidate:</b>'.$firstname.''.$lastname.'</p>
					<p><b>Address:'.$address.'</p>
					</div>
					<div class="rightDiv">
					<p style="padding-left:150px;">Date:</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
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
					$mail->AddStringAttachment($attachment, 'Appointment Letter', 'base64', 'application/pdf');
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
