<?php /* Smarty version Smarty-3.1.19, created on 2021-07-15 03:44:14
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/ProjectTask/partials/DetailContentBefore.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213820037360eff55e04e7a0-96775472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e282c8c273d50faf3e1797bab1fc7b83d618a678' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/ProjectTask/partials/DetailContentBefore.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213820037360eff55e04e7a0-96775472',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60eff55e12efa5_18982340',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60eff55e12efa5_18982340')) {function content_60eff55e12efa5_18982340($_smarty_tpl) {?>


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
