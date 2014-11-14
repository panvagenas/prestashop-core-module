<?php
/**
 * Project: coremodule
 * File: Options.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:36 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;


if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

class Options extends Core {
	/**
	 * @var string
	 */
	protected $optionsArrayName;

	/**
	 * @var array
	 */
	protected $defaults = array(
		'hooks' => array()
	);
	/**
	 * @var array
	 */
	protected $stored = array();

	/**
	 *
	 */
	public function __construct() {
		//parent::__construct();
		$this->optionsArrayName = Core::$instanceNamespace . '-Options';
		$this->init();
	}

	/**
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	protected function init() {
		$this->stored = unserialize( \Configuration::get( $this->optionsArrayName ) );

		if ( ! $this->stored || empty( $this->stored ) ) {
			$this->stored = $this->defaults;
			$this->saveOptions( $this->stored );
		}

		$this->stored = array_merge( $this->defaults, $this->stored );

		return $this;
	}

	/**
	 * @param $optionName
	 * @param bool $default
	 *
	 * @return mixed
	 * @throws \Exception
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function getValue( $optionName, $default = false ) {
		if ( ! isset( $this->defaults[ $optionName ] ) ) {
			throw new \Exception( 'No matching option' );
		}
		if ( $default ) {
			return $this->defaults[ $optionName ];
		}

		return isset( $this->stored[ $optionName ] ) ? $this->stored[ $optionName ] : $this->defaults[ $optionName ];
	}

	/**
	 * @param $newOptions
	 *
	 * @return bool
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function saveOptions( $newOptions ) {
		$this->stored = $this->validateOptions( $newOptions );

		return \Configuration::updateValue( $this->optionsArrayName, serialize( $this->stored ) );
	}

	/**
	 * TODO Implement this here or in extenders
	 *
	 * @param array $newOptions
	 *
	 * @return array
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	protected function validateOptions( Array $newOptions ) {
		return $newOptions;
	}

	/**
	 * @param bool $defaults
	 *
	 * @return array
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function getOptionsArray( $defaults = false ) {
		return $defaults ? $this->defaults : $this->stored;
	}
}