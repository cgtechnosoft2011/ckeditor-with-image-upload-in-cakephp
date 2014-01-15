<?php
/****************************************
***** For more information contact ******
*********** kkhatti@gmail.com ***********
****************************************/

App::uses('AppModel', 'Model');
class Page extends AppModel {

	public $primaryKey	= 'p_id'; 
	
	public $validate = array(
		'p_title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Title should not blank.'
			)
		),
		'p_desc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Description should not blank.'
			)
		),
		'p_status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' =>  'Status should not blank.'
			)
		)
	);
	
}
