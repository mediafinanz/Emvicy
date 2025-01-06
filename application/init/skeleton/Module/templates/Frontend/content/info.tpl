<!doctype html>{* @see https://getbootstrap.com/docs/5.3/getting-started/introduction/ *}
<!--info.tpl-->
<html lang="en">
    <head>
        {include file="Frontend/layout/_head.tpl"}
        {literal}
        <style type='text/css'>
            h1 {text-align: left !important;}
            h2 {text-align: left !important;}
            td.e {color: darkred;text-align: left !important;}
            hr {display: none;}
            .v {overflow-wrap: break-word;word-wrap: break-word;-ms-word-break: break-all;word-break: break-all;word-break: break-word;-ms-hyphens: auto;-moz-hyphens: auto;-webkit-hyphens: auto;hyphens: auto;text-align: left !important;
            }
        </style>
        {/literal}
    </head>
    <body>

        <!------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/menu.tpl"}
        <!------------------------------------------------------------------------------------------------------------->

        {* @see https://getbootstrap.com/docs/5.3/examples/cheatsheet/ *}
        <div class="container py-4 shadow bg-white padding20">
            <div class="text-center">

                {$oDTRoutingAdditional->get_sContent()}

            </div>
        </div>

        <!------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/footer.tpl"}
        {include file="Frontend/content/_noscript.tpl"}
        {include file="Frontend/content/_cookieConsent.tpl"}
        <!------------------------------------------------------------------------------------------------------------->

        <!------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/_script.tpl"}
        <!------------------------------------------------------------------------------------------------------------->
    </body>
</html>
