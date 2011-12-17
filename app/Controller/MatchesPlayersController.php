<?php
App::uses('AppController', 'Controller');
/**
 * MatchesPlayers Controller
 *
 * @property MatchesPlayer $MatchesPlayer
 */
class MatchesPlayersController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index($match_id = null) {
		$this->MatchesPlayer->Match->id = $match_id;
		$team_id = $this->Auth->user('team_id');
		if (!$this->MatchesPlayer->Match->exists() || 
			!($this->MatchesPlayer->Match->field('home_team_id') == $team_id ||
			  $this->MatchesPlayer->Match->field('visitor_team_id') == $team_id)) {
			throw new NotFoundException(__('Match non valide.'));
		}
		$this->paginate = array(
		'conditions' => array(
		    'MatchesPlayer.match_id' => $match_id,
		    'PlayersTeam.team_id' => $team_id
		),
		'fields' => array('MatchesPlayer.match_id', 'MatchesPlayer.players_team_id',
					'MatchesPlayer.position', 'MatchesPlayer.id', 'Player.first_name', 'Player.name',
					'PlayersTeam.default_position', 'PlayersTeam.team_id'),
		'recursive' => -1,
		'joins' => array(
			array(
				'table' => 'players_teams',
				'alias' => 'PlayersTeam',
				'type' => 'LEFT',
				'foreignKey' => false,
				'conditions'=> array('MatchesPlayer.players_team_id = PlayersTeam.id'),
				//'fields' => array('Player.first_name', 'Player.name', 'Player.id')
			),
			array(
				'table' => 'players',
				'alias' => 'Player',
				'type' => 'LEFT',
				'foreignKey' => false,
				'conditions'=> array('PlayersTeam.player_id = Player.id'),
				//'fields' => array('Player.first_name', 'Player.name', 'Player.id')
			)
		));
		$this->set('matchesPlayers', $this->paginate());
		$match = $this->MatchesPlayer->Match->find('first', array(
			'contain' => array('HomeTeam', 'VisitorTeam'),
			'conditions' => array('Match.id' => $match_id)
		));
		$this->set(compact('match'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MatchesPlayer->id = $id;
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Invalid matches player'));
		}
		$this->set('matchesPlayer', $this->MatchesPlayer->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($match_id) {
		$this->MatchesPlayer->Match->id = $match_id;
		$team_id = $this->Auth->user('team_id');
		if (!$this->MatchesPlayer->Match->exists() || 
			!($this->MatchesPlayer->Match->field('home_team_id') == $team_id ||
			  $this->MatchesPlayer->Match->field('visitor_team_id') == $team_id)) {
			throw new NotFoundException(__('Match non valide.'));
		}
		if ($this->request->is('post')) {
			$fields = array('match_id', 'players_team_id', 'position');
			for ($i = 0; $i < 5; $i++)  {
				$values[] = array(
					$this->request->data['MatchesPlayer'][$i]['match_id'],
					$this->request->data['MatchesPlayer'][$i]['players_team_id'],
					$this->request->data['MatchesPlayer'][$i]['position']
				);
			}
			foreach($this->request->data['MatchesPlayer'][5]['players_team_id'] as $players_team_id) {
				$values[] = array(
					$this->request->data['MatchesPlayer'][5]['match_id'],
					$players_team_id,
					$this->request->data['MatchesPlayer'][5]['position']
				);
			}
			$db = $this->MatchesPlayer->getDataSource();
			if(!$db->insertMulti($this->MatchesPlayer->table, $fields, $values)) {
				$db->rollback($this);
				$this->Session->setFlash(__('Une erreur s\'est produite lors de l\'enregistrement de l\'ordre de match. Veuillez réessayer.'));
			} else {
				$this->Session->setFlash(__('L\'ordre de match a été enregistré avec succès.'));
				$this->redirect(array('action' => 'index', $match_id));
			}
		}
		$playersTeams_raw = $this->MatchesPlayer->PlayersTeam->find('list', array(
			'fields' => array('PlayersTeam.id', 'Player.name', 'PlayersTeam.default_position'),
			'recursive' => 0,
			'conditions' => array('PlayersTeam.team_id' => $team_id)
		));
		foreach($playersTeams_raw as $position => $players) {
			$playersTeams[MatchesPlayer::positions($position)] = $players;
		}
		$this->set(compact('match_id', 'playersTeams'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MatchesPlayer->id = $id;
        $team_id = $this->Auth->user('team_id');
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Mauvais ordre de match.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MatchesPlayer->save($this->request->data)) {
				$this->Session->setFlash(__('The matches player has been saved'));
				$this->redirect(array('action' => 'index', $this->request->data['Match']['id']));
			} else {
				$this->Session->setFlash(__('The matches player could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MatchesPlayer->read(null, $id);
		}
		$playersTeams_raw = $this->MatchesPlayer->PlayersTeam->find('list', array(
			'fields' => array('PlayersTeam.id', 'Player.name', 'PlayersTeam.default_position'),
			'recursive' => 0,
            'conditions' => array('PlayersTeam.team_id' => $team_id)
		));
		foreach($playersTeams_raw as $position => $players) {
			$playersTeams[MatchesPlayer::positions($position)] = $players;
		}
		$this->set(compact('matches', 'playersTeams'));
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
		$this->MatchesPlayer->id = $id;
		if (!$this->MatchesPlayer->exists()) {
			throw new NotFoundException(__('Invalid matches player'));
		}
		if ($this->MatchesPlayer->delete()) {
			$this->Session->setFlash(__('Matches player deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Matches player was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
