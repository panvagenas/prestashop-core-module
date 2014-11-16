<?php
/**
 * Project: coremodule
 * File: SideBar.php
 * User: Panagiotis Vagenas <pan.vagenas@gmail.com>
 * Date: 16/11/2014
 * Time: 9:04 μμ
 * Since: TODO ${VERSION}
 * Copyright: 2014 Panagiotis Vagenas
 */

namespace Test\Panels;


use XDaRk\Panels\Panel;

class SideBar extends Panel{
	protected $tab = 0;
	protected $type = 'sidebar';
	protected $title = 'XDaRk Options Sidebar Panel';
	protected $image = false; // TODO set a default image
	protected $input = array();
	protected $submit = array();

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