<?php
/* Smarty version 3.1.31, created on 2022-07-22 11:26:31
  from "/home/s/santechsnab/public_html/manager/templates/default/element/tv/renders/input/richtext.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_62da5f37bd79d9_28633195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9e45365b1fbbafc84afa94e96d7d2fa3d0b8164' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1658234790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62da5f37bd79d9_28633195 (Smarty_Internal_Template $_smarty_tpl) {
?>
<textarea id="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" name="tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
" class="modx-richtext" onchange="MODx.fireResourceFormChange();"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tv']->value->get('value'), ENT_QUOTES, 'UTF-8', true);?>
</textarea>

<?php echo '<script'; ?>
 type="text/javascript">

Ext.onReady(function() {
    
    MODx.makeDroppable(Ext.get('tv<?php echo $_smarty_tpl->tpl_vars['tv']->value->id;?>
'));
    
});
<?php echo '</script'; ?>
><?php }
}
