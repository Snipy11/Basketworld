<div class="playersTeams view">
<h2><?php  echo __('Fiche du joueur');?></h2>
    <dl>
		<dt><?php echo __('Pays'); ?></dt>
		<dd>
			<?php echo $playersTeam['Country']['country']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['first_name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['age']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['height']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['salary']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skill'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['skill']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shoot'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['shoot']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('3points'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['3points']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dribble'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['dribble']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assist'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['assist']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rebound'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['rebound']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['block']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Steal'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['steal']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defense'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['defense']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['form']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Experience'); ?></dt>
		<dd>
			<?php echo $playersTeam['PlayerSkill']['experience']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spirit'); ?></dt>
		<dd>
			<?php echo Player::spirits($playersTeam['Player']['spirit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injury'); ?></dt>
		<dd>
			<?php echo $playersTeam['Player']['injury']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speciality'); ?></dt>
		<dd>
			<?php echo Player::specialities($playersTeam['Player']['speciality']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Dernier match'); ?></dt>
		<dd>
			<?php echo $playersTeam['Match']['start_date'] ." : ". 
                $playersTeam['HomeTeam']['name'] ." - ". $playersTeam['VisitorTeam']['name']; ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Meilleur match'); ?></dt>
		<dd>
			<?php echo $bestMatch['Match']['start_date'] ." : ". 
                $bestMatch['Match']['HomeTeam']['name'] ." - ". $bestMatch['Match']['VisitorTeam']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Players Team'), array('action' => 'edit', $playersTeam['PlayersTeam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Players Team'), array('action' => 'delete', $playersTeam['PlayersTeam']['id']), null, __('Are you sure you want to delete # %s?', $playersTeam['PlayersTeam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
	</ul>
</div>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
