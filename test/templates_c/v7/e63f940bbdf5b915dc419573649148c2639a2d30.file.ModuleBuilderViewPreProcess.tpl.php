<?php /* Smarty version Smarty-3.1.7, created on 2022-01-25 05:42:07
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\ModuleBuilder\ModuleBuilderViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2636061ef8dafcccbf1-72593338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e63f940bbdf5b915dc419573649148c2639a2d30' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\ModuleBuilder\\ModuleBuilderViewPreProcess.tpl',
      1 => 1643089230,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2636061ef8dafcccbf1-72593338',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61ef8dafd8841',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61ef8dafd8841')) {function content_61ef8dafd8841($_smarty_tpl) {?>



<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container-fluid app-nav">
    <div class="row">
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/SidebarHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
</nav>
     <div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-60' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class="data">
        </div>
        <div class="modal-dialog">
        </div>
    </div>
	
<script type="text/javascript">

	jQuery(document).ready(function () {
		var instance = new Vtiger_Index_Js();
		instance.registerEvents();
	});

</script>
<?php }} ?>