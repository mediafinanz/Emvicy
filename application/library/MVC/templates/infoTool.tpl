{nocache}
{*
application/library/MVC/templates/infoTool.tpl

colors
---------
blue: hsl(210,50%,50%)

<span class="myMvcToolbar-float-right"><small><a href="#myMvcToolbar_top">&uarr; top</a></small></span>
*}

{* value for css automatic generation parts *}
{$iStyleIteration=81}
<link href="/Emvicy/styles/EmvicyInfoTool.min.css" rel="stylesheet" type="text/css">
<style>
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#tab{$smarty.section.columns.iteration}:checked ~ figure .tab{$smarty.section.columns.iteration},
	{/section}
	{literal}
	#tab99:checked ~ figure .tab99 {display: block;}
	{/literal}
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#tab{$smarty.section.columns.iteration}:checked ~ navi label[for="tab{$smarty.section.columns.iteration}"],
	{/section}
	{literal}
	#tab99:checked ~ navi label[for="tab99"] {background: whitesmoke;color: #111;position: relative;border-bottom: none;}
	{/literal}
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#tab{$smarty.section.columns.iteration}:checked ~ navi label[for="tab{$smarty.section.columns.iteration}"]:after,
	{/section}
	{literal}
	#tab99:checked ~ navi label[for="tab99"]:after {content: "";display: block;position: absolute;height: 2px;width: 100%;background: whitesmoke;left: 0;bottom: -1px;}
	/**
     sub menu
     */
	{/literal}
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#subtab{$smarty.section.columns.iteration}:checked ~ figure .subtab{$smarty.section.columns.iteration},
	{/section}
	{literal}
	#subtab99:checked ~ figure .subtab99 {display: block;}
	{/literal}
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#subtab{$smarty.section.columns.iteration}:checked ~ navi label[for="subtab{$smarty.section.columns.iteration}"],
	{/section}
	{literal}
	#subtab99:checked ~ navi label[for="subtab99"] {background: whitesmoke;color: #111;position: relative;border-bottom: none;}
	{/literal}
	{section name=columns start=0 step=1 loop=$iStyleIteration}
	#subtab{$smarty.section.columns.iteration}:checked ~ navi label[for="subtab{$smarty.section.columns.iteration}"]:after,
	{/section}
	{literal}
	#subtab99:checked ~ navi label[for="subtab99"]:after {content: "";display: block;position: absolute;height: 2px;width: 100%;background: whitesmoke;left: 0;bottom: -1px;}
	{/literal}
	{literal}
	/*#myMvcToolbar pre {background-color: lightgray; font-family: monospace, monospace; padding: 2px 5px; border: 1px dashed #333}*/
	#myMvcToolbar pre {background-color: #333; font-family: monospace, monospace; padding: 2px 5px; border: none; color: whitesmoke;}
	{/literal}
