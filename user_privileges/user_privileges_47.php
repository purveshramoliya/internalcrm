<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H23';

$current_user_parent_role_seq='H1::H2::H23';

$current_user_profiles=array(21,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>1,'19'=>0,'20'=>0,'22'=>0,'23'=>0,'25'=>0,'26'=>0,'31'=>0,'34'=>0,'35'=>0,'36'=>0,'38'=>0,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0,'45'=>0,'46'=>0,'48'=>0,'50'=>0,'51'=>0,'52'=>0,'53'=>0,'54'=>0,'55'=>0,'56'=>0,'57'=>0,'28'=>0,'3'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),4=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>0,4=>0,7=>0,6=>0,),9=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),13=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),15=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),16=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),19=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),20=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),22=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),23=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),34=>array(0=>0,1=>0,2=>0,4=>0,7=>0,14=>0,15=>0,),35=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),36=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),38=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),43=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),44=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,10=>0,),52=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),53=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),54=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),55=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),57=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),);

$current_user_groups=array(58,);

$subordinate_roles=array('H24','H40','H25','H26','H30','H38','H42','H45',);

$parent_roles=array('H1','H2',);

$subordinate_roles_users=array('H24'=>array(31,63,71,72,82,),'H40'=>array(40,92,93,),'H25'=>array(33,),'H26'=>array(37,),'H30'=>array(36,),'H38'=>array(10,23,25,27,28,29,32,35,42,43,44,49,50,56,57,64,65,66,73,74,75,76,77,78,79,80,81,83,87,88,89,90,91,97,),'H42'=>array(67,85,),'H45'=>array(98,),);

$user_info=array('user_name'=>'Sathish','is_admin'=>'off','user_password'=>'$2y$10$kGlWD//FweTp5SyFgYSTMuAqbAvWOh7QoylBBb4lMT0MWvwXNm.Wi','confirm_password'=>'$2y$10$kGlWD//FweTp5SyFgYSTMuAqbAvWOh7QoylBBb4lMT0MWvwXNm.Wi','first_name'=>'Sathish','last_name'=>'S','roleid'=>'H23','email1'=>'sathish.s@biztechnosys.com','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'Dr','phone_work'=>'','department'=>'Operations','phone_mobile'=>'8296049481','reports_to_id'=>'1','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'NO:30, Nalina Nilaya, Muniyappa Layout, 4th Cross, K.R.Puram','address_city'=>'Bangalore','address_state'=>'','address_postalcode'=>'560016','address_country'=>'India','accesskey'=>'RS40PQq8xL8d3mRi','time_zone'=>'UTC','currency_id'=>'1','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','userlabel'=>'Sathish S','currency_name'=>'USA, Dollars','currency_code'=>'USD','currency_symbol'=>'&#36;','conv_rate'=>'1.00000','record_id'=>'','record_module'=>'','id'=>'47');
?>