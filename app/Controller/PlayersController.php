<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('top5');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Player->recursive = 0;
		$this->set('players', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
        $player = $this->Player->find('first', array(
            'conditions' => array('Player.id' => $id),
            'contain' => array('Country', 'PlayerSkill' => array('Season'))
        ));
        $seasonDate = $player['PlayerSkill']['Season']['start_date'];
        
        /*
        $this->Player->PlayerInTeam->unbindModel(array(
            'belongsTo' => array('Player'),
            'hasMany' => array('MatchesPlayer')
        ));
        $this->Player->PlayerInTeam->bindModel(array(
            'hasOne' => array(
                'Player' => array(
                    'foreignKey' => false,
                    'conditions' => array('Player.id = PlayersTeam.player_id')
                ),
                'Country' => array(
                    'foreignKey' => false,
                    'conditions' => array('Player.country_id = Country.id')
                ),
                'PlayerSkill' => array(
                    'foreignKey' => false,
                    'conditions' => array('PlayerSkill.player_id = Player.id'),
                    'order' => 'PlayerSkill.created DESC'
                ),
                'MatchesPlayer' => array(
                    'foreignKey' => false,
                    'conditions' => array('MatchesPlayer.players_team_id = PlayersTeam.id')
                ),
                'Match' =>array(
                    'foreignKey' => false,
                    'conditions' => array('MatchesPlayer.match_id = Match.id', 'Match.home_points IS NOT NULL'),
                    'order' => 'Match.start_date DESC'
                ),
                'HomeTeam' => array(
                    'foreignKey' => false,
                    'className' => 'Team',
                    'conditions' => array('Match.home_team_id = HomeTeam.id')
                ),
                'VisitorTeam' => array(
                    'foreignKey' => false,
                    'className' => 'Team',
                    'conditions' => array('Match.visitor_team_id = VisitorTeam.id')
                )
            )
        ));
        $playersTeam = $this->Player->PlayersTeam->find('first', array(
            'conditions' => array('PlayersTeam.id' => $id),
            'contain' => array('Player', 'PlayerSkill', 'MatchesPlayer', 'Match', 'Country', 'HomeTeam', 'VisitorTeam')
        ));
        */
        $this->Player->PlayerInTeam->MatchesPlayer->unbindModel(array(
            'belongsTo' => array('Match', 'PlayersTeam')
        ), false);
        $this->Player->PlayerInTeam->MatchesPlayer->bindModel(array('hasOne' => array(
            'Match' => array(
                'foreignKey' => false,
                'conditions' => array('MatchesPlayer.match_id = Match.id', 'Match.home_points IS NOT NULL'),
                'order' => 'Match.start_date DESC'
            ),
            'HomeTeam' => array(
                'foreignKey' => false,
                'className' => 'Team',
                'conditions' => array('Match.home_team_id = HomeTeam.id')
            ),
            'VisitorTeam' => array(
                'foreignKey' => false,
                'className' => 'Team',
                'conditions' => array('Match.visitor_team_id = VisitorTeam.id')
            ),
            'PlayersTeam' => array(
                'foreignKey' => false,
                'conditions' => array('MatchesPlayer.players_team_id = PlayersTeam.id'),
            ),
            'Player' => array(
                'foreignKey' => false,
                'conditions' => array('Player.id = PlayersTeam.player_id'),
            ),
        )), false);
        $lastMatch = $this->Player->PlayerInTeam->MatchesPlayer->find('first', array(
            'fields' => array('HomeTeam.name', 'VisitorTeam.name', 'Match.start_date', 
                        'Match.home_points', 'Match.visitor_points'),
            'conditions' => array('Match.start_date >=' => $seasonDate, 'Player.id' => $id),
            'contain' => array(
                'Match',
                'HomeTeam',
                'VisitorTeam',
                'PlayersTeam',
                'Player'
            )
        ));
        $bestMatch = $this->Player->PlayerInTeam->MatchesPlayer->find('first', array(
            'conditions' => array('Match.start_date >=' => $seasonDate, 'Player.id' => $id),
            'order' => array('MatchesPlayer.evaluation DESC'),
            'contain' => array(
                'Match',
                'HomeTeam',
                'VisitorTeam',
                'PlayersTeam',
                'Player'
            )
        ));
        $seasonStats = $this->Player->PlayerInTeam->MatchesPlayer->find('first', array(
            'fields' => array('SUM(MatchesPlayer.2pts_attempts) AS 2pts_attempts',
                'SUM(MatchesPlayer.2pts_scored) AS 2pts_scored',
                'SUM(MatchesPlayer.3pts_attempts) AS 3pts_attempts',
                'SUM(MatchesPlayer.3pts_scored) AS 3pts_scored',
                'SUM(MatchesPlayer.rebounds_offensive) AS rebounds_offensive',
                'SUM(MatchesPlayer.rebounds_defensive) AS rebounds_defensive',
                'SUM(MatchesPlayer.freethrows_attempts) AS freethrows_attempts',
                'SUM(MatchesPlayer.freethrows_scored) AS freethrows_scored',
                'SUM(MatchesPlayer.assists) AS assists', 'SUM(MatchesPlayer.steals) AS steals',
                'SUM(MatchesPlayer.blocks) AS blocks', 'SUM(MatchesPlayer.fouls) AS fouls',
                'SUM(MatchesPlayer.turnovers) AS turnovers',
                'SUM(MatchesPlayer.evaluation) AS evaluation'),
            'conditions' => array('Match.start_date >=' => $seasonDate, 'Player.id' => $id),
            'contain' => array(
                'Match',
                'PlayersTeam',
                'Player'
                )
        ));
		$this->set(compact('player', 'bestMatch', 'lastMatch', 'seasonStats'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Player->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
		}
		$countries = $this->Player->Country->find('list');
		$this->set(compact('countries'));
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('Player deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function top5() {
        if(!$this->request->params['requested']) {
            throw new MethodNotAllowedException(__('Cette requête n\'est pas valable.'));
        }
        $players = $this->Player->find('all', array(
            'contain' => array('PlayerSkill' => array(
                'order' => array('PlayerSkill.skill DESC')
            )),
            'limit' => 5
        ));
        return compact('players');
    }
    
}
