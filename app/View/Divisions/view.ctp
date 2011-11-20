<div class="divisions view">
<h2><?php  echo __('Division');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($division['Division']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hierarchy'); ?></dt>
		<dd>
			<?php echo h($division['Division']['hierarchy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($division['Division']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($division['Country']['id'], array('controller' => 'countries', 'action' => 'view', $division['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Season'); ?></dt>
		<dd>
			<?php echo $this->Html->link($division['Season']['year'], array('controller' => 'seasons', 'action' => 'view', $division['Season']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Division'), array('action' => 'edit', $division['Division']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Division'), array('action' => 'delete', $division['Division']['id']), null, __('Are you sure you want to delete # %s?', $division['Division']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('controller' => 'rumors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Rankings');?></h3>
	<?php if (!empty($division['Ranking'])):?>
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
		foreach ($division['Ranking'] as $ranking): ?>
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
	<h3><?php echo __('Related Rumors');?></h3>
	<?php if (!empty($division['Rumor'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($division['Rumor'] as $rumor): ?>
		<tr>
			<td><?php echo $rumor['id'];?></td>
			<td><?php echo $rumor['division_id'];?></td>
			<td><?php echo $rumor['user_id'];?></td>
			<td><?php echo $rumor['title'];?></td>
			<td><?php echo $rumor['created'];?></td>
			<td><?php echo $rumor['from'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'rumors', 'action' => 'view', $rumor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'rumors', 'action' => 'edit', $rumor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'rumors', 'action' => 'delete', $rumor['id']), null, __('Are you sure you want to delete # %s?', $rumor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teams');?></h3>
	<?php if (!empty($division['Team'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Gymnasium Name'); ?></th>
		<th><?php echo __('Places Assises'); ?></th>
		<th><?php echo __('Places Vip'); ?></th>
		<th><?php echo __('Adjoints'); ?></th>
		<th><?php echo __('Attaches'); ?></th>
		<th><?php echo __('Eplucheurs'); ?></th>
		<th><?php echo __('Medecins'); ?></th>
		<th><?php echo __('Kines'); ?></th>
		<th><?php echo __('Chasseurs'); ?></th>
		<th><?php echo __('Stats'); ?></th>
		<th><?php echo __('Confiance'); ?></th>
		<th><?php echo __('Cash'); ?></th>
		<th><?php echo __('Matos'); ?></th>
		<th><?php echo __('Tenues'); ?></th>
		<th><?php echo __('Muscu'); ?></th>
		<th><?php echo __('Supporters'); ?></th>
		<th><?php echo __('Com Politique Gestion'); ?></th>
		<th><?php echo __('Com Ambition'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($division['Team'] as $team): ?>
		<tr>
			<td><?php echo $team['id'];?></td>
			<td><?php echo $team['user_id'];?></td>
			<td><?php echo $team['division_id'];?></td>
			<td><?php echo $team['name'];?></td>
			<td><?php echo $team['logo'];?></td>
			<td><?php echo $team['gymnasium_name'];?></td>
			<td><?php echo $team['places_assises'];?></td>
			<td><?php echo $team['places_vip'];?></td>
			<td><?php echo $team['adjoints'];?></td>
			<td><?php echo $team['attaches'];?></td>
			<td><?php echo $team['eplucheurs'];?></td>
			<td><?php echo $team['medecins'];?></td>
			<td><?php echo $team['kines'];?></td>
			<td><?php echo $team['chasseurs'];?></td>
			<td><?php echo $team['stats'];?></td>
			<td><?php echo $team['confiance'];?></td>
			<td><?php echo $team['cash'];?></td>
			<td><?php echo $team['matos'];?></td>
			<td><?php echo $team['tenues'];?></td>
			<td><?php echo $team['muscu'];?></td>
			<td><?php echo $team['supporters'];?></td>
			<td><?php echo $team['com_politique_gestion'];?></td>
			<td><?php echo $team['com_ambition'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teams', 'action' => 'view', $team['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teams', 'action' => 'edit', $team['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teams', 'action' => 'delete', $team['id']), null, __('Are you sure you want to delete # %s?', $team['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
