<?php /* Smarty version Smarty-3.1.19, created on 2021-06-30 04:44:38
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Project/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25816929360dc3d0629f519-20431799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2322485f1048298c582c8c6dad84c7feed9d621d' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Project/partials/DetailContentBefore.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25816929360dc3d0629f519-20431799',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60dc3d063f6d14_29463774',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60dc3d063f6d14_29463774')) {function content_60dc3d063f6d14_29463774($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
        </a>
      </span>
    </detail-navigator>
    {{record[header]}}
  <button ng-if="documentsEnabled" translate="Attach document to this project" class="btn btn-primary attach-files-ticket" ng-click="attachDocument('Documents','LBL_ADD_DOCUMENT')"></button></h3>
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<script type="text/javascript" src="<?php echo portal_componentjs_file('Documents');?>
"></script>
<?php echo $_smarty_tpl->getSubTemplate (portal_template_resolve('Documents',"partials/IndexContentAfter.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
