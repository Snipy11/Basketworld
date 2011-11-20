<?php
App::uses('AppModel', 'Model');
/**
 * Transaction Model
 *
 * @property Team $Team
 */
class Transaction extends AppModel {


/*
 * static enum: Model::function()
 * @access static
 */
    public static function types($value = null) {
        $options = array(
            self::BILLETERIE => __('Billeterie'),
            self::SPONSORS => __('Sponsors'),
            self::SUBVENTION => __('Subventions'),
            self::BOUTIQUE => __('Boutique'),
            self::TRANSFERTS => __('Transferts'),
            self::DIVERS => __('Divers'),
            self::SALAIRES => __('Salaires'),
            self::PERSONNEL => __('Personnel'),
            self::ENTRETIEN => __('Entretien'),
            self::FORMATION => __('Formation'),
        );
        return parent::enum($value, $options);
    }
    
    const BILLETERIE = 0;
    const SPONSORS = 1;
    const SUBVENTION = 2;
    const BOUTIQUE = 3;
    const TRANSFERTS = 4;
    const DIVERS = 5;
    const SALAIRES = 6;
    const PERSONNEL = 7;
    const ENTRETIEN = 8;
    const FORMATION = 9;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'amount' => array(
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
