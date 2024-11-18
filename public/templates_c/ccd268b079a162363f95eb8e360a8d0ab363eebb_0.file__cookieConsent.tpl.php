<?php
/* Smarty version 5.3.1, created on 2024-08-13 08:56:55
  from 'file:/var/www/html/modules/Foo/templates/Frontend/content/_cookieConsent.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_66bb03b7f2d5b2_78434618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccd268b079a162363f95eb8e360a8d0ab363eebb' => 
    array (
      0 => '/var/www/html/modules/Foo/templates/Frontend/content/_cookieConsent.tpl',
      1 => 1705494556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66bb03b7f2d5b2_78434618 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/modules/Foo/templates/Frontend/content';
?><div id="Emvicy_cookieConsent">
    This website uses Cookies to provide you with the best possible service. Please see our <a href="#">Privacy Policy</a> for more information.
    Click the check box below to accept cookies.
    Then confirm with a click on "Save".
    <input id="Emvicy_cookieConsentCheckbox" type="checkbox" name="checked" value="0">&nbsp;<label for="Emvicy_cookieConsentCheckbox">Yes, cookies may be saved.</label>
    <button class="btn btn-warning">
        Save
    </button>
</div><?php }
}
