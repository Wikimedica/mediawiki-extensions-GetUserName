<?php
/**
 * GetUserName main file.
 *
 * @file
 * @ingroup Extensions
 * @author Antoine Mercier-Linteau
 * @license GPL-2.0
 */

namespace MediaWiki\Extension\GetUserName;

/**
 * Extension class.
 * */
class GetUserName 
{
	/**
	 * Hook.
	 * */
	public static function onParserFirstCallInit( &$parser ) 
	{
		$parser->setFunctionHook('USERNAME', __CLASS__.'::magic' );
		return true;
	}
	
	/**
	 * Magic word handling method.
	 * */
	public static function magic( &$parser, $frame) 
	{
		$parser->getOutput()->updateCacheExpiry(0); // Disable cache.
		global $wgUser;
		return trim( $wgUser->getName() );
	}
}
