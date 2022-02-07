<?php /* Smarty version Smarty-3.1.19, created on 2021-06-07 05:40:43
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Project/partials/ProjectTaskContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197786064760bdf7ab0b0971-67273210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b953cc14af4dc4b04da8ece360e3e080751f901e' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Project/partials/ProjectTaskContent.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197786064760bdf7ab0b0971-67273210',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60bdf7ab0b2494_70441384',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60bdf7ab0b2494_70441384')) {function content_60bdf7ab0b2494_70441384($_smarty_tpl) {?>


    <div class="cp-table-container" ng-show="projecttaskrecords">
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-detailed dataTable no-footer">
                <thead>
                    <tr class="listViewHeaders">
                        <th ng-hide="header=='id'" ng-repeat="header in projecttaskheaders" nowrap="" class="medium">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="{{header}}" translate="{{header}}">{{header}}&nbsp;&nbsp;</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="listViewEntries" ng-repeat="record in projecttaskrecords">
                        <td ng-hide="header=='id'" ng-repeat="header in projecttaskheaders" class="listViewEntryValue medium" nowrap="" style='cursor: pointer;' ng-mousedown="ChangeLocation(record, 'ProjectTask')">
                <ng-switch on="record[header].type">
                    <a ng-href="index.php?module=ProjectTask&view=Detail&id={{record.id}}"></a>
                    <span ng-switch-default>{{record[header]}}</span>
                </ng-switch>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a ng-if="!tasksLoaded && !noTasks" ng-click="loadProjectTaskPage(projectTaskPageNo)">{{'more'|translate}}...</a>
    <p ng-if="tasksLoaded" class="text-muted">{{'No Tasks'|translate}}</p>
    <p ng-if="!tasksLoaded && noTasks" class="text-muted">{{'No more Tasks'|translate}}</p>

<?php }} ?>
