<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:16:00
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:450262134a4089e606-94213609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04b11789b2b3e0154b9fbbaf7b938a15b4f99b11' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\Index.tpl',
      1 => 1620058867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '450262134a4089e606-94213609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a408e0c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a408e0c9')) {function content_62134a408e0c9($_smarty_tpl) {?>
<div class="main-container clearfix"><div class="ExtensionscontentsDiv contentsDiv"><div class="col-sm-12 col-xs-12" id="importModules"><div class="contents tabbable row"><div class="col-sm-12 col-xs-12" id="extensionContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ExtensionModules.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("LoginModals.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>