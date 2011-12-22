<?php    
class MatchSimulator {

    public $previousState;
    public $currentState;
    public $match;
    public $teamBall;
    public $playerBallCarrier;
    public $matchDescription = array();
    public $freeThrowsLeft = 0;
    public $teamFaults;
    
    public function __construct(&$match)  {
	$this->match = &$match;
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
    // Make it a Singleton -> make __construct and __clone private functions
    
    private function __construct()  {}
    private function __clone()  {}
    
    protected static $instances = array();
    
    
    final public static function getInstance()  {
        $calledClass = get_called_class();
        if(!isset($instances[$calledClass])) {
            $instances[$calledClass] = new $calledClass();
        }
        return $instances[$calledClass];
    }
    
    public abstract function play(& $matchSimulator);
    
    protected function getPlayerKeyAtPosition($match, $position, $team)  {
        foreach($match['Players'] as $key => $player) {
            if ($player['PlayersInMatch']['position'] == $position && $player['PlayersTeam']['team_id'] == $match[$team]['id']) return $key;
        }
    }
    
    protected function otherTeam($team) 
    {
        return ($team == 'VisitorTeam') ? 'HomeTeam' : 'VisitorTeam';
    }
    
    protected function passToRandomPlayer(&$sim) 
    {
        $positionsWithoutBall = range(0,4);
        $positionsWithoutBall = array_diff($positionsWithoutBall, array($sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['position']));
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
        "Mise en Jeu. {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} s'empare du ballon.");
        $nextStates = array('JeuPlace', 'Interception');
        $sim->changeState($nextStates[array_rand($nextStates)]::getInstance());
    }    
}

class JeuPlace extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match[$sim->teamBall]['name']} met en place son jeu dans le camp de {$sim->match[$this->otherTeam($sim->teamBall)]['name']}.");
        $randomPlayer = mt_rand(0, 4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        $d100 = mt_rand(1, 100);
        if($d100 < 25) $sim->changeState(LayUp::getInstance());
        elseif($d100 < 50) $sim->changeState(Tir2::getInstance());
        elseif($d100 < 65) $sim->changeState(Tir3::getInstance());
        elseif($d100 < 80) $sim->changeState(PasseDecisive::getInstance());
        elseif($d100 < 90) $sim->changeState(Interception::getInstance());
        else $sim->changeState(Faute::getInstance());
    }
}

class Interception extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0, 4);
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} intercepte le ballon.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['steals']++;
        $nextStates = array('JeuPlace', 'ContreAttaque');
        $sim->changeState($nextStates[array_rand($nextStates)]::getInstance());
    }
}

class LayUp extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} va au layup.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['2pts_attempts']++;
        $d100 = mt_rand(1, 100);
        if($d100<70) $sim->changeState(Reussi::getInstance());
        elseif($d100<80) $sim->changeState(Rate::getInstance());
        else $sim->changeState(Contre::getInstance());
    }
}

class Tir2 extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} tente un tir à 2 points.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['2pts_attempts']++;
        $d100 = mt_rand(1, 100);
        if($d100<70) $sim->changeState(Reussi::getInstance());
        elseif($d100<90) $sim->changeState(Rate::getInstance());
        else $sim->changeState(Contre::getInstance());
    }
}

class Tir3 extends State {
    public function play(& $sim) {
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} tente un tir à 3 points.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['3pts_attempts']++;
        $d100 = mt_rand(1, 100);
        if($d100<50) $sim->changeState(Reussi::getInstance());
        elseif($d100<80) $sim->changeState(Rate::getInstance());
        else $sim->changeState(Contre::getInstance());
    }
}

class Rate extends State {
    public $previousState;
    public function play(& $sim) {
        $this->previousState = $sim->previousState;
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} rate son tir.");
        if($sim->previousStateWas('FreeThrow')) {
            if($sim->freeThrowsLeft > 0) $nextState = 'FreeThrow';
            else {
            $nextStates = array('RebOff', 'RebDef');
            $nextState = $nextStates[array_rand($nextStates)];
            }
        } else {
            $d100 = mt_rand(1, 100);
            if($d100<50) $nextState = 'RebDef';
            elseif($d100 < 85) $nextState = 'RebOff';
            else $nextState = 'Faute';
        }
        $sim->changeState($nextState::getInstance());
    }
}

class Reussi extends State {
    public $previousState;
    public function play(& $sim) {
        $this->previousState = $sim->previousState;
        $scorer = ($sim->teamBall == 'HomeTeam') ? 'home_points' : 'visitor_points';
        if($sim->previousStateWas('Tir3')) {
            $sim->match['Match'][$scorer] += 3;
            $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['3pts_scored']++;
        } elseif ($sim->previousStateWas('FreeThrow')) {
            $sim->match['Match'][$scorer] += 1;
            $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['freethrows_scored']++;
        } else {
            $sim->match['Match'][$scorer] += 2;
            $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['2pts_scored']++;
        }
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} Marque!\nScore actuel : {$sim->match['Match']['home_points']} - {$sim->match['Match']['visitor_points']}");
        if($sim->previousStateWas('FreeThrow')) {
            if($sim->freeThrowsLeft > 0) $nextState = 'FreeThrow';
            else {
            $nextState = 'MonteeBalle';
            }
        } else {
            $d100 = mt_rand(1, 100);
            if($d100<80) $nextState = 'MonteeBalle';
            else $nextState = 'Faute';
        }
        if($nextState == 'MonteeBalle') $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->changeState($nextState::getInstance());
    }
}

