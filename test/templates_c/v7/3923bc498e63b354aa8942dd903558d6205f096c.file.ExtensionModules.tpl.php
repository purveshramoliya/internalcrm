<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:16:00
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\ExtensionModules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2485562134a40907d90-44584905%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3923bc498e63b354aa8942dd903558d6205f096c' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\ExtensionModules.tpl',
      1 => 1620058866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2485562134a40907d90-44584905',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'REGISTRATION_STATUS' => 0,
    'PASSWORD_STATUS' => 0,
    'QUALIFIED_MODULE' => 0,
    'IS_HOSTING_LICENSE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a4099863',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a4099863')) {function content_62134a4099863($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['IS_AUTH'] = new Smarty_variable(($_smarty_tpl->tpl_vars['REGISTRATION_STATUS']->value&&$_smarty_tpl->tpl_vars['PASSWORD_STATUS']->value), null, 0);?><div class="col-lg-12"><br><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="tab-item taxesTab active"><a data-toggle="tab" href="#installedModules"><strong><?php echo vtranslate('LBL_INSTALLED_AND_AVAILABLE_MODULES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><?php if (!$_smarty_tpl->tpl_vars['IS_HOSTING_LICENSE']->value){?><li class="tab-item chargesTab"><a data-toggle="tab" href="#modulesShop"><strong><?php echo vtranslate('LBL_MODULES_SHOP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><?php }?></ul><br></div><div class="tab-content layoutContent overflowVisible" style="height:100%"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("InstalledModules.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php if (!$_smarty_tpl->tpl_vars['IS_HOSTING_LICENSE']->value){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModulesShop.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?></div><?php }} ?>