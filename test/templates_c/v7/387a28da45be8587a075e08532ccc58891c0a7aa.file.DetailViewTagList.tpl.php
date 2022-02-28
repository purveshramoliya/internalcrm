<?php /* Smarty version Smarty-3.1.7, created on 2022-02-21 06:58:15
         compiled from "D:\wamp\www\internalcrm\includes\runtime/../../layouts/v7\modules\Vtiger\DetailViewTagList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31185620a3f491164f4-23056450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '387a28da45be8587a075e08532ccc58891c0a7aa' => 
    array (
      0 => 'D:\\wamp\\www\\internalcrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\DetailViewTagList.tpl',
      1 => 1645426689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31185620a3f491164f4-23056450',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_620a3f4925a8b',
  'variables' => 
  array (
    'TAGS_LIST' => 0,
    'TAG_MODEL' => 0,
    'MODULE' => 0,
    'RECORD' => 0,
    'site_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_620a3f4925a8b')) {function content_620a3f4925a8b($_smarty_tpl) {?>
<div class="tagContainer">
    <div class="tag-contents <?php if (empty($_smarty_tpl->tpl_vars['TAGS_LIST']->value)){?> hide<?php }?>">
        <div class="detailTagList" data-num-of-tags-to-show="<?php echo Vtiger_Tag_Model::NUM_OF_TAGS_DETAIL;?>
">
            <?php  $_smarty_tpl->tpl_vars['TAG_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TAG_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TAGS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tagCounter']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['TAG_MODEL']->key => $_smarty_tpl->tpl_vars['TAG_MODEL']->value){
$_smarty_tpl->tpl_vars['TAG_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tagCounter']['iteration']++;
?>
                <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['tagCounter']['iteration']>Vtiger_Tag_Model::NUM_OF_TAGS_DETAIL){?>
                     <?php break 1?>
                <?php }?>
                <?php $_smarty_tpl->tpl_vars['TAG_LABEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['TAG_MODEL']->value->getName(), null, 0);?>
                <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Tag.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php } ?>

            <a href="javascript:void(0);" class="moreTags <?php if (count($_smarty_tpl->tpl_vars['TAGS_LIST']->value)<=Vtiger_Tag_Model::NUM_OF_TAGS_DETAIL){?> hide <?php }?>">
                <span class="tagMoreCount"><?php echo count($_smarty_tpl->tpl_vars['TAGS_LIST']->value)-Vtiger_Tag_Model::NUM_OF_TAGS_DETAIL;?>
</span>
                &nbsp;<?php echo strtolower(vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE']->value));?>

            </a>
        </div>
    </div>
    <div id="addTagContainer" >
        <a id="addTagTriggerer" class="badge">
            <i class="fa fa-plus"></i>
            <?php echo vtranslate('LBL_ADD_NEW_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>

        </a>
    </div>
    <div class="viewAllTagsContainer hide">
        <div class="modal-dialog">
            <div class="modal-content" style="min-height:200px">
                <?php ob_start();?><?php echo vtranslate('LBL_TAG_FOR',$_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['RECORD']->value->getName());?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["TITLE"] = new Smarty_variable($_tmp1, null, 0);?>
                <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="modal-body detailShowAllModal">
                    <div class="form-group">
                        <label class="col-lg-3 col-sm-12 col-md-4 control-label">
                            <?php echo vtranslate('LBL_CURRENT_TAGS',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                        </label>
                        <div class="col-lg-9 col-sm-12 col-md-8 ">
                            <div class="currentTag multiLevelTagList form-control">
                                <?php  $_smarty_tpl->tpl_vars['TAG_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['TAG_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TAGS_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['TAG_MODEL']->key => $_smarty_tpl->tpl_vars['TAG_MODEL']->value){
$_smarty_tpl->tpl_vars['TAG_MODEL']->_loop = true;
?>
                                    <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Tag.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                                <?php } ?>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
   <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("AddTagUI.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_NAME'=>$_smarty_tpl->tpl_vars['RECORD']->value->getName()), 0);?>

</div>
<div id="dummyTagElement" class="hide">
<?php $_smarty_tpl->tpl_vars['TAG_MODEL'] = new Smarty_variable(Vtiger_Tag_Model::getCleanInstance(), null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Tag.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div>
    <div  class="editTagContainer hide" >
        <input type="hidden" name="id" value="" />
        <div class="editTagContents">
            <div>
                <input type="text" name="tagName" value="Teee" style="width:100%" />
            </div>
            <div>
                <div class="checkbox">
                    <label>
                        <input type="hidden" name="visibility" value="<?php echo Vtiger_Tag_Model::PRIVATE_TYPE;?>
"/>
                        <input type="checkbox" name="visibility" value="<?php echo Vtiger_Tag_Model::PUBLIC_TYPE;?>
" />
                        &nbsp; <?php echo vtranslate('LBL_SHARE_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                    </label>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-mini btn-success saveTag" type="button" style="width:50%;float:left">
                <center> <i class="fa fa-check"></i> </center>
            </button>
            <button class="btn btn-mini btn-danger cancelSaveTag" type="button" style="width:50%">
                <center> <i class="fa fa-close"></i> </center>
            </button>
        </div>
    </div>
</div>
     <?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Joinee'){?>
            <div style="width:100%;float:right">
                <center> <i class="fa"></i> </center>
                <p><b>Documents upload link :</b> <?php echo $_smarty_tpl->tpl_vars['site_URL']->value;?>
UploadDocuments.php?record_id=<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
</p>
            </div>
    <?php }?>
           
     
<?php }} ?>