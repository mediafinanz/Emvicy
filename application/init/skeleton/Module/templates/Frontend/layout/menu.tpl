{* @see https://getbootstrap.com/docs/5.3/components/navbar/ *}
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary shadow">
    <div class="container">
        <a class="navbar-brand" href="/">
            {MVC\Config::get_MVC_MODULE_PRIMARY_NAME()}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!--menu-->
            {App\Model\Menu::get('frontend')}

        </div>
    </div>
</nav>

{include file="Frontend/content/_maintenance.tpl"}
