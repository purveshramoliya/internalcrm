<?php /* Smarty version Smarty-3.1.19, created on 2021-12-09 03:50:37
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/ProjectMilestone/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14321494961b1d16d2a91a6-28761123%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '883c1724ce9a87f3051b72a97582107b02500cab' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/ProjectMilestone/partials/DetailContentBefore.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14321494961b1d16d2a91a6-28761123',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_61b1d16d340dd1_94997310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61b1d16d340dd1_94997310')) {function content_61b1d16d340dd1_94997310($_smarty_tpl) {?>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ticket-detail-header-row ">
  <h3 class="fsmall">
    <detail-navigator>
      <span>
        <a ng-click="navigateBack(module)" style="font-size:small;">{{ptitle}}
        </a>
      </span>
      </detail-navigator>
      {{record[header]}}
</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<?php }} ?>
