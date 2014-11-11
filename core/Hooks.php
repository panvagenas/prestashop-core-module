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

class Hooks {
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

	public static function registerHooks( \Module $module ) {
		$hooks = array_diff( (array) get_class_methods( __CLASS__ ), array( __FUNCTION__ ) );

		foreach ( $hooks as $hook ) {
			$module->registerHook( ucfirst( ltrim( $hook, 'hook' ) ) );
		}
	}
} 