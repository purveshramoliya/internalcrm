<?php /* Smarty version Smarty-3.1.7, created on 2022-03-24 07:53:23
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32561623c2373e9e233-11683407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d0447cdd1e815c436d86ed703a1cfac0777a51f' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\ModuleSummaryView.tpl',
      1 => 1620058876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32561623c2373e9e233-11683407',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'SUMMARY_RECORD_STRUCTURE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_623c237401f36',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_623c237401f36')) {function content_623c237401f36($_smarty_tpl) {?>



<div class="recordDetails">
    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['SUMMARY_RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0);?>

</div><?php }} ?>