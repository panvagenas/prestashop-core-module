<?php
/**
 * Project: coremodule
 * File: coremodule.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 10/11/2014
 * Time: 11:40 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Core.php';

class CoreModule extends \XDaRk\Core {
	/**
	 * TODO
	 * @var string Name of this plugin
	 */
	public $name = 'coremodule';
	/**
	 * TODO
	 * @var string Description
	 */
	public $description = 'Core Module For PrestaShop';
	/**
	 * TODO
	 * @var string
	 */
	public $tab = 'others';
	/**
	 * TODO
	 * @var string
	 */
	public $version = '141110';
	/**
	 * TODO
	 * @var string
	 */
	public $author = 'Panagiotis Vagenas <pan.vagenas@gmail.com>';
	/**
	 * TODO
	 * @var int
	 */
	public $need_instance = 0;
	/**
	 * TODO
	 * @var array
	 */
	public $ps_versions_compliancy = array( 'min' => '1.5' );
	/**
	 * TODO
	 * @var array
	 */
	public $dependencies = array();
	/**
	 * TODO
	 * @var string
	 */
	public $displayName = 'XDaRk Core Module';
	/**
	 * TODO
	 * @var bool
	 */
	public $bootstrap = true;

	/**
	 * TODO
	 * Register module specific namespaces
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdRegisterNameSpaces() {
		$this->loader->addNamespace('\Test', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'test');
	}

	/**
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdGetContent() {
		return '';
	}

	/**
	 * TODO
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	public function xdInstall() {
		\Test\Hooks::registerHooks($this, \Test\Hooks::getInstance());
	}

	/**
	 * TODO
	 * @return bool
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdUninstall() {
		return true;
	}
}

