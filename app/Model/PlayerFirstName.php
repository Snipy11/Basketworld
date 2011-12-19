<?php
App::uses('AppModel', 'Model');
/**
 * PlayerFirstName Model
 *
 * @property Country $Country
 */
class PlayerFirstName extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'first_name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'unique' => array(
                'rule' => array('isUniqueInField', 'country_id'),
                'message' => 'Ce prénom existe déjà dans ce pays.'
            )
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function getRandomFirstName($country_id) {
		$count = Cache::read('firstNameCount' . $country_id);
		if($count === false) {
			$count = $this->find('count', array(
				'conditions' => array('country_id' => $country_id),
                'recursive' => -1,
                'fields' => 'first_name'
			));
			Cache::write('firstNameCount' . $country_id, $count);
		}
        $names = Cache::read('randomFirstNames' . $country_id);
        if($names === false) {
            $names = $this->find('all', array(
                'conditions' => array('country_id' => $country_id),
                'recursive' => -1,
                'fields' => 'first_name'
            ));
            Cache::write('randomFirstNames' . $country_id, $names);
        }
        $offset = mt_rand(0, $count-1);
		return $names[$offset]['PlayerFirstName']['first_name'];
	}
}