</style>
<div id="myMvcToolbar" class="myMvcToolbar_expand">
	<div id="myMvcToolbar_head" class="myMvcToolbar_expand">
		<span>
			PHP {$aToolbar.sPHP}, Operating System {$aToolbar.sOS}, {if 'true' === getenv('IS_DDEV_PROJECT')}<mark>ddev {getenv('DDEV_VERSION')}</mark>, {/if}{$aToolbar.sEnvOfRequest}, Construction Time: {$aToolbar.sConstructionTime} s,
			<a href="https://emvicy.com/" target="_blank">Documentation</a>
		</span>
		<br>
		<span>{$aToolbar.sMyMvcVersion}, MVC_ENV={$aToolbar.sEnv}, MVC_UNIQUE_ID={$aToolbar.sUniqueId}, session_id()={$aToolbar.session_id}</span>
	</div>

	<!-- invisible action detection -->
	<input id="tab1" type="radio" name="tabs" />
	<input id="tab2" type="radio" name="tabs" />
	<input id="tab3" type="radio" name="tabs" />
	<input id="tab4" type="radio" name="tabs" />
	<input id="tab5" type="radio" name="tabs" />
	<input id="tab6" type="radio" name="tabs" />
	<input id="tab7" type="radio" name="tabs" />
	<input id="tab8" type="radio" name="tabs" />

	<!-- content -->
	<figure>
		<div class="tab1">

			<!-- invisible action detection -->
			<input id="subtab11" type="radio" name="subtabs1" checked="checked" />
			<input id="subtab12" type="radio" name="subtabs1" />
			<input id="subtab13" type="radio" name="subtabs1" />
			<input id="subtab14" type="radio" name="subtabs1" />
			<input id="subtab15" type="radio" name="subtabs1" />
			<input id="subtab16" type="radio" name="subtabs1" />
			<input id="subtab17" type="radio" name="subtabs1" />
			<input id="subtab18" type="radio" name="subtabs1" />

			<!-- menu -->
			<navi>
				<label for="subtab11">$_GET</label>
				<label for="subtab12">$_POST</label>
				<label for="subtab13">$_COOKIE</label>
				<label for="subtab14">$_REQUEST</label>
				<label for="subtab15">Session</label>
				<label for="subtab16">$_SERVER</label>
				<label for="subtab17">Environment</label>
				<label for="subtab18">Constants</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top"></a>

				<div class="subtab11">
					<p>
						{$aToolbar.aGet}
					</p>
				</div>
				<div class="subtab12">{$aToolbar.aPost}</div>
				<div class="subtab13">{$aToolbar.aCookie}</div>
				<div class="subtab14">{$aToolbar.aRequest}</div>
				<div class="subtab15">
					<h6>Overview</h6>
					<ul>
						<li><a href="#myMvcToolbar_Session_Status">Session Status</a></li>
						<li><a href="#myMvcToolbar_Session_Values">Session Values</a></li>
						<li><a href="#myMvcToolbar_Session_Rules">Session Activation Rules</a></li>
						<li><a href="#myMvcToolbar_Session_Options">Session Options</a></li>
						<li><a href="#myMvcToolbar_Session_Files">Session Files</a></li>
					</ul>

					<h6>Session Status
						<a id="myMvcToolbar_Session_Status"></a> 
					</h6>
					enabled: <code>{if "1" == MVC\Session::is()->enabled()}true{else}false{/if}</code>
					<pre>Session::is()->enabled()</pre>
					<b>Session ID</b><br>
					<code>{MVC\Session::is()->getSessionId()}</code>
					<pre>Session::is()->getSessionId()</pre>

					<h6>Session Values
						<a id="myMvcToolbar_Session_Values"></a> 
					</h6>
					<b>Namespace</b>
					<code>{MVC\Session::is()->getNamespace()}</code>
					<pre>Session::is()->getNamespace()</pre>

					<b>Values</b>
					<p>
						{$aToolbar.aSessionKeyValues}
					</p>
					<pre>Session::is()->getAll()
OR
$_SESSION['{MVC\Session::is()->getNamespace()}']</pre>

					<!------------------------------------------->

					<h6>Session Rules
						<a id="myMvcToolbar_Session_Rules"></a>
						<small>* = any</small>
					</h6>
					{assign var="aModuleConfig" value=MVC\Config::MODULE()}
					<p>
						<span class="text-success">Enable</span> Session explicitely for Controller:<br>
						{$aToolbar.aSessionRules.aEnableSessionForController}
					</p>
					<p>
						<span class="text-danger">Disable</span> Session explicitely for Controller:<br>
						{$aToolbar.aSessionRules.aDisableSessionForController}
					</p>
					<pre>Config::MODULE()['SESSION']
