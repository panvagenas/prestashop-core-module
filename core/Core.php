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

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'XDAutoLoader.php';

class Core extends \Module{
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
	 *
	 */
	public function __construct() {
		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l( $this->displayName );
		$this->description = $this->l( $this->description );
		$this->confirmUninstall = $this->l( 'Are you sure you want to uninstall?' );

		$this->loader = new XDAutoLoader();
		$this->loader->register();
		$this->xdRegisterNameSpaces();
	}

	protected function xdRegisterNameSpaces(){

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
		if ( parent::install() == false ) {
			return false;
		}

		return $this->xdInstall();
	}

	/**
	 * @extenders Extenders should use this for custom install functionality
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdInstall(){
		return true;
	}

	/**
	 * @return bool
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function uninstall() {
		if ( ! parent::uninstall()) {
			return false;
		}

		return $this->xdUninstall();
	}

	/**
	 * @extenders Extenders should use this for custom uninstall functionality
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdUninstall(){
		return true;
	}
} 