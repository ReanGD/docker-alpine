<?php

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;
if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
 	$wgGroupPermissions['*']['read'] = true;
 	$wgGroupPermissions['*']['edit'] = true;
}else{
	$wgGroupPermissions['*']['edit'] = false;
	$wgGroupPermissions['*']['read'] = false;
}

############## Optimize ##############
// Отключение показов страниц счетчики.
$wgDisableCounters = true;
$wgMainCacheType = CACHE_ACCEL;
$wgMessageCacheType = CACHE_ACCEL;
// $wgMemCachedServers = [ '127.0.0.1:11211' ];

// # Text cache
// включение может вызывать проблемы (see https://www.mediawiki.org/wiki/Manual:$wgCompressRevisions)
$wgCompressRevisions = false; 
$wgRevisionCacheExpiry = 3 * 24 * 60 * 60; // 3 days
$wgParserCacheExpireTime = 60 * 24 * 60 * 60; // 60 days
$wgParserCacheType = CACHE_DB;

$wgResourceLoaderMaxage = array(
	'versioned' => array(
		// Squid/Varnish but also any other public proxy cache between the client and MediaWiki
		'server' => 60 * 24 * 60 * 60, // 60 days
		// On the client side (e.g. in the browser cache).
		'client' => 60 * 24 * 60 * 60, // 60 days
	),
	'unversioned' => array(
		'server' => 60 * 24 * 60 * 60, // 60 days
		'client' => 60 * 24 * 60 * 60, // 60 days
	),
);

$wgCacheDirectory = '/data/cache';

// Файловый кеш работает только для неавторизированных пользователей
$wgUseFileCache = false;
// $wgFileCacheDirectory = '/data/fcache';

// Кеширование ссылок в боковой панели навигации
$wgEnableSidebarCache = true;

// --------------------------
// $wgUseLocalMessageCache = true;
// $wgUseGzip = true;

// $wgShowIPinHeader = false;

// # NO DB HITS!
// $wgMiserMode = true;
// --------------------------



// # Diffs (defaults seem ok for Ubuntu and others)
// $wgDiff = 'C:/Server/xampp/htdocs/MW/bin/GnuWin32/bin/diff.exe';
// $wgDiff3 = 'C:/Server/xampp/htdocs/MW/bin/GnuWin32/bin/diff3.exe';

# Extensions

############## WikiEditor ##############
wfLoadExtension( 'WikiEditor' );
# Расширение включено по умолчанию, однако пользователь может отключить его в настройках.
$wgDefaultUserOptions['usebetatoolbar'] = 1;
# Enables link and table wizards by default but still allows users to disable them in preferences
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
# Показывает вкладки «Предпросмотра» и «Изменений»
$wgDefaultUserOptions['wikieditor-preview'] = 1;
# Показывает кнопки «Публикации» и «Отмены» справа сверху
$wgDefaultUserOptions['wikieditor-publish'] = 1;


############## VisualEditor ##############
// wfLoadExtension( 'VisualEditor' );
// Расширение включено по умолчанию для всех
$wgDefaultUserOptions['visualeditor-enable'] = 1;
// Показывать окно приветствия
$wgVisualEditorShowBetaWelcome = false;

// Optional: Set VisualEditor as the default for anonymous users
// otherwise they will have to switch to VE
// $wgDefaultUserOptions['visualeditor-editor'] = "visualeditor";

// Don't allow users to disable it
// $wgHiddenPrefs[] = 'visualeditor-enable';

// OPTIONAL: Enable VisualEditor's experimental code features
// $wgDefaultUserOptions['visualeditor-enable-experimental'] = 1;

$wgVirtualRestConfig['modules']['parsoid'] = array(
        // URL to the Parsoid instance
        'url' => 'http://127.0.0.1:8000',
        // Parsoid "domain" (optional)
        'domain' => '127.0.0.1'
        // Parsoid "prefix" (optional)
        // 'prefix' => 'wiki'
);

############## Other ##############
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );