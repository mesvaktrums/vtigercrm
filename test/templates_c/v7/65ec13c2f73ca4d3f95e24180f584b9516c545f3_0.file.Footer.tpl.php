<?php
/* Smarty version 4.3.4, created on 2024-05-14 04:28:47
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/PDFMaker/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642e87f854b05_98864186',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65ec13c2f73ca4d3f95e24180f584b9516c545f3' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/PDFMaker/Footer.tpl',
      1 => 1715660835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6642e87f854b05_98864186 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br><div class="small" style="color: rgb(153, 153, 153);text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo PDFMaker_Version_Helper::$version;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Footer.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
