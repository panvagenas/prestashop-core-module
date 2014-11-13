<?php
/**
 * Project: coremodule
 * File: Hooks.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:59 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test;

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

class Hooks extends \XDaRk\Hooks{
	public function xdRegisterHooks(\Module $module){
//		var_dump(__METHOD__);die;
	}

	public function hookDisplayHeader($params){
		var_dump(__METHOD__, $params);die;
	}

	public function hookDisplayRightColumn(){

	}
} 