<?php
App::uses('AppModel', 'Model');
/**
 * Training Model
 *
 * @property Team $Team
 */
class Training extends AppModel {

/*
 * static enum: Model::function()
 * @access static
 */
    public static function type($value = null) {
        $options = array(
            self::REST => __('Repos'),
            self::SHOOT => __('Tir'),
            self::_3POINTS => __('Tir à 3 points'),
            self::DRIBBLE => __('Dribble'),
            self::ASSIST => __('Assiste'),
            self::REBOUND => __('Rebond'),
            self::BLOCK => __('Contre'),
            self::STEAL => __('Interception'),
            self::DEFENSE => __('Défense'),
        );
        return parent::enum($value, $options);
    }
    
    const REST = 0;
    const SHOOT = 1;
    const _3POINTS = 2;
    const DRIBBLE = 3;
    const ASSIST = 4;
    const REBOUND = 5;
    const BLOCK = 6;
    const STEAL = 7;
    const DEFENSE = 8;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'weekday' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Team' => array(
			'className' => 'Team',
			'foreignKey' => 'team_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
