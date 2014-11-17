<?php
/**
 * Project: coremodule
 * File: Core.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:19 μμ
 * Since: 141110
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

if (!defined('_PS_VERSION_'))
	exit;

class Core implements Constants
{
	public static $singletonClasses = array();

	public static $classes = array(
//		'Dir',
//		'File',
//		'Hooks',
//		'Installer',
//		'Options',
//		'XML',
//		'Form',
	);

	public static $instanceClasses = array();

	public static $instanceNamespace;
	public static $instanceBaseDir;
	public static $instanceRootNSDir;


	public static $__REGEX_MATCH_ALL__ = '//';
	public static $__REGEX_MATCH_PHP_FILES = '/^.+\.php$/i';
	public static $__REGEX_HOOK_FUNCTION = '/^(hook)+.+$/';

	protected $moduleInstance;

	public function m()
	{
		var_dump(__METHOD__.' <- '.get_class($this));
	}

	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->{$name};
		}

		$nsName = (in_array($name, Core::$instanceClasses) ? Core::$instanceNamespace : __NAMESPACE__).'\\'.$name;

		if (in_array($name, Core::$instanceClasses)) {
			return $this->{$name} = new $nsName($this->moduleInstance, $this);
		} elseif (in_array($name, Core::$classes)) {
			return $this->{$name} = new $nsName($this->moduleInstance);
		} elseif (in_array($name, Core::$singletonClasses)) {
			return $this->{$name} = $nsName::getInstance();
		}

		return null;
	}

	/**
	 * Returns the *Singleton* instance of this class.
	 *
	 * @staticvar Singleton $instance The *Singleton* instances of this class.
	 *
	 * @return $this The *Singleton* instance.
	 */
	public static function getInstance(\Module &$moduleInstance)
	{
		static $instance = null;
		if (null === $instance) {
			$instance = new static($moduleInstance);
		}

		return $instance;
	}

	/**
	 * Protected constructor to prevent creating a new instance of the
	 * *Singleton* via the `new` operator from outside of this class.
	 */
	protected function __construct(\Module &$moduleInstance)
	{
		$this->moduleInstance = $moduleInstance;
	}

	/**
	 * Private clone method to prevent cloning of the instance of the
	 * *Singleton* instance.
	 *
	 * @return void
	 */
	private function __clone()
	{
	}

	/**
	 * Private unserialize method to prevent unserializing of the *Singleton*
	 * instance.
	 *
	 * @return void
	 */
	private function __wakeup()
	{
	}
} 