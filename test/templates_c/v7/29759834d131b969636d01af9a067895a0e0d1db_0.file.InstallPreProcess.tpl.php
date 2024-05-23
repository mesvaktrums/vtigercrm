<?php
/* Smarty version 4.3.4, created on 2024-04-29 04:18:09
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/Install/InstallPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_662f1171bf98e0_38576597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29759834d131b969636d01af9a067895a0e0d1db' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/Install/InstallPreProcess.tpl',
      1 => 1706189738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662f1171bf98e0_38576597 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="hidden" id="module" value="Install" />
<input type="hidden" id="view" value="Index" />
<div class="container-fluid page-container">
	<div class="row">
		<div class="col-sm-6">
			<div class="logo">
				<img src="<?php echo vimage_path('logo.png');?>
"/>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="head pull-right">
				<h3><?php echo vtranslate('LBL_INSTALLATION_WIZARD','Install');?>
</h3>
			</div>
		</div>
	</div>
<?php }
}
