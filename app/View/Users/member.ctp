<div class="view">
<h2>Bienvenue coach !</h2>
<?php
echo $this->element('next_match', $this->requestAction("matches/next/team:{$current_user['team_id']}")/*, array('cache' => array('time' => '12 hours'))*/);
echo $this->element('ranking', $this->requestAction('rankings/index')/*, array('cache' => array('time' => '12 hours'))*/); 
echo $this->element('top5_players', $this->requestAction(array('controller' => 'Players', 'action' => 'top5', 5)));
?>
</div>
