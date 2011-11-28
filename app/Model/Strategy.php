<?php
App::uses('AppModel', 'Model');
/**
 * Strategy Model
 *
 * @property Team $Team
 * @property Match $Match
 */
class Strategy extends AppModel {

/*
 * static enum: Model::function()
 * @access static
 */
    public static function type($value = null) {
        $options = array(
            self::PRESS => __('Pressing'),
            self::MANTOMAN => __('Man to man'),
            self::ZONE => __('Zone'),
            self::TRIANGLE => __('Triangle'),
            self::PICK => __('Pick'),
            self::QUICK => __('Quick'),
            self::_3POINTS => __('3 points'),
        );
        return parent::enum($value, $options);
    }
    
    const PRESS = 0;
    const MANTOMAN = 1;
    const ZONE = 2;
    const TRIANGLE = 3;
    const PICK = 4;
    const QUICK = 5;
    const _3POINTS = 6;


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
		),
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
