<?php
/* Smarty version 4.3.4, created on 2024-05-14 03:46:48
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ExtensionStore/SettingsMenuStart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642dea830f064_09170854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451bb1ef262c079f11892586e59c2cd6861cbd09' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ExtensionStore/SettingsMenuStart.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/Topbar.tpl' => 1,
  ),
),false)) {
function content_6642dea830f064_09170854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid app-nav">
	<div class="row">
		<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("partials/SidebarHeader.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
		<?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	</div>
</div>
</nav>    

<div class="main-container clearfix">
	<div class=" ExtensionscontentsDiv contentsDiv"><?php }
}
