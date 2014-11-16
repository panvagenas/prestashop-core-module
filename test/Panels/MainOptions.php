<?php
/**
 * Project: coremodule
 * File: MainOptions.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 16/11/2014
 * Time: 9:00 μμ
 * Since: 141110
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test\Panels;


use XDaRk\Panels\Panel;

class MainOptions extends Panel{
	protected $tab = 0;
	protected $type = 'main';
	protected $title = 'XDaRk Options Main Panel';
	protected $image = false; // TODO set a default image
	protected $input = array();
	protected $submit = array(
		'title' => 'Save',
		'class' => 'button pull-right'
	);

	public function __construct($moduleInstance){
		parent::__construct($moduleInstance);
		$this->addTextField('Text Field', 'text')
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
		     ->addDateTimeField('Datetime Field', 'datetime');
	}
} 