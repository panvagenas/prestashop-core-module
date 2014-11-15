<?php
/**
 * Project: coremodule
 * File: Panel.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 15/11/2014
 * Time: 9:09 πμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace XDaRk\Panels;

use XDaRk\Core;

if (!defined('_PS_VERSION_'))
	exit;


class Panel extends Core
{
	protected $tab = 0;
	protected $fields = array();

	/**
	 * @param $label
	 * @param $name
	 * @param bool $required
	 * @param bool $hint
	 * @param string $class
	 * @param bool $description
	 *
	 * @param bool $prefix
	 * @param bool $suffix
	 *
	 * @param string $type
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function addTextField($label, $name, $required = true, $hint = false, $class = '', $description = false, $prefix = false, $suffix = false, $type = 'text')
	{
		$f = array(
			'type'     => $type,
			'label'    => $label,
			'name'     => $name,
			'class'    => $class,
			'required' => $required,
		);
		if ($hint !== false)
			$f['hint'] = $hint;

		if ($description !== false)
			$f['description'] = $description;

		if ($prefix !== false)
			$f['prefix'] = $prefix;

		if ($suffix !== false)
			$f['suffix'] = $suffix;

		$this->addField($f);

		return $this;
	}

	public function addHiddenField($name)
	{
		$f = array(
			'type' => 'hidden',
			'name' => $name,
		);
		$this->addField($f);

		return $this;
	}

	public function addPasswordField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'password');
	}

	public function addFileField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		// TODO File options, check parent
		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'datetime');
	}

	public function addDateField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		$class .= ' datepicker';

		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'date');
	}

	public function addDateTimeField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		$class .= ' datepicker';

		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'datetime');
	}

	public function addTextAreaField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'textarea');
	}

	public function addColorField($label, $name, $class = '', $required = true, $hint = false, $description = false, $prefix = false, $suffix = false)
	{
		return $this->addTextField($label, $name, $required, $hint, $class, $description, $prefix, $suffix, 'color');
	}

	/**
	 * @param $label
	 * @param $name
	 * @param string $class
	 * @param array $options
	 * @param bool $required
	 * @param bool $hint
	 * @param bool $description
	 * @param string $optionId
	 * @param string $optionName
	 *
	 * @param bool $prefix
	 * @param bool $suffix
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function addSelectField($label, $name, Array $options, $required = true, $hint = false, $class = '', $description = false, $optionId = 'id_option', $optionName = 'name', $prefix = false, $suffix = false)
	{
		$f = array(
			'type'     => 'select',
			'label'    => $label,
			'name'     => $name,
			'class'    => $class,
			'required' => $required,
			'options'  => array(
				'query' => $options,
				'id'    => $optionId,
				'name'  => $optionName
			)
		);
		if ($hint !== false) {
			$f['hint'] = $hint;
		}
		if ($description !== false) {
			$f['description'] = $description;
		}
		if ($prefix !== false) {
			$f['prefix'] = $prefix;
		}
		if ($suffix !== false) {
			$f['suffix'] = $suffix;
		}
		$this->addField($f);

		return $this;
	}

	/**
	 * @param $label
	 * @param $name
	 * @param array $options
	 * @param bool $required
	 * @param bool $hint
	 * @param string $class
	 * @param bool $description
	 * @param string $optionValueName
	 * @param string $optionName
	 *
	 * @param bool $prefix
	 * @param bool $suffix
	 *
	 * @internal param string $optionId
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function addMultiSelectField($label, $name, Array $options, $required = false, $hint = false, $class = '', $description = false, $optionValueName = 'value', $optionName = 'name', $prefix = false, $suffix = false)
	{
		$f = array(
			'type'     => 'select',
			'label'    => $label,
			'name'     => $name.'[]',
			'class'    => $class,
			'required' => $required,
			'multiple' => true,
			'options'  => array(
				'query' => $options,
				'id'    => $optionValueName,
				'name'  => $optionName
			)
		);
		if ($hint !== false) {
			$f['hint'] = $hint;
		}
		if ($description !== false) {
			$f['description'] = $description;
		}
		if ($prefix !== false) {
			$f['prefix'] = $prefix;
		}
		if ($suffix !== false) {
			$f['suffix'] = $suffix;
		}
		$this->addField($f);

		return $this;
	}

	/**
	 * @param $label
	 * @param $name
	 * @param string $class
	 * @param array $values
	 * @param bool $required
	 * @param bool $isBool
	 * @param bool $hint
	 * @param bool $description
	 *
	 * @param bool $prefix
	 * @param bool $suffix
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function addSwitchField(
		$label,
		$name,
		Array $values,
		$required = true,
		$isBool = true,
		$hint = false,
		$class = '',
		$description = false,
		$prefix = false,
		$suffix = false
	) {
		$f = array(
			'type'     => 'select',
			'label'    => $label,
			'name'     => $name,
			'class'    => $class,
			'required' => $required,
			'is_bool'  => $isBool,
			'values'   => $values
		);
		if ($hint !== false)
			$f['hint'] = $hint;

		if ($description !== false)
			$f['description'] = $description;

		if ($prefix !== false)
			$f['prefix'] = $prefix;

		if ($suffix !== false)
			$f['suffix'] = $suffix;

		$this->addField($f);

		return $this;
	}



	/**
	 * @param $field
	 *
	 * @return bool
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	protected function isMultiSelectField($field)
	{
		return is_array($field) && isset($field['multiple']) && $field['multiple'] === true;
	}



	/**
	 * @param $field
	 *
	 * @return $this
	 *
	 * @author Panagiotis Vagenas <pan.vagenas@gmail.com>
	 * @since ${VERSION}
	 */
	public function addField($field)
	{
		if (!isset($this->fields) || !is_array($this->fields)) {
			$this->fields = array();
		}
		if (!isset($this->fields['form']) || !is_array($this->fields['form'])) {
			$this->fields['form'] = array();
		}
		if (!isset($this->fields['form']['input']) || !is_array($this->fields['form']['input'])) {
			$this->fields['form']['input'] = array();
		}
		array_push($this->fields['form']['input'], $field);

		return $this;
	}
} 