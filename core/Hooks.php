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

namespace XDaRk;

if ( ! defined( '_PS_VERSION_' ) ) {
	exit;
}

class Hooks extends Singleton{
	public static $displayHooks = array(
		'displayFooter'
	);

	public static $actionHooks = array(
		'actionAdminMetaControllerUpdate_optionsBefore',
		'actionAdminMetaSave',
		'actionAuthentication',
		'actionBeforeAuthentication',
		'actionCartSave',
		'actionCustomerAccountAdd',
		'actionHtaccessCreate',
		'actionObjectCategoryDeleteAfter',
		'actionObjectCategoryUpdateAfter',
		'actionObjectCmsDeleteAfter',
		'actionObjectCmsUpdateAfter',
		'actionObjectManufacturerDeleteAfter',
		'actionObjectManufacturerUpdateAfter',
		'actionObjectProductDeleteAfter',
		'actionObjectProductUpdateAfter',
		'actionObjectSupplierDeleteAfter',
		'actionObjectSupplierUpdateAfter',
		'actionOrderDetail',
		'actionOrderReturn',
		'actionOrderSlipAdd',
		'actionOrderStatusPostUpdate',
		'actionOrderStatusUpdate',
		'actionPaymentCCAdd',
		'actionPaymentConfirmation',
		'actionSearch',
		'actionShopDataDuplication',
		'actionTaxManager',
		'actionUpdateQuantity',
		'actionValidateOrder',
		'actionWatermark',
	);

	public static function registerHooks( \Module $module, Hooks $class ) {
		$hooks = (array) get_class_methods( get_class($class) );
		$result = true;
		foreach ( $hooks as $hook ) {
			if(!self::isHookFunction($hook)) continue;

			$result &= (bool)$module->registerHook( ucfirst( ltrim( $hook, 'hook' ) ) );
		}

		return $result;
	}

	public static function isHookFunction($name){
		return preg_match('/^(hook)+/', $name);
	}
} 