<!doctype html>{* @see https://getbootstrap.com/docs/5.3/getting-started/introduction/ *}
<!--403.tpl-->
<html lang="en">
    <head>
        {include file="Frontend/layout/_head.tpl"}
    </head>
    <body>

        <!------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/menu.tpl"}
        <!------------------------------------------------------------------------------------------------------------->

        {* @see https://getbootstrap.com/docs/5.3/examples/cheatsheet/ *}
        <div class="container py-4 shadow bg-white padding20">
            <div class="text-center">
                <h1 class="text-danger">403 - Forbidden</h1>
                <p>
                    You don't have permission to access the requested document
                </p>
            </div>
            <br>
            {include file="Frontend/content/_info.tpl"}
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
