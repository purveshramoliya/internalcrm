<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H15';

$current_user_parent_role_seq='H1::H2::H15';

$current_user_profiles=array(14,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>0,'27'=>0,'31'=>0,'34'=>0,'35'=>0,'36'=>0,'38'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0,'45'=>0,'46'=>0,'47'=>0,'48'=>0,'50'=>0,'51'=>0,'52'=>0,'53'=>0,'54'=>0,'55'=>1,'56'=>0,'57'=>0,'28'=>0,'3'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),4=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>0,4=>0,7=>0,6=>0,),9=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),13=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),15=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),16=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),18=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),19=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),20=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),21=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),22=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),23=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),34=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,14=>0,15=>0,),35=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),36=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),38=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),43=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),44=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),52=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),53=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),54=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),55=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),57=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),);

$current_user_groups=array();

$subordinate_roles=array('H19','H39','H18','H20','H32',);

$parent_roles=array('H1','H2',);

$subordinate_roles_users=array('H19'=>array(),'H39'=>array(41,),'H18'=>array(48,99,),'H20'=>array(51,),'H32'=>array(69,),);

$user_info=array('user_name'=>'hitesh','is_admin'=>'off','user_password'=>'$2y$10$GbhK7Us1KZnVVYtsrzRauOlSGttKmS6ppoGzm6BFz8T8ACOiRtyuG','confirm_password'=>'$2y$10$3lLqkblTPqMJICo7xrua3OXummx.PxdauKuYT.4u0Nrf4K37bdpIq','first_name'=>'hitesh','last_name'=>'hitesh','roleid'=>'H15','email1'=>'purveshramoliya@gmail.com','status'=>'Inactive','activity_view'=>'Today','lead_view'=>'','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'Asia','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'zq0u8UlwUaDnJbsN','time_zone'=>'UTC','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'5 Minutes','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'','userlabel'=>'','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'107');
?>