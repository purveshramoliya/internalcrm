<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 11:38:18
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\Requirements.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19324621379aa02c846-77764876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '904d05efa0c049956cd00927c49e423e80792402' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\Requirements.tpl',
      1 => 1620058866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19324621379aa02c846-77764876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'REQUIREMENTS' => 0,
    'DATA' => 0,
    'NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_621379aa2d056',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_621379aa2d056')) {function content_621379aa2d056($_smarty_tpl) {?>
<div class="listViewPageDiv detailViewContainer" id="requirementsContents"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 "><div id="listview-actions" class="listview-actions-container"><div class="clearfix"><h4 class="pull-left"><b><?php echo vtranslate('LBL_SYSTEM_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b></h4></div><hr><div class="contents"><br><div><h4><?php echo vtranslate('LBL_PHP_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_MINIMUM_REQ',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_RECOMMENDED_REQ',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATA']->_loop = false;
 $_smarty_tpl->tpl_vars['NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getPHPSettings(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATA']->key => $_smarty_tpl->tpl_vars['DATA']->value){
$_smarty_tpl->tpl_vars['DATA']->_loop = true;
 $_smarty_tpl->tpl_vars['NAME']->value = $_smarty_tpl->tpl_vars['DATA']->key;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']){?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['minimum'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['recommended'];?>
</td></tr><?php } ?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_DB_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_RECOMMENDED_DESCRIPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th></th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATA']->_loop = false;
 $_smarty_tpl->tpl_vars['NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getDBSettings(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATA']->key => $_smarty_tpl->tpl_vars['DATA']->value){
$_smarty_tpl->tpl_vars['DATA']->_loop = true;
 $_smarty_tpl->tpl_vars['NAME']->value = $_smarty_tpl->tpl_vars['DATA']->key;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']){?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td><?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['recommended_description'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td><td></td></tr><?php } ?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_FILE_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th><?php echo vtranslate('LBL_FILE_FOLDER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_CURRENT_VALUE_WRITABLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATA']->_loop = false;
 $_smarty_tpl->tpl_vars['NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getFilePermissions(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATA']->key => $_smarty_tpl->tpl_vars['DATA']->value){
$_smarty_tpl->tpl_vars['DATA']->_loop = true;
 $_smarty_tpl->tpl_vars['NAME']->value = $_smarty_tpl->tpl_vars['DATA']->key;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']){?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td></td><td></td></tr><?php } ?></tbody></table></div><br><div><h4><?php echo vtranslate('LBL_USER_REQUIREMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
:</h4><table class="table border1px reqTable"><thead><tr><th></th><th><?php echo vtranslate('LBL_CURRENT_VALUE_ERROR',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th></th><th></th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['DATA'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATA']->_loop = false;
 $_smarty_tpl->tpl_vars['NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['REQUIREMENTS']->value->getUserSettings(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATA']->key => $_smarty_tpl->tpl_vars['DATA']->value){
$_smarty_tpl->tpl_vars['DATA']->_loop = true;
 $_smarty_tpl->tpl_vars['NAME']->value = $_smarty_tpl->tpl_vars['DATA']->key;
?><tr class="<?php echo $_smarty_tpl->tpl_vars['DATA']->value['error'];?>
Error <?php echo $_smarty_tpl->tpl_vars['DATA']->value['warning'];?>
Warning"><td><b><?php echo vtranslate($_smarty_tpl->tpl_vars['NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</b> <?php if ($_smarty_tpl->tpl_vars['DATA']->value['info']){?>(<?php echo vtranslate($_smarty_tpl->tpl_vars['DATA']->value['info'],$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
)<?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['DATA']->value['current'];?>
</td><td></td><td></td></tr><?php } ?></tbody></table></div><br></div></div></div></div>
<?php }} ?>