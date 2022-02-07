<?php /* Smarty version Smarty-3.1.19, created on 2021-06-07 05:40:43
         compiled from "/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Portal/partials/UpdatesContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75889855960bdf7ab0ada16-89596716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce67c46a84ca5292ad6f773d1315e5626a95ab3d' => 
    array (
      0 => '/home4/kalpdeep/public_html/internalcrm/customerportal/layouts/default/templates/Portal/partials/UpdatesContent.tpl',
      1 => 1587736809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75889855960bdf7ab0ada16-89596716',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_60bdf7ab0af390_72350737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_60bdf7ab0af390_72350737')) {function content_60bdf7ab0af390_72350737($_smarty_tpl) {?>


<div class="row">
	<div class="container-fluid">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="container-fluid updatesContainer">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="container-fluid">
							<div class="row" ng-show="updates === ''">
								<span class="value">No Updates Found.</span>
							</div>
							<div class="row update-row" ng-repeat="update in updates" ng-if="isLanguage(update)">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-repeat="(fieldname,value) in update" ng-if="isLanguage(update)">
									<p ng-if="value.updateStatus=='updated'">
										<span class="update-bullet">&nbsp;</span>
										<strong> {{fieldname}} </strong>
										<span class="value">
											<span ng-if="value.previous!==''">&nbsp;{{'changed from'|translate}}&nbsp;
												<strong class="break" style="white-space:pre-line;">{{value.previous}}&nbsp;</strong>
												<span ng-if="value.current!==''">&nbsp;{{'to'|translate}}&nbsp;</span>
											</span>
										</span>
										<span class="value">
											<span ng-if="value.previous =='' && value.current!==''">&nbsp;{{'changed to'|translate}}&nbsp;</span>
											<strong class="break" style="white-space:pre-line;">{{value.current}}</strong>
										</span>
										<span class="value">
											<span ng-if="value.previous =='' && value.current==''">&nbsp;{{'deleted'|translate}}&nbsp;</span>
										</span>
										<small class="text-muted update-time">{{update.modifiedtime}}</small>
									</p>
									<p ng-if="value.updateStatus=='created'">
										<span class="update-bullet">&nbsp;</span>
										<span>
											<strong>{{update.created.user}}</strong>&nbsp;{{'created'|translate}}</span>
										<small class="text-muted update-time">{{update.modifiedtime}}</small>
									</p>
								</div>
							</div>
							<a ng-if="!updatesLoaded && !noUpdates  && created" ng-click="loadHistoryPage(historyPageNo)">{{'more'|translate}}...</a>
							<p ng-if="updatesLoaded && !noUpdates" class="text-muted">{{'No more updates'|translate}}</p>
							<p ng-if="!updatesLoaded && noUpdates" class="text-muted">{{'No updates'|translate}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }} ?>
