<?php
/* Smarty version 5.3.1, created on 2024-08-13 08:55:33
  from 'file:/var/www/html/modules/Foo/templates/Frontend/content/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66bb0365765fb3_55796838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad7813ae6ccae6e7da2edfe14281e5080c28a85b' => 
    array (
      0 => '/var/www/html/modules/Foo/templates/Frontend/content/index.tpl',
      1 => 1705494556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Frontend/content/info.tpl' => 1,
  ),
))) {
function content_66bb0365765fb3_55796838 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/modules/Foo/templates/Frontend/content';
?>
<div class="container py-4 shadow bg-white padding20">
    <div class="text-center">
        <h1 class="display-5 fw-bold">
            <?php echo $_smarty_tpl->getValue('oDTRoutingAdditional')->get_sTitle();?>

        </h1>
        <p class="fs-4">
                        done by <img src="/favicon-32x32.png" style="border: none;margin-top: 5px;margin-right: 2px;"><b>Emvicy</b>, PHP <i class="fa-brands fa-php"></i> MVC Framework
            <br>
        </p>
        <p>
            <a class="btn btn-primary btn-lg" href="https://emvicy.ueffing.net/" role="button" target="_blank">
                see Documentation
            </a>
        </p>
    </div>
    <br>
    <?php $_smarty_tpl->renderSubTemplate("file:Frontend/content/info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</div><?php }
}
