<?php
/**
 * Project: coremodule
 * File: Form.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 8:35 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

/**
 * acswebservices
 * ${FILE_NAME}
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 11/11/2014
 * Time: 10:29 Ï€Î¼
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk;

if (!defined('_PS_VERSION_')) {
	exit;
}

class Form extends \HelperFormCore
{
	protected $default_lang;
	protected $initialized = false;
	protected $tab = 0;

	/**
	 * @param array $fieldValues
	 *
	 * @return $this
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function setFieldsValues(Array $fieldValues)
	{
		foreach ($this->fields_form as $k => $f) {
			if (isset($f['form']['input'])) {
				foreach ($f['form']['input'] as $ki => $fi) {
					if ($this->isMultiSelectField($fi) && isset($fieldValues[ rtrim($fi['name'], '[]') ])) {
						$this->fields_value[ $fi['name'] ] = $fieldValues[ rtrim($fi['name'], '[]') ];
						unset ($fieldValues[ rtrim($fi['name'], '[]') ]);
					} elseif (isset($fieldValues[ $fi['name'] ])) {
						$this->fields_value[ $fi['name'] ] = $fieldValues[ $fi['name'] ];
					}
				}
			}
		}

		array_merge($this->fields_value, $fieldValues);

		return $this;
	}

	/**
	 * @param $index
	 * @param $title
	 * @param $image
	 * @param string $submitTitle
	 * @param string $submitClass
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function setTab($index, $title, $image, $type='main',$submitTitle = 'Save', $submitClass = 'button pull-right')
	{
		$this->tab                                     = $index;
		$this->fields_form[ $index ]['form']['legend'] = array('title' => $title);
		if ($image) {
			$this->fields_form[ $index ]['form']['legend']['image'] = $image;
		}
		$this->fields_form[ $index ]['form']['submit'] = array(
			'title' => $submitTitle,
			'class' => $submitClass
		);
		$this->fields_form[ $index ]['type'] = $type;

		return $this;
	}


	/**
	 * @param array $fields_form
	 * @param array $fields_value
	 * @param \Module $module
	 *
	 * @return string
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function generateForm($fields_form = array(), $fields_value = array(), \Module $module = null)
	{
		if ((empty($fields_form) || empty($fields_value) || empty($module)) && $this->initialized) {
			$main = '';
			$sidebar = '';
			$fields_form = $this->fields_form;
			foreach ($fields_form as $k => $form) {
				if($form['type'] == 'sidebar'){
					$sidebar .= parent::generateForm(array($form));
				} else {
					$main .= parent::generateForm(array($form));
				}
			}

			return '<div class="row"><div class="col-lg-9">'.$main.'</div><div class="col-lg-3">'.$sidebar.'</div></div>';
		} else {
			$form = new Form($module);
			$form->initialize($module);
			$this->setFieldsForm($fields_form)->setFieldsValues($fields_value);

			return $form->generate();
		}
	}

	/**
	 * @param array $fieldsForm
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function setFieldsForm(Array $fieldsForm)
	{
		$this->fields_form = $fieldsForm;

		return $this;
	}

	/**
	 * @param $module
	 * @param int $startTab
	 * @param string $tabTitle
	 * @param bool $tabImage
	 * @param bool $bootstrap
	 * @param bool $title
	 * @param bool $showToolbar
	 * @param bool $toolBarScroll
	 * @param array $toolbarBtn
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function initialize($module, $startTab = 0, $tabTitle = 'General Options', $tabImage = false, $bootstrap = true, $title = false, $showToolbar = true, $toolBarScroll = true, $toolbarBtn = array())
	{
		$this->default_lang = (int) \Configuration::get('PS_LANG_DEFAULT');

		$this->module          = $module;
		$this->name_controller = $module->name;
		$this->token           = \Tools::getAdminTokenLite('AdminModules');
		$this->currentIndex    = \AdminController::$currentIndex.'&configure='.$module->name;
		$this->bootstrap       = $bootstrap;
//		$this->name_controller = 'col-lg-3';

		// Language
		$this->default_form_language    = $this->default_lang;
		$this->allow_employee_form_lang = $this->default_lang;

		// Title and toolbar
		$this->title          = $title === false ? $module->displayName : $title;
		$this->show_toolbar   = $showToolbar;        // false -> remove toolbar
		$this->toolbar_scroll = $toolBarScroll;      // yes - > Toolbar is always visible on the top of the screen.
		$this->submit_action  = 'submit'.$module->name;
		$this->toolbar_btn    =
			(empty($toolbarBtn) || !is_array($toolbarBtn))
				? array(
				'save' => array(
					'desc' => $module->l('Save'),
					'href' => \AdminController::$currentIndex.'&configure='.$module->name.'&save'.$module->name.
					          '&token='.\Tools::getAdminTokenLite('AdminModules'),
				),
				'back' => array(
					'href' => \AdminController::$currentIndex.'&token='.\Tools::getAdminTokenLite('AdminModules'),
					'desc' => $module->l('Back to list')
				)
			)
				: $toolbarBtn;

		$this->setTab($startTab, $tabTitle, $tabImage);

		$this->initialized = true;

		return $this;
	}
}