<?php /* Smarty version Smarty-3.1.7, created on 2022-04-06 06:46:29
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\dashboards\MiniList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3080624d3745f04c44-06906622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2bce4b31a6dce3bb83d0f48afd7ab092930fe40' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\dashboards\\MiniList.tpl',
      1 => 1620058875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3080624d3745f04c44-06906622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_624d37460999c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_624d37460999c')) {function content_624d37460999c($_smarty_tpl) {?>
<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div class="dashboardWidgetContent">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/MiniListContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div class="widgeticons dashBoardWidgetFooter">
    <div class="footerIcons pull-right">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div><?php }} ?>