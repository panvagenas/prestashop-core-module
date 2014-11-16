<?php
/**
 * Project: coremodule
 * File: Options.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 16/11/2014
 * Time: 11:16 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test;


class Options extends \XDaRk\Options{
	protected function setUp($defaults, $validators)
	{
		$testDefaults = array(
			'text'     => 'Default value',
			'multi'    => array('another_option_value'),
			'date'     => date('Y-m-d'),
			'datetime' => date('Y-m-d'),
		);

		$testValidators = array(
			'text'     => array('string:!empty'),
			'multi'    => array('array:!empty'),
			'date'     => array('string:date'),
			'datetime' => array('string:date'),
		);

		$defaults = array_merge($defaults, $testDefaults);
		$validators = array_merge($validators, $testValidators);

		$this->_setUp($defaults, $validators);
	}
} 