OR
Config::MODULE('{MVC\Config::get_MVC_MODULE_PRIMARY_NAME()}')['SESSION']</pre>

					<!------------------------------------------->

					<h6>Session Options <a id="myMvcToolbar_Session_Options"></a> </h6>
					<p>
						{$aToolbar.aSessionSettings.MVC_SESSION_OPTIONS}
					</p>
					<pre>Config::get_MVC_SESSION_OPTIONS()</pre>

					<h6>Session Files <a id="myMvcToolbar_Session_Files"></a> </h6>
					<p>
						{$aToolbar.aSessionFiles}
					</p>
				</div>
				<div class="subtab16">{$aToolbar.aServer}</div>
				<div class="subtab17">
					<h6>Overview</h6>
					<ul>
						<li><a href="#myMvcToolbar_getenv">getenv()</a></li>
						<li><a href="#myMvcToolbar_ENV">$_ENV</a></li>
					</ul>

					<h6>getenv() <a id="myMvcToolbar_getenv"></a> </h6>
					<p>
						{$aToolbar.aEnvGetenv}
					</p>

					<h6>$_ENV <a id="myMvcToolbar_ENV"></a> </h6>
					<p>
						{$aToolbar.aEnvEnv}
					</p>
				</div>
				<div class="subtab18">{$aToolbar.aConstant}</div>
			</figure>

		</div>
		<div class="tab2">

			<!-- invisible action detection -->
			<input id="subtab26" type="radio" name="subtabs2" />
			<input id="subtab24" type="radio" name="subtabs2" />
			<input id="subtab25" type="radio" name="subtabs2" />
			<input id="subtab23" type="radio" name="subtabs2" />
			<input id="subtab22" type="radio" name="subtabs2" checked="checked" />
			<input id="subtab21" type="radio" name="subtabs2" />

			<!-- menu -->
			<navi>
				<label for="subtab22">Request</label>
				<label for="subtab24">Routing</label>
				<label for="subtab23">Event</label>
				<label for="subtab25">Policy</label>
				<label for="subtab26">Config</label>
				<label for="subtab21">Core</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top2"></a>

				<div class="subtab26">
					<h6>Config Directories</h6>
					<b>Config Directory of primary Module</b><br>
					<code>
						{MVC\Config::get_MVC_MODULE_PRIMARY_CONFIG_DIR()}
					</code>
					<pre>Config::get_MVC_MODULE_PRIMARY_CONFIG_DIR()</pre>

					<b>Staging (develop|test|live) config Files Directory of primary Module</b><br>
					<code>
						{MVC\Config::get_MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR()}
					</code>
					<pre>Config::get_MVC_MODULE_PRIMARY_STAGING_CONFIG_DIR()</pre>

					<b>Config Directory of primary Module for <code>composer.json</code></b><br>
					<code>
						{MVC\Config::get_MVC_MODULE_PRIMARY_COMPOSER_DIR()}
					</code>
					<pre>Config::get_MVC_MODULE_PRIMARY_COMPOSER_DIR()</pre>

					<h6>Current Module Config</h6>
					<p>{$aToolbar.aModuleCurrentConfig}</p>
					<pre>Config::MODULE()</pre>

					<h6>Getter</h6>
					<br>
					<p>
						{foreach key=key item=aData from=$aToolbar.aConfig}
						<b>{$aData.sVar}</b><br>
					<code>{$aData.mResult|@print_r:true}</code>
					<pre>{$aData.sMethod}</pre>
					<hr>
					{/foreach}
					</p>
				</div>

				<div class="subtab21">
					<p>
						{$aToolbar.sMyMVCCore}
					</p>
					<pre>Config::get_MVC_CORE()</pre>

				</div>
				<div class="subtab22">
					<h6>Current Request Object</h6>
					<pre>{MVC\Request::in()|@print_r:true}</pre>
					<pre>Request::in()</pre>
					<br>

					<h6>Path <small>requested</small><a id="myMvcToolbar_Path"></a> </h6>
					<code>{$aToolbar.sRoutingPath|escape:"htmlall":"UTF-8"}</code>
					<pre>Request::in()->get_path()</pre>

					<h6>Path Param Array</h6>
					<code>
						{if true == empty($aToolbar.aPathParam)}
							...no path parameters
						{else}
							{$aToolbar.sPathParam}
						{/if}
					</code>
					<pre>Request::in()->get_pathParamArray();
