<?php /* Smarty version Smarty-3.1.7, created on 2022-03-31 07:23:22
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Documents\partials\Menubar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14292624556ea229f79-51462522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '417863e367421da67973073d58bde77b222ac89e' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Documents\\partials\\Menubar.tpl',
      1 => 1620058881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14292624556ea229f79-51462522',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_624556ea26e8f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_624556ea26e8f')) {function content_624556ea26e8f($_smarty_tpl) {?>

<?php if ($_REQUEST['view']=='Detail'){?>
<div id="modules-menu" class="modules-menu">    
    <ul>
        <li class="active">
            <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
">
				<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>

                <span><?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
</span>
            </a>
        </li>
    </ul>
</div>
<?php }?><?php }} ?>