<?php
/* Smarty version 3.1.31, created on 2022-07-25 11:14:59
  from "/home/s/santechsnab/public_html/manager/templates/default/resource/staticresource/create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_62de51036138a7_94486844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a683bcceed8f9b683f14f1995145e3df4f1527c4' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/resource/staticresource/create.tpl',
      1 => 1658234790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62de51036138a7_94486844 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="modx-panel-static-div"></div>
<div id="modx-resource-tvs-div" class="modx-resource-tab x-form-label-left x-panel"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tvOutput']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['onDocFormPrerender']->value;?>

<?php if ($_smarty_tpl->tpl_vars['resource']->value->richtext && $_smarty_tpl->tpl_vars['_config']->value['use_editor']) {?>
    <?php echo $_smarty_tpl->tpl_vars['onRichTextEditorInit']->value;?>

<?php }
}
}
