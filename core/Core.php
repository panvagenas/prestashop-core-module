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
		'Options'
	);

	public static $classes = array(
		'Form',
		'XML'
	);
} 