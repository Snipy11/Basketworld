<?php
App::uses('AppController', 'Controller');
/**
 * Matches Controller
 *
 * @property Match $Match
 */
class MatchesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Match->recursive = 0;
		$this->set('matches', $this->paginate());
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
    
/**
 * simulate method
 * 
 * 
 * @return void
 */
    public function simulate() {
        $match = $this->Match->find('first', array(
            'contain' => array(
                'PlayersInMatch' => array(
                    'PlayersTeam' => array(
                        'Player'
                    ),
                ),
                'HomeTeam',
                'VisitorTeam'
            ),
            'conditions' => array('Match.id' => '1')
            
        ));
        $MatchSimulator = new MatchSimulator($match);
        $MatchSimulator->changeState(new MiseEnJeu);
        while($MatchSimulator->match['Match']['home_points'] < 15 &&
               $MatchSimulator->match['Match']['visitor_points'] < 15 ) {
            $MatchSimulator->play();
        }
        $this->set('matchDescriptions', $MatchSimulator->matchDescription);
        $this->set('match', $match);
    }
}

class MatchSimulator {

    private $previousState;
    private $currentState;
    public $match;
    public $teamBall;
    public $playerBallCarrier;
    public $matchDescription = array();
    public $freeThrowsLeft = 0;
    public $teamFaults;
    
    public function __construct($match)  {
	$this->match = $match;
    $this->teamFaults['HomeTeam'] = 0;
    $this->teamFaults['VisitorTeam'] = 0;
    }
    
    public function play() {
        $this->currentState->play($this);
    }
    
    public function changeState($newState) {
        $this->previousState = $this->currentState;
        $this->currentState = $newState;
    }
    
    public function PreviousStateWas($state)
    {
        return ($this->previousState instanceof $state) ? true : false;
    }
    
}

abstract class State {
    
    public abstract function play(& $matchSimulator);
    
    protected function getPlayerKeyAtPosition(&$match, $position, $team)  {
        foreach($match['PlayersInMatch'] as $key => $player) {
            if ($player['position'] == $position && $player['PlayersTeam']['team_id'] == $match[$team]['id']) return $key;
        }
    }
    
    protected function otherTeam($team) 
    {
        return ($team == 'VisitorTeam') ? 'HomeTeam' : 'VisitorTeam';
    }
    
    protected function passToRandomPlayer(&$sim) 
    {
        $positionsWithoutBall = range(0,4);
        $positionsWithoutBall = array_diff($positionsWithoutBall, array($sim->match['PlayersInMatch'][$sim->playerBallCarrier]['position']));
        $newPlayerPosition = array_rand($positionsWithoutBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $newPlayerPosition, $sim->teamBall);
    }
    
}

class MiseEnJeu extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0, 9);
        $sim->teamBall = ($randomPlayer % 2 == 0) ? 'HomeTeam' : 'VisitorTeam';
        $playerPosition = (int)($randomPlayer / 2);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $playerPosition, $sim->teamBall);
        array_push($sim->matchDescription, 
        "Mise en Jeu. {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} s'empare du ballon.");
        $nextStates = array('JeuPlace', 'Interception');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }    
}

class JeuPlace extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match[$sim->teamBall]['name']} a réussi à placer son jeu.");
        $randomPlayer = mt_rand(0, 4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        $nextStates = array('LayUp', 'Tir2', 'Tir3', 'PasseDecisive', 'Interception');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Interception extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0, 4);
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} intercepte le ballon.");
        $nextStates = array('JeuPlace', 'ContreAttaque');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class LayUp extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} va au layup.");
        $nextStates = array('Rate', 'Reussi', 'Contre');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Tir2 extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} tente un tir à 2 points.");
        $nextStates = array('Rate', 'Reussi', 'Contre');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Tir3 extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} tente un tir à 3 points.");
        $nextStates = array('Rate', 'Reussi', 'Contre');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Rate extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} rate son tir.");
        $nextStates = array('RebOff', 'RebDef');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Reussi extends State {
    public function play(& $sim) {
        $scorer = ($sim->teamBall == 'HomeTeam') ? 'home_points' : 'visitor_points';
        if($sim->PreviousStateWas('Tir3')) {
            $sim->match['Match'][$scorer] += 3;
        } else {
            $sim->match['Match'][$scorer] += 2;
        }
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} Marque!\nScore actuel : {$sim->match['Match']['home_points']} - {$sim->match['Match']['visitor_points']}");
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, 0, $sim->teamBall);
        $nextStates = array('MonteeBalle');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Contre extends State {
    public function play(& $sim) {
        $keyDefender = $this->getPlayerKeyAtPosition($sim->match, $sim->match['PlayersInMatch'][$sim->playerBallCarrier]['position'], $this->otherTeam($sim->teamBall));
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} se fait contrer par {$sim->match['PlayersInMatch'][$keyDefender]['PlayersTeam']['Player']['name']}.");
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $keyDefender;
        $nextStates = array('ContreAttaque', 'MonteeBalle');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class PasseDecisive extends State {
    public function play(& $sim) {
        $passingPlayerName = $sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name'];
        $this->passToRandomPlayer($sim);
        array_push($sim->matchDescription, 
        "$passingPlayerName fait une passe décisive à {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.");
        $nextStates = array('LayUp', 'Tir2', 'Tir3');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class RebOff extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} récupère le ballon sous le panier.");
        $nextStates = array('LayUp', 'JeuPlace');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}        

class RebDef extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} récupère le ballon sous le panier.");
        $nextStates = array('MonteeBalle', 'ContreAttaque');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  

class ContreAttaque extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} part dans une fulgurante contre attaque.");
        $nextStates = array('LayUp');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  

class MonteeBalle extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match[$sim->teamBall]['name']} remonte le ballon vers le camps adverse.");
        $nextStates = array('Interception', 'JeuPlace');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  

class Faute extends State {
    public function play(& $sim) {
        $faultPlayer = $this->getPlayerKeyAtPosition($sim->match, mt_rand(0, 4), $this->otherTeam($sim->teamBall));
        
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][faultPlayer]['PlayersTeam']['Player']['name']} commet une faute sur {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}. {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} a droit à {$sim->freeThrowsLeft} lancer franc.");
        $nextStates = array('Interception', 'JeuPlace');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  
