<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H20';

$current_user_parent_role_seq='H1::H2::H15::H20';

$current_user_profiles=array(19,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>1,'19'=>0,'20'=>0,'21'=>1,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>1,'27'=>0,'31'=>0,'34'=>0,'35'=>0,'36'=>0,'38'=>1,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0,'45'=>0,'46'=>0,'47'=>0,'48'=>0,'50'=>0,'51'=>0,'52'=>0,'53'=>0,'54'=>0,'55'=>0,'56'=>0,'57'=>0,'28'=>0,'3'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),4=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>1,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>1,4=>0,7=>0,6=>0,),9=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),13=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),15=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),16=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),18=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),19=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>1,6=>1,10=>1,),20=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>1,6=>1,),21=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),22=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>1,6=>1,),23=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),34=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,14=>0,15=>0,),35=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),36=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>1,6=>1,10=>1,),38=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),43=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>0,6=>0,10=>0,),44=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),52=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),53=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),54=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),55=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),57=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),);

$current_user_groups=array();

$subordinate_roles=array();

$parent_roles=array('H1','H2','H15',);

$subordinate_roles_users=array();

$user_info=array('user_name'=>'purvesdh','is_admin'=>'off','user_password'=>'$2y$10$65ZNSHh0rTC1mwUAA00Gm.AZfqGuUYfGfvQGsbrbBTqpx0xXCDc3G','confirm_password'=>'$2y$10$h0ETO36Q02k/EnwYyl/g6OQnfOUd954CbYHlUavy2B.U94psqQ/96','first_name'=>'purvesdh','last_name'=>'purvesdh','roleid'=>'H20','email1'=>'purveshramoliya5159@gmail.com','status'=>'Inactive','activity_view'=>'Today','lead_view'=>'','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'Asia','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'OA78MGuK150kEYwR','time_zone'=>'UTC','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'5 Minutes','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'','userlabel'=>'','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'103');
?>