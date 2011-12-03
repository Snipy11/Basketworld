<div class="teams view">
<h2><?php  echo __('Team');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($team['Team']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($team['User']['name'], array('controller' => 'users', 'action' => 'view', $team['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($team['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $team['Division']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($team['Team']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($team['Team']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gymnasium Name'); ?></dt>
		<dd>
			<?php echo h($team['Team']['gymnasium_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Places Assises'); ?></dt>
		<dd>
			<?php echo h($team['Team']['places_assises']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Places Vip'); ?></dt>
		<dd>
			<?php echo h($team['Team']['places_vip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adjoints'); ?></dt>
		<dd>
			<?php echo h($team['Team']['adjoints']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attaches'); ?></dt>
		<dd>
			<?php echo h($team['Team']['attaches']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eplucheurs'); ?></dt>
		<dd>
			<?php echo h($team['Team']['eplucheurs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medecins'); ?></dt>
		<dd>
			<?php echo h($team['Team']['medecins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kines'); ?></dt>
		<dd>
			<?php echo h($team['Team']['kines']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chasseurs'); ?></dt>
		<dd>
			<?php echo h($team['Team']['chasseurs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stats'); ?></dt>
		<dd>
			<?php echo h($team['Team']['stats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confiance'); ?></dt>
		<dd>
			<?php echo h($team['Team']['confiance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cash'); ?></dt>
		<dd>
			<?php echo h($team['Team']['cash']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Matos'); ?></dt>
		<dd>
			<?php echo h($team['Team']['matos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tenues'); ?></dt>
		<dd>
			<?php echo h($team['Team']['tenues']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Muscu'); ?></dt>
		<dd>
			<?php echo h($team['Team']['muscu']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supporters'); ?></dt>
		<dd>
			<?php echo h($team['Team']['supporters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Com Politique Gestion'); ?></dt>
		<dd>
			<?php echo h($team['Team']['com_politique_gestion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Com Ambition'); ?></dt>
		<dd>
			<?php echo h($team['Team']['com_ambition']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Team'), array('action' => 'edit', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Team'), array('action' => 'delete', $team['Team']['id']), null, __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Press Releases'), array('controller' => 'press_releases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Press Release'), array('controller' => 'press_releases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('controller' => 'strategies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Youth Investments'), array('controller' => 'youth_investments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Youth Investment'), array('controller' => 'youth_investments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friendly Match Requests'), array('controller' => 'friendly_match_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friendly Match Request To'), array('controller' => 'friendly_match_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players In Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match Home'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('controller' => 'transferts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert Buyer'), array('controller' => 'transferts', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Trainers');?></h3>
	<?php if (!empty($team['Trainer'])):?>
		<dl>
			<dt><?php echo __('Id');?></dt>
		<dd>
	<?php echo $team['Trainer']['id'];?>
&nbsp;</dd>
		<dt><?php echo __('Team Id');?></dt>
		<dd>
	<?php echo $team['Trainer']['team_id'];?>
&nbsp;</dd>
		<dt><?php echo __('First Name');?></dt>
		<dd>
	<?php echo $team['Trainer']['first_name'];?>
&nbsp;</dd>
		<dt><?php echo __('Name');?></dt>
		<dd>
	<?php echo $team['Trainer']['name'];?>
&nbsp;</dd>
		<dt><?php echo __('Age');?></dt>
		<dd>
	<?php echo $team['Trainer']['age'];?>
&nbsp;</dd>
		<dt><?php echo __('Country Id');?></dt>
		<dd>
	<?php echo $team['Trainer']['country_id'];?>
&nbsp;</dd>
		<dt><?php echo __('Level');?></dt>
		<dd>
	<?php echo $team['Trainer']['level'];?>
&nbsp;</dd>
		<dt><?php echo __('Style');?></dt>
		<dd>
	<?php echo $team['Trainer']['style'];?>
&nbsp;</dd>
		<dt><?php echo __('Salary');?></dt>
		<dd>
	<?php echo $team['Trainer']['salary'];?>
&nbsp;</dd>
		<dt><?php echo __('Price');?></dt>
		<dd>
	<?php echo $team['Trainer']['price'];?>
&nbsp;</dd>
		<dt><?php echo __('Available');?></dt>
		<dd>
	<?php echo $team['Trainer']['available'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
            <ul>
                <li><?php echo $this->Html->link(__('Edit Trainer'), array('controller' => 'trainers', 'action' => 'edit', $team['Trainer']['id'])); ?></li>
            </ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Events');?></h3>
	<?php if (!empty($team['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Historical'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id'];?></td>
			<td><?php echo $event['team_id'];?></td>
			<td><?php echo $event['text'];?></td>
			<td><?php echo $event['created'];?></td>
			<td><?php echo $event['historical'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Press Releases');?></h3>
	<?php if (!empty($team['PressRelease'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['PressRelease'] as $pressRelease): ?>
		<tr>
			<td><?php echo $pressRelease['id'];?></td>
			<td><?php echo $pressRelease['team_id'];?></td>
			<td><?php echo $pressRelease['title'];?></td>
			<td><?php echo $pressRelease['description'];?></td>
			<td><?php echo $pressRelease['created'];?></td>
			<td><?php echo $pressRelease['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'press_releases', 'action' => 'view', $pressRelease['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'press_releases', 'action' => 'edit', $pressRelease['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'press_releases', 'action' => 'delete', $pressRelease['id']), null, __('Are you sure you want to delete # %s?', $pressRelease['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Press Release'), array('controller' => 'press_releases', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rankings');?></h3>
	<?php if (!empty($team['Ranking'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Played'); ?></th>
		<th><?php echo __('Victories'); ?></th>
		<th><?php echo __('Defeats'); ?></th>
		<th><?php echo __('Points Scored'); ?></th>
		<th><?php echo __('Points Against'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Ranking'] as $ranking): ?>
		<tr>
			<td><?php echo $ranking['id'];?></td>
			<td><?php echo $ranking['division_id'];?></td>
			<td><?php echo $ranking['team_id'];?></td>
			<td><?php echo $ranking['points'];?></td>
			<td><?php echo $ranking['played'];?></td>
			<td><?php echo $ranking['victories'];?></td>
			<td><?php echo $ranking['defeats'];?></td>
			<td><?php echo $ranking['points_scored'];?></td>
			<td><?php echo $ranking['points_against'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rankings', 'action' => 'view', $ranking['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rankings', 'action' => 'edit', $ranking['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rankings', 'action' => 'delete', $ranking['id']), null, __('Are you sure you want to delete # %s?', $ranking['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Strategies');?></h3>
	<?php if (!empty($team['Strategy'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Condition'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Strategy'] as $strategy): ?>
		<tr>
			<td><?php echo $strategy['id'];?></td>
			<td><?php echo $strategy['team_id'];?></td>
			<td><?php echo $strategy['match_id'];?></td>
			<td><?php echo $strategy['type'];?></td>
			<td><?php echo $strategy['condition'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'strategies', 'action' => 'view', $strategy['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'strategies', 'action' => 'edit', $strategy['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'strategies', 'action' => 'delete', $strategy['id']), null, __('Are you sure you want to delete # %s?', $strategy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trainings');?></h3>
	<?php if (!empty($team['Training'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Weekday'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Training'] as $training): ?>
		<tr>
			<td><?php echo $training['id'];?></td>
			<td><?php echo $training['team_id'];?></td>
			<td><?php echo $training['created'];?></td>
			<td><?php echo $training['weekday'];?></td>
			<td><?php echo $training['type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trainings', 'action' => 'view', $training['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trainings', 'action' => 'edit', $training['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trainings', 'action' => 'delete', $training['id']), null, __('Are you sure you want to delete # %s?', $training['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transactions');?></h3>
	<?php if (!empty($team['Transaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['Transaction'] as $transaction): ?>
		<tr>
			<td><?php echo $transaction['id'];?></td>
			<td><?php echo $transaction['team_id'];?></td>
			<td><?php echo $transaction['amount'];?></td>
			<td><?php echo $transaction['type'];?></td>
			<td><?php echo $transaction['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), null, __('Are you sure you want to delete # %s?', $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Youth Investments');?></h3>
	<?php if (!empty($team['YouthInvestment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['YouthInvestment'] as $youthInvestment): ?>
		<tr>
			<td><?php echo $youthInvestment['id'];?></td>
			<td><?php echo $youthInvestment['team_id'];?></td>
			<td><?php echo $youthInvestment['amount'];?></td>
			<td><?php echo $youthInvestment['created'];?></td>
			<td><?php echo $youthInvestment['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'youth_investments', 'action' => 'view', $youthInvestment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'youth_investments', 'action' => 'edit', $youthInvestment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'youth_investments', 'action' => 'delete', $youthInvestment['id']), null, __('Are you sure you want to delete # %s?', $youthInvestment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Youth Investment'), array('controller' => 'youth_investments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friendly Match Requests');?></h3>
	<?php if (!empty($team['FriendlyMatchRequestTo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Team Id'); ?></th>
		<th><?php echo __('To Team Id'); ?></th>
		<th><?php echo __('Confirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Home'); ?></th>
		<th><?php echo __('Date Match'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['FriendlyMatchRequestTo'] as $friendlyMatchRequestTo): ?>
		<tr>
			<td><?php echo $friendlyMatchRequestTo['id'];?></td>
			<td><?php echo $friendlyMatchRequestTo['from_team_id'];?></td>
			<td><?php echo $friendlyMatchRequestTo['to_team_id'];?></td>
			<td><?php echo $friendlyMatchRequestTo['confirm'];?></td>
			<td><?php echo $friendlyMatchRequestTo['created'];?></td>
			<td><?php echo $friendlyMatchRequestTo['home'];?></td>
			<td><?php echo $friendlyMatchRequestTo['date_match'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friendly_match_requests', 'action' => 'view', $friendlyMatchRequestTo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friendly_match_requests', 'action' => 'edit', $friendlyMatchRequestTo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friendly_match_requests', 'action' => 'delete', $friendlyMatchRequestTo['id']), null, __('Are you sure you want to delete # %s?', $friendlyMatchRequestTo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Friendly Match Request To'), array('controller' => 'friendly_match_requests', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friendly Match Requests');?></h3>
	<?php if (!empty($team['FriendlyMatchRequestFrom'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From Team Id'); ?></th>
		<th><?php echo __('To Team Id'); ?></th>
		<th><?php echo __('Confirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Home'); ?></th>
		<th><?php echo __('Date Match'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['FriendlyMatchRequestFrom'] as $friendlyMatchRequestFrom): ?>
		<tr>
			<td><?php echo $friendlyMatchRequestFrom['id'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['from_team_id'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['to_team_id'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['confirm'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['created'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['home'];?></td>
			<td><?php echo $friendlyMatchRequestFrom['date_match'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friendly_match_requests', 'action' => 'view', $friendlyMatchRequestFrom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friendly_match_requests', 'action' => 'edit', $friendlyMatchRequestFrom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friendly_match_requests', 'action' => 'delete', $friendlyMatchRequestFrom['id']), null, __('Are you sure you want to delete # %s?', $friendlyMatchRequestFrom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Friendly Match Request From'), array('controller' => 'friendly_match_requests', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Players Teams');?></h3>
	<?php if (!empty($team['PlayersInTeam'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['PlayersInTeam'] as $playersInTeam): ?>
		<tr>
			<td><?php echo $playersInTeam['id'];?></td>
			<td><?php echo $playersInTeam['team_id'];?></td>
			<td><?php echo $playersInTeam['player_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'players_teams', 'action' => 'view', $playersInTeam['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'players_teams', 'action' => 'edit', $playersInTeam['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'players_teams', 'action' => 'delete', $playersInTeam['id']), null, __('Are you sure you want to delete # %s?', $playersInTeam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Players In Team'), array('controller' => 'players_teams', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Matches');?></h3>
	<?php if (!empty($team['MatchHome'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Home Team Id'); ?></th>
		<th><?php echo __('Visitor Team Id'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('Home Points'); ?></th>
		<th><?php echo __('Visitor Points'); ?></th>
		<th><?php echo __('Normal Spectators'); ?></th>
		<th><?php echo __('Vip Spectators'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['MatchHome'] as $matchHome): ?>
		<tr>
			<td><?php echo $matchHome['id'];?></td>
			<td><?php echo $matchHome['home_team_id'];?></td>
			<td><?php echo $matchHome['visitor_team_id'];?></td>
			<td><?php echo $matchHome['start_date'];?></td>
			<td><?php echo $matchHome['home_points'];?></td>
			<td><?php echo $matchHome['visitor_points'];?></td>
			<td><?php echo $matchHome['normal_spectators'];?></td>
			<td><?php echo $matchHome['vip_spectators'];?></td>
			<td><?php echo $matchHome['finished'];?></td>
			<td><?php echo $matchHome['type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matches', 'action' => 'view', $matchHome['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matches', 'action' => 'edit', $matchHome['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matches', 'action' => 'delete', $matchHome['id']), null, __('Are you sure you want to delete # %s?', $matchHome['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Match Home'), array('controller' => 'matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Matches');?></h3>
	<?php if (!empty($team['MatchVisit'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Home Team Id'); ?></th>
		<th><?php echo __('Visitor Team Id'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('Home Points'); ?></th>
		<th><?php echo __('Visitor Points'); ?></th>
		<th><?php echo __('Normal Spectators'); ?></th>
		<th><?php echo __('Vip Spectators'); ?></th>
		<th><?php echo __('Finished'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['MatchVisit'] as $matchVisit): ?>
		<tr>
			<td><?php echo $matchVisit['id'];?></td>
			<td><?php echo $matchVisit['home_team_id'];?></td>
			<td><?php echo $matchVisit['visitor_team_id'];?></td>
			<td><?php echo $matchVisit['start_date'];?></td>
			<td><?php echo $matchVisit['home_points'];?></td>
			<td><?php echo $matchVisit['visitor_points'];?></td>
			<td><?php echo $matchVisit['normal_spectators'];?></td>
			<td><?php echo $matchVisit['vip_spectators'];?></td>
			<td><?php echo $matchVisit['finished'];?></td>
			<td><?php echo $matchVisit['type'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matches', 'action' => 'view', $matchVisit['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matches', 'action' => 'edit', $matchVisit['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matches', 'action' => 'delete', $matchVisit['id']), null, __('Are you sure you want to delete # %s?', $matchVisit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Match Visit'), array('controller' => 'matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transferts');?></h3>
	<?php if (!empty($team['TransfertBuyer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th><?php echo __('Acquire Team Id'); ?></th>
		<th><?php echo __('Sell Team Id'); ?></th>
		<th><?php echo __('Gm Watch'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Finish Date'); ?></th>
		<th><?php echo __('First Price'); ?></th>
		<th><?php echo __('Current Price'); ?></th>
		<th><?php echo __('Sold'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['TransfertBuyer'] as $transfertBuyer): ?>
		<tr>
			<td><?php echo $transfertBuyer['id'];?></td>
			<td><?php echo $transfertBuyer['player_id'];?></td>
			<td><?php echo $transfertBuyer['acquire_team_id'];?></td>
			<td><?php echo $transfertBuyer['sell_team_id'];?></td>
			<td><?php echo $transfertBuyer['gm_watch'];?></td>
			<td><?php echo $transfertBuyer['created'];?></td>
			<td><?php echo $transfertBuyer['finish_date'];?></td>
			<td><?php echo $transfertBuyer['first_price'];?></td>
			<td><?php echo $transfertBuyer['current_price'];?></td>
			<td><?php echo $transfertBuyer['sold'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transferts', 'action' => 'view', $transfertBuyer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transferts', 'action' => 'edit', $transfertBuyer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transferts', 'action' => 'delete', $transfertBuyer['id']), null, __('Are you sure you want to delete # %s?', $transfertBuyer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transfert Buyer'), array('controller' => 'transferts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transferts');?></h3>
	<?php if (!empty($team['TransfertSeller'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th><?php echo __('Acquire Team Id'); ?></th>
		<th><?php echo __('Sell Team Id'); ?></th>
		<th><?php echo __('Gm Watch'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Finish Date'); ?></th>
		<th><?php echo __('First Price'); ?></th>
		<th><?php echo __('Current Price'); ?></th>
		<th><?php echo __('Sold'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($team['TransfertSeller'] as $transfertSeller): ?>
		<tr>
			<td><?php echo $transfertSeller['id'];?></td>
			<td><?php echo $transfertSeller['player_id'];?></td>
			<td><?php echo $transfertSeller['acquire_team_id'];?></td>
			<td><?php echo $transfertSeller['sell_team_id'];?></td>
			<td><?php echo $transfertSeller['gm_watch'];?></td>
			<td><?php echo $transfertSeller['created'];?></td>
			<td><?php echo $transfertSeller['finish_date'];?></td>
			<td><?php echo $transfertSeller['first_price'];?></td>
			<td><?php echo $transfertSeller['current_price'];?></td>
			<td><?php echo $transfertSeller['sold'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transferts', 'action' => 'view', $transfertSeller['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transferts', 'action' => 'edit', $transfertSeller['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transferts', 'action' => 'delete', $transfertSeller['id']), null, __('Are you sure you want to delete # %s?', $transfertSeller['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transfert Seller'), array('controller' => 'transferts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