class Contre extends State {
    public function play(& $sim) {
        $keyDefender = $this->getPlayerKeyAtPosition($sim->match, $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['position'], $this->otherTeam($sim->teamBall));
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} se fait contrer par {$sim->match['Players'][$keyDefender]['Player']['name']}.");
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $keyDefender;
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['blocks']++;
        $d100 = mt_rand(1, 100);
        if($d100 < 30) $sim->changeState(ContreAttaque::getInstance());
        else $sim->changeState(MonteeBalle::getInstance());
    }
}

class PasseDecisive extends State {
    public function play(& $sim) {
        $passingPlayerName = $sim->match['Players'][$sim->playerBallCarrier]['Player']['name'];
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['assists']++;
        $this->passToRandomPlayer($sim);
        array_push($sim->matchDescription, 
        "$passingPlayerName fait une passe décisive à {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.");
        $nextStates = array('LayUp', 'Tir2', 'Tir3');
        $sim->changeState($nextStates[array_rand($nextStates)]::getInstance());
    }
}

class RebOff extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} récupère le ballon sous le panier.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['rebounds_offensive']++;
        $nextStates = array('LayUp', 'JeuPlace');
        $sim->changeState($nextStates[array_rand($nextStates)]::getInstance());
    }
}        

class RebDef extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->teamBall = $this->otherTeam($sim->teamBall);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} récupère le ballon sous le panier.");
        $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['rebounds_defensive']++;
        $nextStates = array('MonteeBalle', 'ContreAttaque');
        $sim->changeState($nextStates[array_rand($nextStates)]::getInstance());
    }
}  

class ContreAttaque extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $actualBallCarrier = $sim->playerBallCarrier;
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        if($actualBallCarrier == $sim->playerBallCarrier) {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$actualBallCarrier]['Player']['name']} se lance seul dans une fulgurante contre attaque.");
        } else {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$actualBallCarrier]['Player']['name']} fait une passe à {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} qui part dans une fulgurante contre attaque.");
        }
        $d100 = mt_rand(1, 100);
        if($d100<75) $sim->changeState(LayUp::getInstance());
        elseif($d100<90) $sim->changeState(Interception::getInstance());
        else $sim->changeState(Faute::getInstance());
    }
}  

class MonteeBalle extends State {
    public function play(& $sim) {
        $randomPlayer = mt_rand(0,4);
        $sim->playerBallCarrier = $this->getPlayerKeyAtPosition($sim->match, $randomPlayer, $sim->teamBall);
        array_push($sim->matchDescription, 
        "{$sim->match[$sim->teamBall]['name']} remonte le ballon vers le camps adverse.");
        $d100 = mt_rand(1, 100);
        if($d100<70) $sim->changeState(JeuPlace::getInstance());
        elseif($d100<90) $sim->changeState(Interception::getInstance());
        else $sim->changeState(Faute::getInstance());
    }
}  

class Faute extends State {
    public function play(& $sim) {
        $faultPlayer = $this->getPlayerKeyAtPosition($sim->match, $sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['position'], $this->otherTeam($sim->teamBall));
        $sim->teamFaults[$this->otherTeam($sim->teamBall)]++;
        $sim->match['Players'][$faultPlayer]['PlayersInMatch']['fouls']++;
        if($sim->previousStateWas('Rate')) {
            if($sim->previousState->previousState instanceof Tir3) {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$faultPlayer]['Player']['name']} commet la faute sur le tir à 3 points de {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.
            {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
            $sim->freeThrowsLeft = 3;
            } else {
            $sim->freeThrowsLeft = 2;
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$faultPlayer]['Player']['name']} commet la faute sur le tir de {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.
            {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
            }
        } elseif($sim->previousStateWas('Reussi')) {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$faultPlayer]['Player']['name']} commet la faute sur le tir réussi de {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.
            {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
            $sim->freeThrowsLeft = 1;
        } elseif($sim->teamFaults[$this->otherTeam($sim->teamBall)] > 4) {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$faultPlayer]['Player']['name']} commet la faute sur {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.
            {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
            $sim->freeThrowsLeft = 2;
        } else {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$faultPlayer]['Player']['name']} commet la faute sur {$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']}.
            {$sim->match[$this->otherTeam($sim->teamBall)]['name']} a déjà commis {$sim->teamFaults[$this->otherTeam($sim->teamBall)]} fautes.");
        }
        if($sim->freeThrowsLeft > 0) {
            array_push($sim->matchDescription, 
            "{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} a droit à {$sim->freeThrowsLeft} lancer franc.");
            $sim->changeState(FreeThrow::getInstance());
        } else {
            array_push($sim->matchDescription, 
            "{$sim->match[$sim->teamBall]['name']} remet le ballon en jeu.");
            $sim->changeState(JeuPlace::getInstance());
        }
    }
}  

class FreeThrow extends State {
    public function play(& $sim) {
	array_push($sim->matchDescription, 
	"{$sim->match['Players'][$sim->playerBallCarrier]['Player']['name']} lance son lancer franc numéro {$sim->freeThrowsLeft}.");
	$sim->match['Players'][$sim->playerBallCarrier]['PlayersInMatch']['freethrows_attempts']++;
	$sim->freeThrowsLeft--;
	$d100 = mt_rand(1, 100);
	if($d100 < 30) $sim->changeState(Rate::getInstance());
	else $sim->changeState(Reussi::getInstance());
    }
}  
?>
