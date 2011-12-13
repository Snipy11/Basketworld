<div class="view">
<h2>Bienvenue coach !</h2>
<?php
echo $this->element('next_match', $this->requestAction("matches/next/team:{$current_user['Team']['id']}"), array('cache' => array('time' => '+12 hour'))); ?>
</div>
