<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H21';

$current_user_parent_role_seq='H1::H2::H21';

$current_user_profiles=array(20,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>0,'27'=>0,'31'=>0,'34'=>0,'35'=>0,'36'=>0,'38'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0,'45'=>0,'46'=>0,'47'=>0,'48'=>0,'50'=>0,'51'=>0,'52'=>0,'53'=>0,'54'=>0,'55'=>0,'56'=>0,'57'=>0,'28'=>0,'3'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>0,),4=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>0,4=>0,7=>0,6=>1,),9=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),13=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>0,),15=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),16=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),18=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>0,),19=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>1,),20=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),21=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),22=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),23=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),34=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,14=>0,15=>0,),35=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),36=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),38=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>1,),42=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),43=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>1,6=>1,10=>1,),44=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),52=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),53=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),54=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),55=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),57=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),);

$current_user_groups=array(58,62,);

$subordinate_roles=array('H22','H34',);

$parent_roles=array('H1','H2',);

$subordinate_roles_users=array('H22'=>array(46,),'H34'=>array(26,),);

$user_info=array('user_name'=>'Manasa','is_admin'=>'off','user_password'=>'$2y$10$e.XYTFy78NRHDYyKBujiYODtwb6dMiasmSyIm4NAvaa7GSUMScPDW','confirm_password'=>'$2y$10$e.XYTFy78NRHDYyKBujiYODtwb6dMiasmSyIm4NAvaa7GSUMScPDW','first_name'=>'Manasa','last_name'=>'Devi','roleid'=>'H21','email1'=>'manasa.rsv@biztechnosys.com','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'dd-mm-yyyy','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'wrWOIBDRheTNdc6j','time_zone'=>'Asia/Kolkata','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','userlabel'=>'Manasa Devi','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'34');
?>