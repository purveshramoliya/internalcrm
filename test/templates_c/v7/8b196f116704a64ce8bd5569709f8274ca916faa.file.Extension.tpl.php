<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 08:16:00
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Settings\ITS4YouInstaller\rows\Extension.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1610962134a40c99f72-35576364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b196f116704a64ce8bd5569709f8274ca916faa' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\ITS4YouInstaller\\rows\\Extension.tpl',
      1 => 1620058866,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1610962134a40c99f72-35576364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'EXTENSION' => 0,
    'MODULE_NAME' => 0,
    'MODULE_MODEL' => 0,
    'QUALIFIED_MODULE' => 0,
    'IS_AUTH' => 0,
    'SETTINGS_LINKS' => 0,
    'SETTINGS_LINK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_62134a40e8a16',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62134a40e8a16')) {function content_62134a40e8a16($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('moduleModel'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['EXTENSION']->value->get('name'), null, 0);?>
<tr class="installedModuleRow" data-cfmid="1" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
">
    <td style="border-left:none;border-right:none;"><a <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?>href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultUrl();?>
" target="_blank" <?php }else{ ?> href="#<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['EXTENSION']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a></td>
    <td style="border-left:none;border-right:none;" class="validateVersion"><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->getVersion();?>
</td>
    <td style="border-left:none;border-right:none;"><?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('pkgVersion');?>
</td>
    <td style="border-left:none;border-right:none;">
        <span class="extension_container">
            <?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->isVtigerCompatible()){?>
                <input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('name');?>
"/>
                <input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('downloadURL');?>
"/>
                <input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('id');?>
"/>
                <input type="hidden" name="extensionType" value="Single"/>
                <?php if (!$_smarty_tpl->tpl_vars['EXTENSION']->value->isAlreadyExists()){?>
                    <input type="hidden" name="moduleAction" value="Install"/>
                    <button class="oneclickInstallFree btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>">
                        <?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                    </button>
                <?php }elseif($_smarty_tpl->tpl_vars['EXTENSION']->value->isUpgradable()){?>
                    <input type="hidden" name="moduleAction" value="Upgrade"/>
                    <button class="oneclickInstallFree isUpdateBtn btn btn-success margin0px <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value){?>authenticated <?php }else{ ?> loginRequired<?php }?>">
                        <?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>

                    </button>
                <?php }?>
            <?php }?>
        </span>
        <?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value){?>
            <?php $_smarty_tpl->tpl_vars['SETTINGS_LINKS'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getSettingLinks(), null, 0);?>
            <?php if ((count($_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value)>0)){?>
                <span class="btn-group pull-right <?php if (!$_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isActive()){?>hide<?php }?>">
                    <button class="btn btn-default btn dropdown-toggle unpin hiden " data-toggle="dropdown">
                        <?php echo vtranslate('LBL_SETTINGS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<i class="caret"></i>
                    </button>
                    <ul class="dropdown-menu pull-right dropdownfields">
                        <?php  $_smarty_tpl->tpl_vars['SETTINGS_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['SETTINGS_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SETTINGS_LINKS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['SETTINGS_LINK']->key => $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value){
$_smarty_tpl->tpl_vars['SETTINGS_LINK']->_loop = true;
?>
                            <li>
                                <a target="_blank" <?php if (stripos($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],'javascript:')===0){?>onclick='<?php echo substr($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'],strlen("javascript:"));?>
'<?php }else{ ?>href='<?php echo $_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linkurl'];?>
'<?php }?>>
                                    <?php echo vtranslate($_smarty_tpl->tpl_vars['SETTINGS_LINK']->value['linklabel'],$_smarty_tpl->tpl_vars['MODULE_NAME']->value,vtranslate("SINGLE_".($_smarty_tpl->tpl_vars['MODULE_NAME']->value),$_smarty_tpl->tpl_vars['MODULE_NAME']->value));?>

                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </span>
            <?php }?>
        <?php }?>
        <span class="pull-right">
            <?php if ($_smarty_tpl->tpl_vars['EXTENSION']->value->get('website')!=''){?>
                <button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
            <?php }?>
        </span>
    </td>
</tr><?php }} ?>