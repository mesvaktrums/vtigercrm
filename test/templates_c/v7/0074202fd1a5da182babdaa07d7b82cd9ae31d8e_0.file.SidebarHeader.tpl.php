<?php
/* Smarty version 4.3.4, created on 2024-05-14 04:18:14
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ITS4YouInstaller/partials/SidebarHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642e606469d80_08636734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0074202fd1a5da182babdaa07d7b82cd9ae31d8e' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ITS4YouInstaller/partials/SidebarHeader.tpl',
      1 => 1715660256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/SidebarAppMenu.tpl' => 1,
  ),
),false)) {
function content_6642e606469d80_08636734 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('APP_IMAGE_MAP', array('MARKETING'=>'fa-users','SALES'=>'fa-dot-circle-o','SUPPORT'=>'fa-life-ring','INVENTORY'=>'vicon-inventory','PROJECT'=>'fa-briefcase','TOOLS'=>'fa-wrench'));?>

<div class="col-sm-12 col-xs-12 app-indicator-icon-container extensionstore app-MARKETING">
    <div class="row" title="<?php echo vtranslate('LBL_EXTENSION_STORE','Settings:$QUALIFIED_MODULE');?>
">
        <span class="app-indicator-icon cursorPointer fa fa-shopping-cart"></span>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/SidebarAppMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
