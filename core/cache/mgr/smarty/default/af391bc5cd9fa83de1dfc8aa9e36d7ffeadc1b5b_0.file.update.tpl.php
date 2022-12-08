<?php
/* Smarty version 3.1.31, created on 2018-09-10 10:48:27
  from "/home/s/santechsnab/public_html/manager/templates/default/resource/weblink/update.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b9621cbdc5b24_70568562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af391bc5cd9fa83de1dfc8aa9e36d7ffeadc1b5b' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/resource/weblink/update.tpl',
      1 => 1531325208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b9621cbdc5b24_70568562 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="modx-panel-weblink-div"></div>
<div id="modx-resource-tvs-div" class="modx-resource-tab x-form-label-left x-panel"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['tvOutput']->value)===null||$tmp==='' ? '' : $tmp);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['onDocFormPrerender']->value;?>

<?php if ($_smarty_tpl->tpl_vars['resource']->value->richtext && $_smarty_tpl->tpl_vars['_config']->value['use_editor']) {?>
    <?php echo $_smarty_tpl->tpl_vars['onRichTextEditorInit']->value;?>

<?php }
}
}