Request::in()->get_pathParamArray()[ $sKey ]</pre>

					<h6>Query <small>requested</small><a id="myMvcToolbar_Query"></a> </h6>
					<code>
						{if '' === $aToolbar.sRoutingQuery}
							...no GET query
						{else}
							{$aToolbar.sRoutingQuery|unescape:"url"|escape:"htmlall":"UTF-8"}
						{/if}
					</code>
					<pre>Request::in()->get_query()</pre>
					<br>
				</div>

				<div class="subtab23">
					<h6>Overview</h6>
					<ul>
						<li><a href="#myMvcToolbar_BINDindex">Event Listener <code>Event::bind()</code></a></li>
						<li><a href="#myMvcToolbar_BINDname">Event Listener <code>Event::bind()</code> <small>group by event name</small></a></li>
						<li><a href="#myMvcToolbar_RUN">run()</a></li>
						<li><a href="#myMvcToolbar_DELETE">delete()</a></li>
					</ul>

					<h6>Event Listener <code>Event::bind()</code> <a id="myMvcToolbar_BINDindex"></a> </h6>
					<pre>
						{Emvicy\Emvicy::eventListener()}
					</pre>

					<i>get all bonded</i><br>
					<pre>Config::get_MVC_EVENT()['BIND'];</pre>

					<i><code>bind</code> to an event</i><br>
					<pre>Event::bind('event.name', \Closure $oClosure, $oObject = NULL);</pre>

					<h6>Event Listener <code>Event::bind()</code> <small>group by event name</small> <a id="myMvcToolbar_BINDname"></a> </h6>
					<p>
						{$aToolbar.aEventBINDNAME}
					</p>

					<i>get all bonded</i><br>
					<pre>Config::get_MVC_EVENT()['BIND'];</pre>

					<i><code>bind</code> to an event</i><br>
					<pre>Event::bind('event.name', \Closure $oClosure, $oObject = NULL);</pre>

					<h6>run() <a id="myMvcToolbar_RUN"></a> </h6>
					<p>
						{$aToolbar.aEventRUN}
					</p>

					<i>get all events run</i><br>
					<pre>Config::get_MVC_EVENT()['RUN'];</pre>

					<i><code>run</code> an event</i><br>
					<pre>Event::run('event.name', DTArrayObject::create());</pre>

					<h6>delete() <a id="myMvcToolbar_DELETE"></a> </h6>
					{if !empty($aToolbar.aEventDELETE)}
						<p>
							{$aToolbar.aEventDELETE}
						</p>
					{/if}
					<pre>Event::delete('event.name');</pre>
				</div>
				<div class="subtab24">
					<h6>Current Route <a id="myMvcToolbar_Routing"></a> </h6>
					<pre>{MVC\Route::getCurrent()|@print_r:true}</pre>
					<i>object</i>
					<pre>MVC\Route::getCurrent()</pre>
					<i>array</i>
					<pre>Route::getCurrent()->getPropertyArray()</pre>

					<hr>

					<h6>All Routes</h6>
					<i>array</i> - paths only
					<pre>array_keys(Route::$aRoute)</pre>
					<i>array</i> - full information
					<pre>Route::$aMethodRoute</pre>

					<i>get markdown Routes List</i>
					<pre>$sRouteListMarkdown = Emvicy\Emvicy::routes('list', true);</pre>

					<i>get markdown Routes List converted into HTML (as shown below)</i>
					<pre>$sRouteListHtml = \Parsedown::instance()->text(Emvicy\Emvicy::routes('list', true));</pre>
					<hr>

					{assign var=sRouteList value=Parsedown::instance()->text(Emvicy\Emvicy::routes('list', true))}
					<div class="table-responsive">{str_replace('<table>','<table class="table table-hover table-sm table-responsive" style="font-size: 10px;">', $sRouteList)}</div>
					<hr>

					<h6>Target Controller method <a id="myMvcToolbar_Target"></a> </h6>
					{*					<p>\{$aToolbar.aRouting.sModule}\Controller\{$aToolbar.aRouting.sController}::{$aToolbar.aRouting.sMethod}({$aToolbar.aRouting.sArg|escape:"htmlall":"UTF-8"})	</p>*}
					{if isset($aToolbar.aRouting.aRoutingCurrent.class)}
						<code>\{$aToolbar.aRouting.aRoutingCurrent.class}::{$aToolbar.aRouting.aRoutingCurrent.method}()</code>
						<pre>Route::getCurrent()->get_class()  ::  Route::getCurrent()->get_method()</pre>
					{else}
						<code>unknown</code>
					{/if}
					<br>
				</div>
				<div class="subtab25">
					<h6>Overview</h6>
					<ul>
						<li><a href="#myMvcToolbar_RULES">Policy Rules</a></li>
						<li><a href="#myMvcToolbar_APPLIED">Policy Rules actually applied</a></li>
					</ul>

					<h6>Policy Rules <a id="myMvcToolbar_RULES"></a> </h6>
					<p>
						{$aToolbar.aPolicy.aRule}
					</p>
					<pre>Policy::getRules()</pre>

					<h6>Policy Rules actually applied <a id="myMvcToolbar_APPLIED"></a> </h6>
					<p>
						{$aToolbar.aPolicy.aApplied}
					</p>
					<pre>Policy::getRulesApplied()</pre>
				</div>
			</figure>
		</div>
		<div class="tab3">

			<!-- invisible action detection -->
			<input id="subtab31" type="radio" name="subtabs3" checked="checked" />
			<input id="subtab32" type="radio" name="subtabs3" />
			<input id="subtab33" type="radio" name="subtabs3" />

			<!-- menu -->
			<navi>
				<label for="subtab31">Template</label>
				<label for="subtab32">Smarty Template Vars</label>
				<label for="subtab33">Rendered</label>
			</navi>

			<!-- content -->
			<figure style="width: 1000px;">

				<a id="myMvcToolbar_top"></a>

				<div class="subtab31">
					<!-------------------------------------------------------->
					<h6>Current View</h6>
					{assign var=oViewCurrent value=MVC\Config::get_MVC_MODULE_PRIMARY_VIEW()}
					<code>{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}</code>
					<br>
					<i>ClassName</i>
					<pre>get_class(Config::get_MVC_MODULE_PRIMARY_VIEW())</pre>
					<i>Object</i>
					<pre>Config::get_MVC_MODULE_PRIMARY_VIEW()</pre>
					<!-------------------------------------------------------->
					<h6>Smarty caching</h6>
					current state: <code>{MVC\Convert::boolToString($smarty_caching_status)}</code>
					<pre>view()->caching</pre>
					<pre>\MVC\Config::get_MVC_MODULE_PRIMARY_VIEW()->caching</pre>
					<!-------------------------------------------------------->
					<h6>Template Folder</h6>
					<code>
						{MVC\Config::get_MVC_VIEW_TEMPLATE_DIR()|escape:'htmlall'}
					</code>
					<pre>\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->sTemplateDir</pre>

					<h6>Template Files</h6>
					<b>Current Template relative</b><br>
					<code>
						{$oViewCurrent->sTemplateRelative}
					</code>
					<pre>\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->sTemplateRelative</pre>

					<b>Current Template absolute</b><br>
					<code>
						{$oViewCurrent::init()->sTemplate}
					</code>
					<pre>\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->sTemplate</pre>

					<b>Default Template</b><br>
					<code>{MVC\View::getSmartyTemplateDefault()}</code>
					<pre>View::getSmartyTemplateDefault()</pre>
					<!-------------------------------------------------------->
					<h6>Template Content</h6>
					<div class="padding5" style="font-size: 14px; background-color: #EFEFEF;">
						{$aToolbar.sTemplateContent}
					</div>
					<pre>file_get_contents(\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->sTemplate, true)</pre>
				</div>
				<div class="subtab32">
					<p>{$aToolbar.sSmartyTemplateVars}</p>
					<pre>\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->getTemplateVars()</pre>
				</div>
				<div class="subtab33">
					<div class="padding5" style="font-size: 14px;background-color: #EFEFEF;">
						{$aToolbar.sRenderedHighlight}
					</div>
					<pre>\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->fetch('string:' . file_get_contents(\{get_class(MVC\Config::get_MVC_MODULE_PRIMARY_VIEW())}::init()->sTemplate))</pre>
				</div>
			</figure>
		</div>
		<div class="tab4">

			<!-- invisible action detection -->
			<input id="subtab41" type="radio" name="subtabs4" checked="checked" />

			<!-- menu -->
			<navi>
				<label for="subtab41">Files loaded</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top"></a>

				<div class="subtab41">
					<h6>MVC_BASE_PATH</h6>
					<code>
						{$aToolbar.aRegistry.MVC_BASE_PATH|escape:'htmlall'}
					</code>
					<pre>Config::get_MVC_BASE_PATH()</pre>

					<h6>Files</h6>
					<ol class="prettyprint">
						{foreach key=key item=item from=$aToolbar.aFilesIncluded}
							<li>{$item|replace:$aToolbar.aRegistry.MVC_BASE_PATH:''|escape:'htmlall'}</li>
						{/foreach}
					</ol>
					<pre>get_required_files()</pre>
				</div>
			</figure>
		</div>
		<div class="tab5">

			<!-- invisible action detection -->
			<input id="subtab51" type="radio" name="subtabs5" checked="checked" />

			<!-- menu -->
			<navi>
				<label for="subtab51">Files loaded</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top"></a>

				<div class="subtab51">
					<b>Real Memory Usage</b>: <code>{$aToolbar.aMemory.iRealMemoryUsage} KB</code><br />
					<b>Memory Usage</b>: <code>{$aToolbar.aMemory.dMemoryUsage} KB</code><br />
					<b>Memory Peak Usage</b>: <code>{$aToolbar.aMemory.dMemoryPeakUsage} KB</code><br />
				</div>
			</figure>
		</div>
		<div class="tab6">

			<!-- invisible action detection -->
			<input id="subtab61" type="radio" name="subtabs6" checked="checked" />

			<!-- menu -->
			<navi>
				<label for="subtab61">Registry</label>
			</navi>

			<!-- content -->
			<figure style="width: 1000px;">

				<a id="myMvcToolbar_top"></a>

				<div class="subtab61">
					<p>{$aToolbar.sRegistry}</p>
					<pre>Registry::getStorageArray()</pre>
				</div>
			</figure>
		</div>
		<div class="tab7">

			<!-- invisible action detection -->
			<input id="subtab71" type="radio" name="subtabs7" checked="checked" />

			<!-- menu -->
			<navi>
				<label for="subtab71">Cache</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top"></a>

				<div class="subtab71">
					<h6>Cache Folder</h6>
					<code>
						{$aToolbar.aRegistry.MVC_CACHE_DIR}
					</code>
					<pre>Config::get_MVC_CACHE_DIR()</pre>

					<h6>Cache Files</h6>
					<p>
						{$aToolbar.aCache}
					</p>
				</div>
			</figure>
		</div>
		<div class="tab8">

			<!-- invisible action detection -->
			<input id="subtab81" type="radio" name="subtabs8" checked="checked" />

			<!-- menu -->
			<navi>
				<label for="subtab81">E_*</label>
			</navi>

			<!-- content -->
			<figure>

				<a id="myMvcToolbar_top"></a>

				<div class="subtab81">
					<ul class="list-group">
						{foreach key=key item=oDTArrayObject from=$aToolbar.aError}
							<li class="text-break list-group-item bg-transparent">
								{assign var="oErrorException" value=$oDTArrayObject->getDTKeyValueByKey('$oException')->get_sValue()}
								<b class="text-primary">{MVC\Error::$aExceptionTranslation[$oErrorException->getCode()]}</b> ({$oErrorException->getCode()})
								<br>
								File: <span class="text-danger-emphasis">{$oErrorException->getFile()}</span><br>
								Line: <span class="text-danger-emphasis">{$oErrorException->getLine()}</span><br>
								Message: <span class="text-danger"><i>{$oErrorException->getMessage()}</i></span>
								</span>
							</li>
						{/foreach}
					</ul>
				</div>
			</figure>
		</div>
	</figure>

	<!-- Main menu -->
	<navi>
		<label for="tab2">
			<i class="fa fa-cube"></i> Emvicy
		</label>
		<label for="tab1">
			<i class="fa fa-cubes"></i> Variables
		</label>
		<label for="tab3">
			<i class="fa fa-code"></i> View
		</label>
		<label for="tab6">
			<i class="fa fa-key"></i> Registry
		</label>
		<label for="tab7">
			<i class="fa fa-refresh"></i> Cache
		</label>
		<label for="tab4">
			<i class="fa fa-file"></i> Files
		</label>
		<label for="tab5">
			<i class="fa fa-bar-chart"></i> Memory
		</label>
		{if !empty($aToolbar.aError)}
			<label for="tab8" class="myMvcToolbar-bg-primaryx" style="position: relative;">
				<i class="fa fa-warning myMvcToolbarBlinkx"></i> E_* <sup>({count($aToolbar.aError)})</sup>
			</label>
		{/if}
		<label id="myMvcToolbar_toggle" class="myMvcToolbar-bg-info" title="toggle"><b>&larr;&rarr;</b></label>
	</navi>
</div>
<script src="/Emvicy/scripts/EmvicyInfoTool.min.js" type="text/javascript"></script>
{/nocache}