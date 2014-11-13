<?php
/**
 * Project: coremodule
 * File: Module.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 12/11/2014
 * Time: 9:55 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'XDAutoLoader.php';

/**
 * Class Module
 * @package XDaRk
 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
 * @since TODO Enter Product Version
 *
 * @property \XDaRk\Dir             Dir
 * @property \XDaRk\File            File
 * @property \XDaRk\Form            Form
 * @property \XDaRk\Hooks           Hooks
 * @property \XDaRk\Installer       Installer
 * @property \XDaRk\Options         Options
 * @property \XDaRk\XML             XML
 */
class Module extends \Module {
	/**
	 * @var string Name of this plugin
	 */
	public $name = 'coremodule';
	/**
	 * @var string Description
	 */
	public $description = 'Core Module For PrestaShop';
	/**
	 * @var string
	 */
	public $tab = 'others';
	/**
	 * @var string
	 */
	public $version = '141110';
	/**
	 * @var string
	 */
	public $author = 'Panagiotis Vagenas <pan.vagenas@gmail.com>';
	/**
	 * @var int
	 */
	public $need_instance = 0;
	/**
	 * @var array
	 */
	public $ps_versions_compliancy = array( 'min' => '1.5' );
	/**
	 * @var array
	 */
	public $dependencies = array();
	/**
	 * @var string
	 */
	public $displayName = 'XDaRk Core Module';
	/**
	 * @var bool
	 */
	public $bootstrap = true;
	/**
	 * @var XDAutoLoader
	 */
	protected $loader;
	/**
	 * @var Core
	 */
	public $core;

//	public function __call( $name, $args ) {
//		var_dump( __METHOD__, $name, $args );
//		die;
//	}

	function parse_classname ($name)
	{
		return array_slice(explode('\\', $name), 0, -1);
	}

	public function __get( $name ) {
//		if($this->parse_classname(get_class($this)) == 'Test') die;
		if ( property_exists( $this, $name ) ) {
			return $this->{$name};
		}

		if ( in_array( $name, Core::$classes ) ) {
			$nsName        = __NAMESPACE__ . '\\' . $name;
			$this->{$name} = new $nsName;

			return $this->{$name};
		} elseif ( in_array( $name, Core::$singletonClasses ) ) {
			$nsName        = __NAMESPACE__ . '\\' . $name;
			$this->{$name} = $nsName::getInstance();

			return $this->{$name};
		}

		return null;
	}

	/**
	 *
	 */
	public function __construct() {
		parent::__construct();

		$this->displayName      = $this->l( $this->displayName );
		$this->description      = $this->l( $this->description );
		$this->confirmUninstall = $this->l( 'Are you sure you want to uninstall?' );

		$this->loader = new XDAutoLoader();
		$this->loader->register();

		$this->xdRegisterNameSpaces();

		$this->core = Core::getInstance();
	}

	protected function xdRegisterNameSpaces() {
		return true;
	}

	/**
	 * Module options page
	 *
	 * @return string
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function getContent() {
		$output = null;

		// TODO We should load basic content functionality here

		return $output . $this->xdGetContent();
	}

	/**
	 * @extenders This should be used by extenders to display form fields
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdGetContent() {
		return '';
	}

	/**
	 * @return bool
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function install() {
		return parent::install() && $this->Installer->install();
	}

	/**
	 * @return bool
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function uninstall() {
		return parent::uninstall() && $this->Installer->uninstall();
	}
}