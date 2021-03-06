<?php
/**
 * 
 * This PHP entry point is deprecated. Please use wfLoadExtension() and the extension.json file
 * instead. See https://www.mediawiki.org/wiki/Manual:Extension_registration for more details.
 * 
 * @file
 * @author Antoine Mercier-Linteau
 * @license GPL 2.0
 */

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'GetUserName' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['getUserName'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for GetUserName extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the GetUserName extension requires MediaWiki 1.31+' );
}

if ( !defined( 'MEDIAWIKI' ) ) {
	die();
}