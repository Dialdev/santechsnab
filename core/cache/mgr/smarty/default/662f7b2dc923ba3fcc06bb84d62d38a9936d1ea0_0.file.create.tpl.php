<?php
/* Smarty version 3.1.31, created on 2018-09-12 09:45:19
  from "/home/s/santechsnab/public_html/manager/templates/default/resource/staticresource/create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b98b5ff863445_73538236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '662f7b2dc923ba3fcc06bb84d62d38a9936d1ea0' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/resource/staticresource/create.tpl',
      1 => 1531325208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b98b5ff863445_73538236 (Smarty_Internal_Template $_smarty_tpl) {
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
