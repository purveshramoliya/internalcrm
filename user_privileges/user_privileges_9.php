<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H12';

$current_user_parent_role_seq='H1::H2::H16::H11::H12';

$current_user_profiles=array(11,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'13'=>0,'14'=>0,'15'=>0,'16'=>0,'18'=>0,'19'=>0,'20'=>0,'21'=>0,'22'=>0,'23'=>0,'24'=>0,'25'=>0,'26'=>1,'27'=>0,'31'=>0,'34'=>0,'35'=>0,'36'=>0,'38'=>1,'40'=>0,'41'=>0,'42'=>0,'43'=>0,'44'=>0,'45'=>0,'46'=>0,'47'=>0,'48'=>0,'50'=>0,'51'=>0,'28'=>0,'3'=>0,);

$profileActionPermission=array(2=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),4=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>0,1=>0,2=>1,4=>0,7=>0,6=>0,),9=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),13=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,8=>0,10=>0,),14=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),15=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),16=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),18=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),19=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>1,6=>1,10=>1,),20=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),21=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,),22=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),23=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>0,13=>0,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),34=>array(0=>0,1=>0,2=>0,4=>0,7=>0,5=>0,6=>0,8=>0,14=>1,15=>1,),35=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),36=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),38=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>1,4=>0,7=>0,),43=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>0,6=>0,10=>0,),44=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),45=>array(0=>0,1=>0,2=>1,4=>0,7=>0,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),);

$current_user_groups=array();

$subordinate_roles=array();

$parent_roles=array('H1','H2','H16','H11',);

$subordinate_roles_users=array();

$user_info=array('user_name'=>'Manikandan','is_admin'=>'off','user_password'=>'$2y$10$xIKEAhXqS7ZnX1peL.3oMe85Yd.isDkg84Yt0FtyHPdIZjSTRfBP2','confirm_password'=>'$2y$10$3ajm3ztXMAwT.UMUm6avBep29C4/mUIMQwF2puUTJ6Ss81hKlfAK6','first_name'=>'Manikandan','last_name'=>'G','roleid'=>'H12','email1'=>'mani.g@einfratech.com','status'=>'Inactive','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'Mr','phone_work'=>'','department'=>'Sales','phone_mobile'=>'8056242946','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'&lt;div lang=&quot;en-us&quot; xml:lang=&quot;en-us&quot;&gt;
&lt;div class=&quot;m_7820037619892760044WordSection1&quot;&gt;
&lt;p class=&quot;MsoNormal&quot;&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;&nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;Thanks &amp;&nbsp; Regard,&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#1f4e79;&quot;&gt;&lt;img alt=&quot;Description: Description: Description: C:UsersacerDesktopIMG_1841.png.JPG&quot; class=&quot;CToWUd&quot; height=&quot;110&quot; id=&quot;m_7820037619892760044Picture_x0020_2&quot; src=&quot;https://mail.google.com/mail/u/0?ui=2&amp;ik=b3423b3625&amp;attid=0.0.1&amp;permmsgid=msg-f:1693829226056577439&amp;th=1781b0b4f146f19f&amp;view=fimg&amp;sz=s0-l75-ft&amp;attbid=ANGjdJ8JIulOim4mxuWrfwfQx_btNMDI_gvNICc2Bc9ddIa6jaB8vtH3R26yspy9eXCGMlb7aTFY68f6QXv88o-uPxubZ3VhS0gys7VdHxh1wsdqCgKI7dJWI0hxkWE&amp;disp=emb&quot; style=&quot;width:1.0833in;height:1.1458in;&quot; width=&quot;104&quot; /&gt;&lt;/span&gt;&lt;span style=&quot;color:#000000;&quot;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;b&gt;&lt;span style=&quot;color:#000000;&quot;&gt;Manikandan.G&lt;/span&gt;&lt;/b&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;b&gt;&lt;span style=&quot;color:#000000;&quot;&gt;Senior Sales Engineer&lt;/span&gt;&lt;/b&gt;&lt;br /&gt;
&lt;span style=&quot;color:#000000;&quot;&gt;&lt;b&gt;EIS Techinfra Solutions (India) Pvt Ltd.,&lt;/b&gt;&lt;br /&gt;
#142/2, Raj Bhavan, 2nd Main Road,&nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;Muni Reddy Layout, Horamavu Main Road,&nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;Bangalore-560043&lt;br /&gt;
Ph: &lt;/span&gt;080-41129512, 080-43723491,080-43773134&lt;br /&gt;
&lt;span style=&quot;color:#000000;&quot;&gt;&lt;u&gt;&lt;a href=&quot;http://www.einfratech.com/&quot;&gt;&lt;span style=&quot;color:#0563c1;&quot;&gt;www.einfratech.com&lt;/span&gt;&lt;/a&gt;&lt;/u&gt;&lt;br /&gt;
Mobile: +91-8056242946&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;color:#000000;&quot;&gt;&nbsp;&lt;/span&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;b&gt;Offices : BANGALORE | CHENNAI | MUMBAI | HYDERABAD | SINGAPORE |&lt;/b&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;/p&gt;

&lt;p class=&quot;MsoNormal&quot;&gt;&lt;/p&gt;
&lt;/div&gt;
&lt;/div&gt;','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'UeqX0QaHxeeNhjDH','time_zone'=>'Asia/Kolkata','currency_id'=>'2','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'Pic1.jpeg','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'10','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','currency_name'=>'India, Rupees','currency_code'=>'INR','currency_symbol'=>'₹','conv_rate'=>'74.00000','record_id'=>'','record_module'=>'','id'=>'9');
?>