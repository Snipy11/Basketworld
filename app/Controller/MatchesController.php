<?php
App::uses('AppController', 'Controller');
/**
 * Matches Controller
 *
 * @property Match $Match
 */
class MatchesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('lastResults');
    }
    

/**
 * index method
 *
 * @return void
 */
	public function index() {
	    $team_id = $this->Auth->user('team_id');
	    $start_date = $this->Match->HomeTeam->Division->Season->field('Season.start_date', array(
		'Season.start_date <=' => date('Y-m-d', strtotime('now'))
	    ),
	    'start_date DESC');
	    $this->paginate = array(
		'conditions' => array(
		    'Match.start_date >=' => $start_date,
		    'OR' => array(
			'Match.home_team_id' => $team_id,
			'Match.visitor_team_id' => $team_id
		    )	
		),
		'fields' => array('HomeTeam.id', 'VisitorTeam.id', 'HomeTeam.name', 'VisitorTeam.name', 'start_date',
		    'home_points', 'visitor_points', 'type')
	    );
	    $this->set('matches', $this->paginate('Match'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		$this->set('match', $this->Match->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Match->create();
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.'));
			}
		}
		$homeTeams = $this->Match->HomeTeam->find('list');
		$visitorTeams = $this->Match->VisitorTeam->find('list');
		$this->set(compact('homeTeams', 'visitorTeams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Match->save($this->request->data)) {
				$this->Session->setFlash(__('The match has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Match->read(null, $id);
		}
		$homeTeams = $this->Match->HomeTeam->find('list');
		$visitorTeams = $this->Match->VisitorTeam->find('list');
		$this->set(compact('homeTeams', 'visitorTeams'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Match->id = $id;
		if (!$this->Match->exists()) {
			throw new NotFoundException(__('Invalid match'));
		}
		if ($this->Match->delete()) {
			$this->Session->setFlash(__('Match deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Match was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function next()
    {
        if(!$this->request->params['requested']) {
            throw new MethodNotAllowedException(__('Cette requête n\'est pas valable.'));
        }
        $conditions = array(
            'start_date >=' => date('Y-m-d', strtotime('now')),
            'OR' => array(
                'home_team_id' => $this->request->params['named']['team'],
                'visitor_team_id' => $this->request->params['named']['team']
            )
        );
        $next_match = $this->Match->find('first', array(
            'conditions' => $conditions,
            'order' => 'Match.start_date'
        ));
        return compact('next_match');
    }
    
    public function lastResults() {
        if(!$this->request->params['requested']) {
            throw new MethodNotAllowedException(__('Cette requête n\'est pas valable.'));
        }
        // piece of subQuery to find the latest matches played.
        $db = $this->Match->getDataSource();
        $subQuery = $db->buildStatement(array(
            'fields' => array('MAX(Last_match.start_date) AS last_date'),
            'table' => $db->fullTableName($this->Match),
            'alias' => 'Last_match',
            'conditions' => array('NOT' => array('Last_match.home_points' => null)),
            'order' => '',
            'limit' => '',
            'group' => ''
        ), $this->Match);
        $france_country_id = $this->Match->HomeTeam->Division->Country->field('id', array(
            'country' => 'France'
        ));
        $last_matches = $this->Match->find('all', array(
            'joins' => array(
                array(
                    'table' => "($subQuery)",
                    'alias' => 'Last_m',
                    'type' => 'INNER',
                    'conditions' => array('Last_m.last_date = Match.start_date')
                ),
            ),
            'contain' => array('HomeTeam' => array(
                'fields' => array('HomeTeam.id', 'HomeTeam.name'),
                'Division' => array(
                    'fields' => array('Division.hierarchy', 'Division.country_id'),
                    'conditions' => array('Division.hierarchy' => 1, 'Division.country_id' => $france_country_id)
                )),
                'VisitorTeam' => array(
                    'fields' => array('VisitorTeam.name')
                )
            )
        ));
        return compact('last_matches');
    }
    
    
    
/**
 * simulate method
 * 
 * 
 * @return void
 */
    public function simulate($id = null) {
        $this->Match->id = $id;
        if (!$this->Match->exists()) {
            throw new NotFoundException(__('Invalid match'));
        }
        $match = $this->Match->find('first', array(
                'contain' => array(
                    'HomeTeam',
                    'VisitorTeam'
                ),
                'conditions' => array('Match.id' => $id)
            ));
        //Check if each team has chosed their players for this match
        $this->Match->PlayersInMatch->unbindModel(array('belongsTo' => array('PlayersTeam')));
        $this->Match->PlayersInMatch->bindModel(array(
            'hasOne' => array(
            'PlayersTeam' => array(
                'foreignKey' => false,
                'conditions' => array('PlayersTeam.id = PlayersInMatch.players_team_id')
            ),
            'Player' => array(
                'foreignKey' => false,
                'conditions' => array('Player.id = PlayersTeam.player_id')
            ),
            'PlayerSkill' => array(
                'foreignKey' => false,
                'conditions' => array('PlayerSkill.player_id = Player.id'),
                'order' => 'PlayerSkill.created DESC'
            )
            )
        ));
        $players = $this->Match->PlayersInMatch->find('all', array(
            'conditions' => array('PlayersInMatch.match_id' => $id),
            'contain' => array('PlayersTeam', 'Player', 'PlayerSkill')
        ));
        
        $playersInMatch = Set::combine(
            $players,
            '{n}.PlayersInMatch.position',
            '{n}.Player.id',
            '{n}.PlayersTeam.team_id'
        );
        $reQuery = false;
        if(!array_key_exists($match['HomeTeam']['id'], $playersInMatch)) {
            $this->Match->PlayersInMatch->createDefault($id, $match['HomeTeam']['id']);
            $reQuery = true;
        }
        if(!array_key_exists($match['VisitorTeam']['id'], $playersInMatch)) {
            $this->Match->PlayersInMatch->createDefault($id, $match['VisitorTeam']['id']);
            $reQuery = true;
        }
        if($reQuery = true) {
            $this->Match->PlayersInMatch->unbindModel(array('belongsTo' => array('PlayersTeam')));
            $this->Match->PlayersInMatch->bindModel(array(
                'hasOne' => array(
                'PlayersTeam' => array(
                    'foreignKey' => false,
                    'conditions' => array('PlayersTeam.id = PlayersInMatch.players_team_id')
                ),
                'Player' => array(
                    'foreignKey' => false,
                    'conditions' => array('Player.id = PlayersTeam.player_id')
                ),
                'PlayerSkill' => array(
                    'foreignKey' => false,
                    'conditions' => array('PlayerSkill.player_id = Player.id'),
                    'order' => 'PlayerSkill.created DESC'
                )
                )
            ));
            $players = $this->Match->PlayersInMatch->find('all', array(
                'conditions' => array('PlayersInMatch.match_id' => $id),
                'contain' => array('PlayersTeam', 'Player', 'PlayerSkill')
            ));
        }
        $match['Players'] = $players;

        // Initialize all the stats to 0
        foreach($match['Players'] as &$player) {
            foreach($player['PlayersInMatch'] as &$value) {
            if(is_null($value)) $value = 0;
            }
        }
        App::uses('MatchSimulator', 'Lib');
        $match['Match']['home_points'] = $match['Match']['visitor_points'] = 0;
        $MatchSimulator = new MatchSimulator($match);
        $MatchSimulator->changeState(MiseEnJeu::getInstance());
        while($MatchSimulator->match['Match']['home_points'] < 15 &&
               $MatchSimulator->match['Match']['visitor_points'] < 15 ) {
            $MatchSimulator->play();
        }
        $this->set('matchDescriptions', $MatchSimulator->matchDescription);
        $this->set(compact('match'));
        /*
         * This will be used to save the data in the database.
        $this->Match->save($match);
        foreach($match['Players'] as $player) {
            $this->Match->PlayersInMatch->save($player['PlayersInMatch']);
        }
        */
    }
    
    public function simulateWeek($date) {
        $matches = $this->Match->find('all', array(
            'conditions' => array('Match.start_date' => $date),
            'recursive' => -1
        ));
        foreach($matches as $match) {
            $this->Match->simulate($match['Match']['id']);
        }
        $this->Session->setFlash(__("Les matches du $date ont été simulés."));
        $this->redirect(array('action' => 'index'));
    }
    
}


