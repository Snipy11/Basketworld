<?php
App::uses('AppController', 'Controller');
/**
 * PlayersTeams Controller
 *
 * @property PlayersTeam $PlayersTeam
 */
class PlayersTeamsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PlayersTeam->recursive = 0;
		$team_id = $this->Auth->user('team_id');
        $this->PlayersTeam->unbindModel(array('belongsTo' => array('Player')));
        $this->PlayersTeam->bindModel(array(
            'hasOne' => array(
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
		$this->paginate = array(
			'conditions' => array('PlayersTeam.team_id' => $team_id),
			'contain' => array('Player', 'PlayerSkill')
		);
		$this->set('playersTeams', $this->paginate());
		$team = $this->PlayersTeam->Team->find('first', array(
			'conditions' => array('Team.id' => $team_id),
			'recursive' => -1
		));
		$this->set(compact('team'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
        $bestMatch = $this->PlayersTeam->MatchesPlayer->find('first', array(
            'conditions' => array('MatchesPlayer.players_team_id' => $id),
            'order' => array('MatchesPlayer.evaluation DESC'),
            'contain' => array('Match' => array('HomeTeam', 'VisitorTeam'))
        ));
        $this->PlayersTeam->unbindModel(array(
            'belongsTo' => array('Player'),
            'hasMany' => array('MatchesPlayer')
        ));
        $this->PlayersTeam->bindModel(array(
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
        $playersTeam = $this->PlayersTeam->find('first', array(
            'conditions' => array('PlayersTeam.id' => $id),
            'contain' => array('Player', 'PlayerSkill', 'MatchesPlayer', 'Match', 'Country', 'HomeTeam', 'VisitorTeam')
        ));

		$this->set(compact('playersTeam', 'bestMatch'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlayersTeam->create();
			if ($this->PlayersTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The players team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The players team could not be saved. Please, try again.'));
			}
		}
		$teams = $this->PlayersTeam->Team->find('list');
		$players = $this->PlayersTeam->Player->find('list');
		$this->set(compact('teams', 'players'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlayersTeam->save($this->request->data)) {
				$this->Session->setFlash(__('The players team has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The players team could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->PlayersTeam->read(null, $id);
		}
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
		$this->PlayersTeam->id = $id;
		if (!$this->PlayersTeam->exists()) {
			throw new NotFoundException(__('Invalid players team'));
		}
		if ($this->PlayersTeam->delete()) {
			$this->Session->setFlash(__('Players team deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Players team was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
