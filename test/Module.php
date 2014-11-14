<?php
/**
 * Project: coremodule
 * File: Module.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 13/11/2014
 * Time: 12:00 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test;

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
	 * @since TODO Enter Product ${VERSION}
	 */
	protected function xdGetContent()
	{
		return $this->Form->initialize($this, 0, 'Main Area')
		                  ->addTextField('Text Field', 'text')
		                  ->addMultiSelectField('Multiple Select Field', 'multi', array(
				                  array(
					                  'name'  => 'Some Option',
					                  'value' => 'some_option_value'
				                  ),
				                  array(
					                  'name'  => 'Another Option',
					                  'value' => 'another_option_value'
				                  )
			                  )
		                  )
		                  ->addDateField('Date Field', 'date')
		                  ->addDateTimeField('Datetime Field', 'datetime')
		                  ->setFieldsValues(array(
			                  'text'     => 'Default value',
			                  'multi'    => array('another_option_value'),
			                  'date'     => date('Y-m-d'),
			                  'datetime' => date('Y-m-d'),
		                  ))
			->setTab(1, 'Sidebar', false, 'sidebar')
			->addTextField('Text Field', 'text')
			->addMultiSelectField('Multiple Select Field', 'multi', array(
					array(
						'name'  => 'Some Option',
						'value' => 'some_option_value'
					),
					array(
						'name'  => 'Another Option',
						'value' => 'another_option_value'
					)
				)
			)
			->addDateField('Date Field', 'date')
			->addDateTimeField('Datetime Field', 'datetime')
			->setFieldsValues(array(
				'text'     => 'Default value',
				'multi'    => array('another_option_value'),
				'date'     => date('Y-m-d'),
				'datetime' => date('Y-m-d'),
			))
		                  ->generateForm();
	}
}

$GLOBALS['coremodule'] = array(
	'root_ns' => __NAMESPACE__,
	'var_ns'  => 'tst',
	'dir'     => dirname(dirname(__FILE__))
);