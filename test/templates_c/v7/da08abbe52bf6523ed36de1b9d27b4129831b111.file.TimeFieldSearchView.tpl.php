<?php /* Smarty version Smarty-3.1.7, created on 2022-01-25 13:01:01
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\uitypes\TimeFieldSearchView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164161eff48d398957-04609798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da08abbe52bf6523ed36de1b9d27b4129831b111' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\uitypes\\TimeFieldSearchView.tpl',
      1 => 1620058880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164161eff48d398957-04609798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'SEARCH_INFO' => 0,
    'SEARCH_VALUE' => 0,
    'FIELD_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61eff48d3e2cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61eff48d3e2cf')) {function content_61eff48d3e2cf($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo())), null, 0);?><?php $_smarty_tpl->tpl_vars["SEARCH_VALUE"] = new Smarty_variable($_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'], null, 0);?><div class=""><input type="text" class="timepicker-default listSearchContributor" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_VALUE']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" data-field-type="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType();?>
" data-fieldinfo='<?php echo $_smarty_tpl->tpl_vars['FIELD_INFO']->value;?>
'/></div><?php }} ?>