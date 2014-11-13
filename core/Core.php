<?php
/**
 * Project: coremodule
 * File: Core.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:19 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

class Core extends Singleton implements Constants {
	public static $singletonClasses = array(
		'Dir',
		'File',
		'Hooks',
		'Installer',
		'Options',
		'XML',
	);

	public static $classes = array(
		'Form'
	);

	public static $instanceClasses = array();



	public static $__REGEX_MATCH_ALL__ = '//';
	public static  $__REGEX_MATCH_PHP_FILES = '/^.+\.php$/i';
	public static $__REGEX_HOOK_FUNCTION = '/^(hook)+.+$/';
} 