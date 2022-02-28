<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:15:53
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\ModuleHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1860962134a39ba24b6-11848478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26554a829429b68501aaf906d53b7a1dbf6cf55d' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\ModuleHeader.tpl',
      1 => 1620058866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1860962134a39ba24b6-11848478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'REQUIREMENTS' => 0,
    'MODULE_MODEL' => 0,
    'PASSWORD_STATUS' => 0,
    'QUALIFIED_MODULE' => 0,
    'USER_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a39c03f4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a39c03f4')) {function content_62134a39c03f4($_smarty_tpl) {?>
<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop"><div class="module-action-content clearfix"><div class="col-lg-4 col-md-4"><h4 title="<?php echo strtoupper(vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value));?>
" class="module-title pull-left text-uppercase"> <?php echo strtoupper(vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value));?>
 </h4></div><div class="col-lg-8 col-md-8"><div class="navbar-right"><ul class="nav navbar-nav"><li><button class="btn btn-<?php echo $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getButtonType();?>
" type="button" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getRequirementsUrl();?>
', '_blank');"><?php echo vtranslate('LBL_SYSTEM_REQUIREMENTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;<?php if (!($_smarty_tpl->tpl_vars['PASSWORD_STATUS']->value)){?><button class="btn btn-default module-buttons" type="button" id="logintoInstaller"><div class="fa fa-sign-in" aria-hidden="true"></div>&nbsp;<?php echo vtranslate('LBL_LOGIN',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }else{ ?><button class="btn btn-default module-buttons" type="button" style="text-transform:none"><?php echo $_smarty_tpl->tpl_vars['USER_NAME']->value;?>
</button>&nbsp;<button class="btn btn-danger" type="button" id="logoutInstaller"><span class="fa fa-power-off"></span>&nbsp;<?php echo vtranslate('LBL_LOGOUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button><?php }?></li></ul></div></div></div></div><?php }} ?>