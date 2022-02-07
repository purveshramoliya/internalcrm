<?php /* Smarty version Smarty-3.1.19, created on 2021-06-07 05:40:43
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Documents/partials/RelatedDocumentsContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:95330356260bdf7ab0b68e3-45504783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3caf56bbbe16e63cfc2e0f4c4873c9e5be102c6' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Documents/partials/RelatedDocumentsContent.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95330356260bdf7ab0b68e3-45504783',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60bdf7ab0b8176_27777020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60bdf7ab0b8176_27777020')) {function content_60bdf7ab0b8176_27777020($_smarty_tpl) {?>


    <div class="cp-table-container" ng-show="documentsrecords">
        <div class="table-responsive">
            <table class="table table-hover table-condensed table-detailed dataTable no-footer">
                <thead>
                    <tr class="listViewHeaders">

                        <th ng-hide="documentsheader=='id'" ng-repeat="documentsheader in documentsheaders" nowrap="" class="medium">
                            <a href="javascript:void(0);" class="listViewHeaderValues" translate="{{documentsheader}}">{{documentsheader}}</a>
                        </th>
                        <th ng-hide="header=='id'" class="medium">
                            <a class="listViewHeaderValues">{{'Actions'|translate}}</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="listViewEntries" ng-repeat="documentrecord in documentsrecords">

                        <td ng-hide="documentsheader=='id'" ng-repeat="documentsheader in documentsheaders" class="listViewEntryValue medium" ng-click="ChangeLocation('Documents',documentrecord.id)">
                <ng-switch on="documentrecord[documentsheader].type">
                    <a ng-href="index.php?module=Documents&view=Detail&id={{documentrecord.id}}"></a>
                    <span ng-switch-default>{{documentrecord[documentsheader]}}</span>
                </ng-switch>
                </td>
                <td ng-hide="documentsheader=='id'" class="listViewEntryValue medium" nowrap="" style='cursor: pointer;'>
                    <span ng-if="documentrecord.documentExists" class="btn btn-primary" ng-click="downloadFile('Documents',documentrecord.id,id)">{{'Download'|translate}}</span>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <a ng-if="!documentsLoaded && !noDocuments" ng-click="loadDocumentsPage(documentsPageNo)">{{'more'|translate}}...</a>
    <p ng-if="documentsLoaded" class="text-muted">{{'No more documents'|translate}}</p>
    <p ng-if="!documentsLoaded && noDocuments" class="text-muted">{{'No documents'|translate}}</p>

<?php }} ?>
