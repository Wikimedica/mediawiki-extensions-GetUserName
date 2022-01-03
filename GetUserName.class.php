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

class GetUserName {
	/**
	 * @param Parser $parser
	 */
	public static function onParserFirstCallInit( $parser )	{
		$parser->setFunctionHook('USERNAME', __CLASS__.'::magic' );
	}

	/**
	 * Magic word handling method.
	 *
	 * @param Parser &$parser
	 * @param PPFrame $frame
	 */
	public static function magic( &$parser, $frame ) {
		$user = RequestContext::getMain()->getUser();
		// Disable cache
		$parser->getOutput()->updateCacheExpiry(0);
		return trim( $user->getName() );
	}
}
