<?php
App::uses('AppModel', 'Model');
/**
 * PlayerName Model
 *
 * @property Country $Country
 */
class PlayerName extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
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
                'message' => 'Ce nom existe déjà dans ce pays.'
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
	
	public function getRandomName($country_id) {
		$count = Cache::read('nameCount' . $country_id);
		if($count === false) {
			$count = $this->find('count', array(
				'conditions' => array('country_id' => $country_id),
                'recursive' => -1,
                'fields' => 'name'
			));
			Cache::write('nameCount' . $country_id, $count);
		}
        $names = Cache::read('randomNames' . $country_id);
        if($names === false) {
            $names = $this->find('all', array(
                'conditions' => array('country_id' => $country_id),
                'recursive' => -1,
                'fields' => 'name'
            ));
            Cache::write('randomNames' . $country_id, $names);
        }
        $offset = mt_rand(0, $count-1);
		return $names[$offset]['PlayerName']['name'];
	}
}
