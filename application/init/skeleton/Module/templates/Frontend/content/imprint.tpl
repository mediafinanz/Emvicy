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

        {* @see https://getbootstrap.com/docs/5.3/examples/cheatsheet/ *}
        <div class="container py-4 shadow bg-white padding20">
            <div class="text-center">
                <h1 class="display-5 fw-bold">
                    {$oDTRoutingAdditional->get_sTitle()}
                </h1>
                <p class="fs-4">
                    {* @see https://fontawesome.com/icons/php?f=brands&s=solid *}
                    done by <img src="/favicon-32x32.png" style="border: none;margin-top: 5px;margin-right: 2px;"><b>Emvicy</b>, PHP <i class="fa-brands fa-php"></i> MVC Framework
                    <br>
                </p>
                <p>
                    <a class="btn btn-primary btn-lg" href="https://emvicy.com/" role="button" target="_blank">
                        see Documentation
                    </a>
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