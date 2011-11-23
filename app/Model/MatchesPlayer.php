<?php
App::uses('AppModel', 'Model');
/**
 * MatchesPlayer Model
 *
 * @property Match $Match
 * @property Player $Player
 */
class MatchesPlayer extends AppModel {

/*
 * static enum: Model::function()
 * @access static
 */
    public static function positions($value = null) {
        $options = array(
            self::MENEUR => __('Meneur'),
            self::ARRIERE => __('Arrière'),
            self::AILIER_SHOOTER => __('Ailier shooter'),
            self::AILIER_FORT => __('Ailier fort'),
            self::PIVOT => __('Pivot'),
            self::RESERVE => __('Réserve'),
        );
        return parent::enum($value, $options);
    }
    
    const MENEUR = 0;
    const ARRIERE = 1;
    const AILIER_SHOOTER = 2;
    const AILIER_FORT = 3;
    const PIVOT = 4;
    const RESERVE = 5;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'position' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'play_time' => array(
			'time' => array(
				'rule' => array('time'),
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
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Player' => array(
			'className' => 'Player',
			'foreignKey' => 'player_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
