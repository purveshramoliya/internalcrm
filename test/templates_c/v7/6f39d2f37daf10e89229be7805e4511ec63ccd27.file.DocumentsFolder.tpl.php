<?php /* Smarty version Smarty-3.1.7, created on 2022-03-23 08:19:06
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\uitypes\DocumentsFolder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10446623ad7fa9924a7-25939529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f39d2f37daf10e89229be7805e4511ec63ccd27' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\uitypes\\DocumentsFolder.tpl',
      1 => 1620058879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10446623ad7fa9924a7-25939529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'SPECIAL_VALIDATOR' => 0,
    'FIELD_INFO' => 0,
    'FOLDER_VALUES' => 0,
    'FOLDER_VALUE' => 0,
    'FOLDER_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_623ad7faa6155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_623ad7faa6155')) {function content_623ad7faa6155($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo(), null, 0);?><?php $_smarty_tpl->tpl_vars['FOLDER_VALUES'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDocumentFolders(), null, 0);?><?php $_smarty_tpl->tpl_vars["SPECIAL_VALIDATOR"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator(), null, 0);?><select class="select2 inputElement" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?>data-validator="<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"]==true){?> data-rule-required="true" <?php }?><?php if (count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])){?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>><?php  $_smarty_tpl->tpl_vars['FOLDER_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FOLDER_NAME']->_loop = false;
 $_smarty_tpl->tpl_vars['FOLDER_VALUE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['FOLDER_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER_NAME']->key => $_smarty_tpl->tpl_vars['FOLDER_NAME']->value){
$_smarty_tpl->tpl_vars['FOLDER_NAME']->_loop = true;
 $_smarty_tpl->tpl_vars['FOLDER_VALUE']->value = $_smarty_tpl->tpl_vars['FOLDER_NAME']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['FOLDER_VALUE']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue')==$_smarty_tpl->tpl_vars['FOLDER_VALUE']->value){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['FOLDER_NAME']->value;?>
</option><?php } ?></select><?php }} ?>