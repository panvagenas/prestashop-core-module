<?php
/**
 * Project: coremodule
 * File: Singleton.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:35 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;


if (!defined('_PS_VERSION_'))
	exit;

abstract class Singleton {


//	public function __get( $name ) {
//		if ( property_exists( $this, $name ) ) {
//			return $this->{$name};
//		}
//
//		$nsName = ( in_array( $name, Core::$instanceClasses ) ? Core::$instanceNamespace : __NAMESPACE__ ) . '\\' . $name;
//
//		if ( in_array( $name, Core::$classes ) ) {
//			$this->{$name} = new $nsName;
//			return $this->{$name};
//		} elseif ( in_array( $name, Core::$singletonClasses ) ) {
//			$this->{$name} = $nsName::getInstance();
//			return $this->{$name};
//		}
//
//		return null;
//	}

	/**
	 * Returns the *Singleton* instance of this class.
	 *
	 * @staticvar Singleton $instance The *Singleton* instances of this class.
	 *
	 * @return $this The *Singleton* instance.
	 */
	public static function getInstance() {
		static $instance = null;
		if (null === $instance) {
			$instance = new static();
		}

		return $instance;
	}

	/**
	 * Protected constructor to prevent creating a new instance of the
	 * *Singleton* via the `new` operator from outside of this class.
	 */
	protected function __construct() {
	}

	/**
	 * Private clone method to prevent cloning of the instance of the
	 * *Singleton* instance.
	 *
	 * @return void
	 */
	private function __clone() {
	}

	/**
	 * Private unserialize method to prevent unserializing of the *Singleton*
	 * instance.
	 *
	 * @return void
	 */
	private function __wakeup() {
	}
}