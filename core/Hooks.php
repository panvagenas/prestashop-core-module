<?php
/**
 * Project: coremodule
 * File: Hooks.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:59 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

class Hooks extends Singleton{
	public static function registerHooks( \Module $module, Hooks $class ) {
		$hooks = (array) get_class_methods( get_class($class) );
		$result = true;
		foreach ( $hooks as $hook ) {
			if(!self::isHookFunction($hook)) continue;

			$result &= (bool)$module->registerHook( ucfirst( ltrim( $hook, 'hook' ) ) );
		}

		return $result;
	}

	public static function isHookFunction($name){
		return preg_match('/^(hook)+/', $name);
	}
} 