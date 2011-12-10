<div class="countries view">
<h2><?php  echo __('Country');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Flag'); ?></dt>
		<dd>
			<?php echo h($country['Country']['flag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), null, __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Divisions');?></h3>
	<?php if (!empty($country['Division'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hierarchy'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Season Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Division'] as $division): ?>
		<tr>
			<td><?php echo $division['id'];?></td>
			<td><?php echo $division['hierarchy'];?></td>
			<td><?php echo $division['name'];?></td>
			<td><?php echo $division['country_id'];?></td>
			<td><?php echo $division['season_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'divisions', 'action' => 'view', $division['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'divisions', 'action' => 'edit', $division['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'divisions', 'action' => 'delete', $division['id']), null, __('Are you sure you want to delete # %s?', $division['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Players');?></h3>
	<?php if (!empty($country['Player'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Salary'); ?></th>
		<th><?php echo __('Skill'); ?></th>
		<th><?php echo __('Shoot'); ?></th>
		<th><?php echo __('3points'); ?></th>
		<th><?php echo __('Dribble'); ?></th>
		<th><?php echo __('Assist'); ?></th>
		<th><?php echo __('Rebound'); ?></th>
		<th><?php echo __('Block'); ?></th>
		<th><?php echo __('Steal'); ?></th>
		<th><?php echo __('Defense'); ?></th>
		<th><?php echo __('Form'); ?></th>
		<th><?php echo __('Experience'); ?></th>
		<th><?php echo __('Spirit'); ?></th>
		<th><?php echo __('Injury'); ?></th>
		<th><?php echo __('Speciality'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Player'] as $player): ?>
		<tr>
			<td><?php echo $player['id'];?></td>
			<td><?php echo $player['country_id'];?></td>
			<td><?php echo $player['first_name'];?></td>
			<td><?php echo $player['name'];?></td>
			<td><?php echo $player['age'];?></td>
			<td><?php echo $player['height'];?></td>
			<td><?php echo $player['salary'];?></td>
			<td><?php echo $player['skill'];?></td>
			<td><?php echo $player['shoot'];?></td>
			<td><?php echo $player['3points'];?></td>
			<td><?php echo $player['dribble'];?></td>
			<td><?php echo $player['assist'];?></td>
			<td><?php echo $player['rebound'];?></td>
			<td><?php echo $player['block'];?></td>
			<td><?php echo $player['steal'];?></td>
			<td><?php echo $player['defense'];?></td>
			<td><?php echo $player['form'];?></td>
			<td><?php echo $player['experience'];?></td>
			<td><?php echo Player::spirits($player['spirit']);?></td>
			<td><?php echo $player['injury'];?></td>
			<td><?php echo Player::specialities($player['speciality']);?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'players', 'action' => 'view', $player['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'players', 'action' => 'edit', $player['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'players', 'action' => 'delete', $player['id']), null, __('Are you sure you want to delete # %s?', $player['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trainers');?></h3>
	<?php if (!empty($country['Trainer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Level'); ?></th>
		<th><?php echo __('Style'); ?></th>
		<th><?php echo __('Salary'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Available'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['Trainer'] as $trainer): ?>
		<tr>
			<td><?php echo $trainer['id'];?></td>
			<td><?php echo $trainer['team_id'];?></td>
			<td><?php echo $trainer['first_name'];?></td>
			<td><?php echo $trainer['name'];?></td>
			<td><?php echo $trainer['age'];?></td>
			<td><?php echo $trainer['country_id'];?></td>
			<td><?php echo $trainer['level'];?></td>
			<td><?php echo $trainer['style'];?></td>
			<td><?php echo $trainer['salary'];?></td>
			<td><?php echo $trainer['price'];?></td>
			<td><?php echo $trainer['available'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trainers', 'action' => 'view', $trainer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trainers', 'action' => 'edit', $trainer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trainers', 'action' => 'delete', $trainer['id']), null, __('Are you sure you want to delete # %s?', $trainer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
