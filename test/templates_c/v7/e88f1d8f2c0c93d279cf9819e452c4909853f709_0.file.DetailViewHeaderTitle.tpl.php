<?php
/* Smarty version 4.3.4, created on 2024-05-14 04:29:22
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/PDFMaker/DetailViewHeaderTitle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642e8a2408556_98082438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e88f1d8f2c0c93d279cf9819e452c4909853f709' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/PDFMaker/DetailViewHeaderTitle.tpl',
      1 => 1715660835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6642e8a2408556_98082438 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-6 col-md-6 col-sm-6"><div class="record-header clearfix"><?php if (!$_smarty_tpl->tpl_vars['MODULE']->value) {
$_smarty_tpl->_assignInScope('MODULE', $_smarty_tpl->tpl_vars['MODULE_NAME']->value);
}?><div class="hidden-sm hidden-xs recordImage bg_<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
 app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><div class="name"><span><strong><i class="vicon-<?php echo strtolower($_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></strong></span></div></div><div class="recordBasicInfo"><div class="info-row"><h4><span class="modulename_label"><?php echo vtranslate('LBL_MODULENAMES',$_smarty_tpl->tpl_vars['MODULE']->value);?>
:</span>&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['RECORD']->value->get('module'),$_smarty_tpl->tpl_vars['RECORD']->value->get('module'));?>
</h4></div></div></div></div><?php }
}
