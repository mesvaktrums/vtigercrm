<?php
/* Smarty version 4.3.4, created on 2024-05-14 04:18:18
  from '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ITS4YouInstaller/rows/Language.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6642e60a7f3ac6_41047563',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12fe0dce1b309a3ca94a29ae72d816ebe694db4' => 
    array (
      0 => '/home/meromedi/crm.meromedika/layouts/v7/modules/Settings/ITS4YouInstaller/rows/Language.tpl',
      1 => 1715660256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6642e60a7f3ac6_41047563 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isVtigerCompatible() && !$_smarty_tpl->tpl_vars['LANGUAGE']->value->isAlreadyExists() && ($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price') == 'Free' || $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('price') == 0 || $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('available') == 1)) {?>
    <tr class="" data-cfmid="1">
        <td style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('label'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
        <td colspan="2" style="border-left:none;border-right:none;"><?php echo vtranslate($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('description'),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</td>
        <td style="border-left:none;border-right:none;">
            <span class="extension_container">
                <input type="hidden" name="extensionName" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name');?>
"/>
                <input type="hidden" name="extensionUrl" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('downloadURL');?>
"/>
                <input type="hidden" name="extensionId" value="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('id');?>
"/>
                <input type="hidden" name="moduleMode" value="oneClickInstall"/>
                <span class="pull-left">
                    <?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website') != '') {?>
                        <button class="btn installExtension addButton" style="margin-right:5px;" data-url="<?php echo $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('website');?>
"><?php echo vtranslate('LBL_MORE_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('LANG_KEY', $_smarty_tpl->tpl_vars['LANGUAGE']->value->get('name'));?>

                    <?php if ($_smarty_tpl->tpl_vars['ALL_LANGUAGES']->value[$_smarty_tpl->tpl_vars['LANG_KEY']->value] != '') {?>
                        <?php if ($_smarty_tpl->tpl_vars['LANGUAGE']->value->isUpgradableLanguage()) {?>
                            <input type="hidden" name="moduleAction" value="Update"/>
                            <input type="hidden" name="moduleMessage" value="<?php echo $_smarty_tpl->tpl_vars['EXTENSION']->value->getUpdateMessage();?>
"/>
                            <button class="oneClickInstall isUpdateBtn btn btn-success <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value) {?>authenticated <?php } else { ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_UPDATE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                        <?php }?>
                    <?php } else { ?>
                        <input type="hidden" name="moduleAction" value="Install"/>
                        <button class="oneClickInstall btn btn-primary <?php if ($_smarty_tpl->tpl_vars['IS_AUTH']->value) {?>authenticated <?php } else { ?> loginRequired<?php }?>"><?php echo vtranslate('LBL_INSTALL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button>
                    <?php }?>
                </span>
            </span>
        </td>
    </tr>
<?php }
}
}
