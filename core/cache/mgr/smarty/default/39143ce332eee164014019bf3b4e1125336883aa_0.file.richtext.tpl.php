<?php
/* Smarty version 3.1.31, created on 2018-07-30 09:15:43
  from "/home/s/santechsnab/public_html/manager/templates/default/element/tv/renders/input/richtext.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5b5ead0f133573_82072918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39143ce332eee164014019bf3b4e1125336883aa' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/element/tv/renders/input/richtext.tpl',
      1 => 1531325206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b5ead0f133573_82072918 (Smarty_Internal_Template $_smarty_tpl) {
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
