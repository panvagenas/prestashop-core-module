<?php
/**
 * Project: coremodule
 * File: Module.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 13/11/2014
 * Time: 12:00 πμ
 * Since: 141110
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test;

use Test\Panels\MainOptions;
use Test\Panels\SideBar;

require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Module.php';

class Module extends \XDaRk\Module
{
	/**
	 * TODO
	 * @var string Name of this plugin
	 */
	public $name = 'coremodule';
	/**
	 * TODO
	 * @var string Description
	 */
	public $description = 'Core Module Test For PrestaShop';
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
	public $ps_versions_compliancy = array('min' => '1.5');
	/**
	 * TODO
	 * @var array
	 */
	public $dependencies = array();
	/**
	 * TODO
	 * @var string
	 */
	public $displayName = 'XDaRk Core Module Test';
	/**
	 * TODO
	 * @var bool
	 */
	public $bootstrap = true;


	/**
	 * @return string
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since 141110
	 */
	protected function xdGetContent()
	{
		return $this->Form
			->registerPanel(new MainOptions($this))
			->registerPanel(new SideBar($this))
			->initialize($this)
			->generateForm($this->Options->getOptionsArray());

	}
}

$GLOBALS['coremodule'] = array(
	'root_ns' => __NAMESPACE__,
	'var_ns'  => 'tst',
	'dir'     => dirname(dirname(__FILE__))
);