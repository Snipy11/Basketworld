<?php
App::uses('AppModel', 'Model');
/**
 * Rumor Model
 *
 * @property Division $Division
 * @property User $User
 */
class Rumor extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/*
 * static enum: Model::function()
 * @access static
 */
    public static function type($value = null) {
        $options = array(
            self::PRESS => __('Presse'),
            self::FAN => __('Fan'),
            self::PLAYER => __('Joueur'),
            self::COACH => __('Entraineur'),
        );
        return parent::enum($value, $options);
    }
    
    const PRESS = 0;
    const FAN = 1;
    const PLAYER = 2;
    const COACH = 3;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
