<?php
/* Smarty version 4.3.4, created on 2024-05-14 04:18:18
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/ITS4YouInstaller/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642e60a9573c7_07030323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a42409d739f55cd46ad602df49a1bd4ec30f3af' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/ITS4YouInstaller/Footer.tpl',
      1 => 1715660256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6642e60a9573c7_07030323 (Smarty_Internal_Template $_smarty_tpl) {
?>
<br><div class="small" style="color: rgb(153, 153, 153);text-align: center;"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo ITS4YouInstaller_Version_Helper::$version;?>
 <?php echo vtranslate("COPYRIGHT",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("Footer.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
