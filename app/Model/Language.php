<?php
App::uses('AppModel', 'Model');
/**
 * Language Model
 *
 * @property ActionDescription $ActionDescription
 */
class Language extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'language';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'language' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ActionDescription' => array(
			'className' => 'ActionDescription',
			'foreignKey' => 'language_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
