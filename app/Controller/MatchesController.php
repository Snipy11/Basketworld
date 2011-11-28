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

    public $previousState;
    public $currentState;
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
    
    public function previousStateWas($state)
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
        "{$sim->match[$sim->teamBall]['name']} met en place son jeu dans le camp de {$sim->match[$this->otherTeam($sim->teamBall)]['name']}.");
        $randomPlayer = mt_rand(0, 4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        $nextStates = array('LayUp', 'Tir2', 'Tir3', 'PasseDecisive', 'Interception', 'Faute');
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
    public $previousState;
    public function play(& $sim) {
	$this->previousState = $sim->previousState;
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} rate son tir.");
	if($sim->previousStateWas('FreeThrow')) {
	    if($sim->freeThrowsLeft > 0) $nextStates = array('FreeThrow');
	    else $nextStates = array('RebOff', 'RebDef');
	} else {
	    $nextStates = array('RebOff', 'RebDef', 'Faute');
	}
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}

class Reussi extends State {
    public $previousState;
    public function play(& $sim) {
	$this->previousState = $sim->previousState;
        $scorer = ($sim->teamBall == 'HomeTeam') ? 'home_points' : 'visitor_points';
        if($sim->previousStateWas('Tir3')) {
            $sim->match['Match'][$scorer] += 3;
        } elseif ($sim->previousStateWas('FreeThrow')) {
            $sim->match['Match'][$scorer] += 1;
	} else {
	    $sim->match['Match'][$scorer] += 2;
        }
        array_push($sim->matchDescription, 
        "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} Marque!\nScore actuel : {$sim->match['Match']['home_points']} - {$sim->match['Match']['visitor_points']}");
	if($sim->previousStateWas('FreeThrow')) {
	    if($sim->freeThrowsLeft > 0) $nextStates = array('FreeThrow');
	    else {
		$nextStates = array('MonteeBalle');
		
	    }
	} else {
	    $nextStates = array('MonteeBalle', 'Faute');
	}
	$nextState = $nextStates[array_rand($nextStates)];
	if($nextState == 'MonteeBalle') $sim->teamBall = $this->otherTeam($sim->teamBall);
	$sim->changeState(new $nextState);
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
	$actualBallCarrier = $sim->playerBallCarrier;
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        if($actualBallCarrier == $sim->playerBallCarrier) {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$actualBallCarrier]['PlayersTeam']['Player']['name']} se lance seul dans une fulgurante contre attaque.");
	} else {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$actualBallCarrier]['PlayersTeam']['Player']['name']} fait une passe à {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} qui part dans une fulgurante contre attaque.");
	}
        $nextStates = array('LayUp', 'Faute', 'Interception');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  

class MonteeBalle extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match[$sim->teamBall]['name']} remonte le ballon vers le camps adverse.");
        $nextStates = array('Interception', 'JeuPlace', 'Faute');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  

class Faute extends State {
    public function play(& $sim) {
        $faultPlayer = $this->getPlayerKeyAtPosition($sim->match, $sim->match['PlayersInMatch'][$sim->playerBallCarrier]['position'], $this->otherTeam($sim->teamBall));
	$sim->teamFaults[$this->otherTeam($sim->teamBall)]++;

	if($sim->previousStateWas('Rate')) {
	    if($sim->previousState->previousState instanceof Tir3) {
		array_push($sim->matchDescription, 
		"{$sim->match['PlayersInMatch'][$faultPlayer]['PlayersTeam']['Player']['name']} commet la faute sur le tir à 3 points de {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.
		{$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
		$sim->freeThrowsLeft = 3;
	    } else {
		$sim->freeThrowsLeft = 2;
		array_push($sim->matchDescription, 
		"{$sim->match['PlayersInMatch'][$faultPlayer]['PlayersTeam']['Player']['name']} commet la faute sur le tir de {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.
		{$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
	    }
	} elseif($sim->previousStateWas('Reussi')) {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$faultPlayer]['PlayersTeam']['Player']['name']} commet la faute sur le tir réussi de {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.
	    {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
	    $sim->freeThrowsLeft = 1;
	} elseif($sim->teamFaults[$this->otherTeam($sim->teamBall)] > 4) {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$faultPlayer]['PlayersTeam']['Player']['name']} commet la faute sur {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.
	    {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
	    $sim->freeThrowsLeft = 2;
	} else {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$faultPlayer]['PlayersTeam']['Player']['name']} commet la faute sur {$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']}.
	    {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
	}
	if($sim->freeThrowsLeft > 0) {
	    array_push($sim->matchDescription, 
	    "{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} a droit à {$sim->freeThrowsLeft} lancer franc.");
	    $sim->changeState(new FreeThrow);
	} else {
	    array_push($sim->matchDescription, 
	    "{$sim->match[$sim->teamBall]['name']} remet le ballon en jeu.");
	    $sim->changeState(new JeuPlace);
	}
    }
}  

class FreeThrow extends State {
    public function play(& $sim) {
	array_push($sim->matchDescription, 
	"{$sim->match['PlayersInMatch'][$sim->playerBallCarrier]['PlayersTeam']['Player']['name']} lance son lancer franc numéro {$sim->freeThrowsLeft}.");
	$sim->freeThrowsLeft--;
	$nextStates = array('Rate', 'Reussi');
        $sim->changeState(new $nextStates[array_rand($nextStates)]);
    }
}  
