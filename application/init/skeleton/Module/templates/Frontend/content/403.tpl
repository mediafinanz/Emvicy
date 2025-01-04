<!doctype html>{* @see https://getbootstrap.com/docs/5.3/getting-started/introduction/ *}
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{$oDTRoutingAdditional->get_sTitle()}</title>
        <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="icon" href="/favicon.ico">
        <link rel="manifest" href="/site.webmanifest">

        <!--------------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/_style.tpl"}
        <!--------------------------------------------------------------------------------------------------------------------->
    </head>
    <body>

        {include file="Frontend/layout/menu.tpl"}

        {* @see https://getbootstrap.com/docs/5.3/migration/#jumbotron AND https://getbootstrap.com/docs/5.3/examples/jumbotron/*}
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


        {include file="Frontend/layout/footer.tpl"}
        {include file="Frontend/content/_noscript.tpl"}
        {include file="Frontend/content/_cookieConsent.tpl"}

        <!--------------------------------------------------------------------------------------------------------------------->
        {include file="Frontend/layout/_script.tpl"}
        <!--------------------------------------------------------------------------------------------------------------------->
    </body>
</html>
