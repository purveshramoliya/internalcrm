<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:16:02
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\ITS4YouInstaller\Footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2378562134a424b6c31-43532070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '065a1d5df88fbcc76c999a11751a78674a070c08' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\ITS4YouInstaller\\Footer.tpl',
      1 => 1620058883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2378562134a424b6c31-43532070',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a42500fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a42500fc')) {function content_62134a42500fc($_smarty_tpl) {?>

<br><div class="small" style="color: rgb(153, 153, 153);text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo ITS4YouInstaller_Version_Helper::$version;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Footer.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>