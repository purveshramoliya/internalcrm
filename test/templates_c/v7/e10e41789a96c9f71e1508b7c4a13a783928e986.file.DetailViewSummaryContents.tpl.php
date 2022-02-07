<?php /* Smarty version Smarty-3.1.7, created on 2022-01-03 09:37:01
         compiled from "/home4/kalpdeep/public_html/internalcrm/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68384473961d2c3bd9bcc73-45228761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e10e41789a96c9f71e1508b7c4a13a783928e986' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/includes/runtime/../../layouts/v7/modules/SalesOrder/DetailViewSummaryContents.tpl',
      1 => 1620058894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68384473961d2c3bd9bcc73-45228761',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61d2c3bd9f23a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61d2c3bd9f23a')) {function content_61d2c3bd9f23a($_smarty_tpl) {?>
<form id="detailView" method="POST"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form><?php }} ?>