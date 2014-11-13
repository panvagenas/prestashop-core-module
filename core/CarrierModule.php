<?php
/**
 * Project: coremodule
 * File: CarrierModule.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 14/11/2014
 * Time: 12:25 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

abstract class CarrierModule extends Module{
	abstract public function getOrderShippingCost($params, $shipping_cost);
	abstract public function getOrderShippingCostExternal($params);
} 