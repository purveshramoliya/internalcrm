<?php /* Smarty version Smarty-3.1.19, created on 2021-07-01 07:43:05
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Portal/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:211646825160ddb859567b78-17778450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3e4895e6b63cc5f4f392f7735775b8c6975142a' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Portal/partials/DetailContentBefore.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211646825160ddb859567b78-17778450',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60ddb859603c53_57254294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60ddb859603c53_57254294')) {function content_60ddb859603c53_57254294($_smarty_tpl) {?>


    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7 detail-header detail-header-row">
      <h3 class="fsmall">
        <detail-navigator>
          <span>
            <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
            </a>
            </span>
        </detail-navigator>{{record[header]}}
        <button ng-if="isEditable" class="btn btn-primary attach-files-ticket" ng-click="editRecord(module,id)">{{'Edit'|translate}} {{ptitle}}</button>
      </h3>
    </div>
</div>

<hr class="hrHeader">
<div class="container-fluid">

<?php }} ?>
