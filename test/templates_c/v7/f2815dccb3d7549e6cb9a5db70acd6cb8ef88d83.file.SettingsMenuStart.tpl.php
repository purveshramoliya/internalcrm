<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:15:53
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\SettingsMenuStart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1541962134a395f8fd0-30088187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2815dccb3d7549e6cb9a5db70acd6cb8ef88d83' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\SettingsMenuStart.tpl',
      1 => 1620058867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1541962134a395f8fd0-30088187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'FIELDS_INFO' => 0,
    'USER_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a396cfd8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a396cfd8')) {function content_62134a396cfd8($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container-fluid app-nav">
	<div class="row">
		<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/SidebarHeader.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>
</nav>
<div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-300' tabindex='-1' role='dialog' aria-hidden='true'>
	<div class="data">
	</div>
	<div class="modal-dialog">
	</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['FIELDS_INFO']->value!=null){?>
	<script type="text/javascript">
		var uimeta = (function() {
			var fieldInfo  = <?php echo $_smarty_tpl->tpl_vars['FIELDS_INFO']->value;?>
;
			return {
				field: {
					get: function(name, property) {
						if(name && property === undefined) {
							return fieldInfo[name];
						}
						if(name && property) {
							return fieldInfo[name][property]
						}
					},
					isMandatory : function(name){
						if(fieldInfo[name]) {
							return fieldInfo[name].mandatory;
						}
						return false;
					},
					getType : function(name){
						if(fieldInfo[name]) {
							return fieldInfo[name].type
						}
						return false;
					}
				},
			};
		})();
	</script>
<?php }?>
<div class="main-container clearfix">
	<?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('leftpanelhide'), null, 0);?>
	<div class="module-nav clearfix settingsNav" id="modnavigator">
		<div class="hidden-xs hidden-sm height100Per">
			<?php echo $_smarty_tpl->getSubTemplate ("modules/Settings/Vtiger/Sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</div>
	<div class="settingsPageDiv content-area clearfix">

<?php }} ?>