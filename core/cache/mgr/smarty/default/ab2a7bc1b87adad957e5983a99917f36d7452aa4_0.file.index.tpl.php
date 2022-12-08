<?php
/* Smarty version 3.1.31, created on 2019-08-16 14:20:21
  from "/home/s/santechsnab/public_html/manager/templates/default/browser/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5d5691751e6627_49472297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab2a7bc1b87adad957e5983a99917f36d7452aa4' => 
    array (
      0 => '/home/s/santechsnab/public_html/manager/templates/default/browser/index.tpl',
      1 => 1531325206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5691751e6627_49472297 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php if ($_smarty_tpl->tpl_vars['_config']->value['manager_direction'] == 'rtl') {?>dir="rtl"<?php }?> lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
" xml:lang="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_lang_attribute'];?>
">
<head>
<title>MODX :: <?php echo $_smarty_tpl->tpl_vars['_lang']->value['modx_resource_browser'];?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['_config']->value['modx_charset'];?>
" />


<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/resources/css/ext-all-notheme-min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
templates/default/css/index<?php if ($_smarty_tpl->tpl_vars['_config']->value['compress_css']) {?>-min<?php }?>.css" />

<?php if (isset($_smarty_tpl->tpl_vars['_config']->value['ext_debug']) && $_smarty_tpl->tpl_vars['_config']->value['ext_debug']) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all-debug.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php } else {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/adapter/ext/ext-base.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/ext3/ext-all.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php }
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['manager_url'];?>
assets/modext/core/modx.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['connectors_url'];?>
lang.js.php?ctx=mgr&topic=category,file,resource&action=<?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_GET['a']))===null||$tmp==='' ? '' : $tmp);?>
" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['_config']->value['connectors_url'];?>
modx.config.js.php?action=<?php echo (($tmp = @preg_replace('!<[^>]*?>!', ' ', $_GET['a']))===null||$tmp==='' ? '' : $tmp);
if ($_smarty_tpl->tpl_vars['_ctx']->value) {?>&wctx=<?php echo $_smarty_tpl->tpl_vars['_ctx']->value;
}?>" type="text/javascript"><?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->tpl_vars['maincssjs']->value;?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cssjs']->value, 'scr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['scr']->value) {
echo $_smarty_tpl->tpl_vars['scr']->value;?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>


<?php echo $_smarty_tpl->tpl_vars['rteincludes']->value;?>

</head>
<body>


<?php echo '<script'; ?>
 type="text/javascript">
Ext.onReady(function() {
    Ext.QuickTips.init();
    Ext.BLANK_IMAGE_URL = MODx.config.manager_url+'assets/ext3/resources/images/default/s.gif';
    <?php if ($_smarty_tpl->tpl_vars['rtecallback']->value) {?>
    MODx.onBrowserReturn = <?php echo $_smarty_tpl->tpl_vars['rtecallback']->value;?>
;<?php }?>
    MODx.ctx = "<?php if ($_smarty_tpl->tpl_vars['_ctx']->value) {
echo $_smarty_tpl->tpl_vars['_ctx']->value;
} else { ?>web<?php }?>";
    MODx.load({
       xtype: 'modx-browser-rte'
       ,auth: '<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
'
    });
});
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
