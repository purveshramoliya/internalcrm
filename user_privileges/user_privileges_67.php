<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H42';

$current_user_parent_role_seq='H1::H2::H23::H25::H30::H38::H42';

$current_user_profiles=array(40,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>1,'4'=>1,'6'=>1,'7'=>1,'8'=>1,'9'=>1,'10'=>1,'13'=>1,'14'=>1,'15'=>1,'16'=>1,'18'=>1,'19'=>1,'20'=>1,'21'=>1,'22'=>1,'23'=>1,'25'=>1,'26'=>1,'31'=>1,'34'=>1,'35'=>1,'36'=>1,'38'=>1,'40'=>1,'42'=>0,'43'=>1,'44'=>0,'45'=>0,'46'=>1,'48'=>1,'50'=>1,'51'=>1,'52'=>1,'53'=>1,'54'=>1,'55'=>1,'56'=>0,'57'=>0,'28'=>1,'3'=>0,);

$profileActionPermission=array(2=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),4=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>1,1=>1,2=>1,4=>1,7=>1,6=>0,),9=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),13=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),16=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),18=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),19=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),20=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),21=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),22=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),23=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>1,13=>1,),34=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,14=>0,15=>0,),35=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),36=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),38=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),43=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),44=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),52=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),53=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>1,),54=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>1,),55=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>1,),57=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),);

$current_user_groups=array(86,);

$subordinate_roles=array('H45',);

$parent_roles=array('H1','H2','H23','H25','H30','H38',);

$subordinate_roles_users=array('H45'=>array(98,),);

$user_info=array('user_name'=>'Pavitra','is_admin'=>'off','user_password'=>'$2y$10$1ytq0.SdENcywnewn4SQPeO4F3rdPGz1XfUO5FQ6nyNKlAFpDsWya','confirm_password'=>'$2y$10$1ytq0.SdENcywnewn4SQPeO4F3rdPGz1XfUO5FQ6nyNKlAFpDsWya','first_name'=>'Pavitra','last_name'=>'Shetty','roleid'=>'H42','email1'=>'Pavitra@gmail.com','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'VxBAS3HQN9kbMaTO','time_zone'=>'UTC','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','userlabel'=>'Pavitra Shetty','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'67');
?>