<?php /* Smarty version Smarty-3.1.7, created on 2022-01-25 06:16:11
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\uitypes\FieldSearchView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1698861ef95abf0e8d9-36678748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '148cac4b17cd9d3b9f0a908194bacacf64f73c3e' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\uitypes\\FieldSearchView.tpl',
      1 => 1620058880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1698861ef95abf0e8d9-36678748',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'SEARCH_INFO' => 0,
    'FIELD_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61ef95ac0417f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61ef95ac0417f')) {function content_61ef95ac0417f($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()), null, 0);?><div class=""><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
" class="listSearchContributor inputElement" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'];?>
" data-field-type="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType();?>
" data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'/></div><?php }} ?>