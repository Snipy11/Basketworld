<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validated'); ?></dt>
		<dd>
			<?php echo h($user['User']['validated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastconnect'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastconnect']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation'); ?></dt>
		<dd>
			<?php echo h($user['User']['presentation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($user['User']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($user['User']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avatar'); ?></dt>
		<dd>
			<?php echo h($user['User']['avatar']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inactive'); ?></dt>
		<dd>
			<?php echo h($user['User']['inactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Waiting'); ?></dt>
		<dd>
			<?php echo h($user['User']['waiting']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($user['User']['group']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('controller' => 'grades_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grades Match'), array('controller' => 'grades_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('controller' => 'rumors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vips'), array('controller' => 'vips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vip'), array('controller' => 'vips', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('controller' => 'users_goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Goal'), array('controller' => 'users_goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend From'), array('controller' => 'friends', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Grades Matches');?></h3>
	<?php if (!empty($user['GradesMatch'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GradesMatch'] as $gradesMatch): ?>
		<tr>
			<td><?php echo $gradesMatch['id'];?></td>
			<td><?php echo $gradesMatch['match_id'];?></td>
			<td><?php echo $gradesMatch['user_id'];?></td>
			<td><?php echo $gradesMatch['grade'];?></td>
			<td><?php echo $gradesMatch['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'grades_matches', 'action' => 'view', $gradesMatch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'grades_matches', 'action' => 'edit', $gradesMatch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'grades_matches', 'action' => 'delete', $gradesMatch['id']), null, __('Are you sure you want to delete # %s?', $gradesMatch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grades Match'), array('controller' => 'grades_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Rumors');?></h3>
	<?php if (!empty($user['Rumor'])):?>
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
		foreach ($user['Rumor'] as $rumor): ?>
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
	<?php if (!empty($user['Team'])):?>
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
		foreach ($user['Team'] as $team): ?>
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
<div class="related">
	<h3><?php echo __('Related Vips');?></h3>
	<?php if (!empty($user['Vip'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Vip'] as $vip): ?>
		<tr>
			<td><?php echo $vip['id'];?></td>
			<td><?php echo $vip['user_id'];?></td>
			<td><?php echo $vip['created'];?></td>
			<td><?php echo $vip['end_date'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vips', 'action' => 'view', $vip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vips', 'action' => 'edit', $vip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vips', 'action' => 'delete', $vip['id']), null, __('Are you sure you want to delete # %s?', $vip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vip'), array('controller' => 'vips', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users Goals');?></h3>
	<?php if (!empty($user['UserGoal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Goal Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Gm Valid User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UserGoal'] as $userGoal): ?>
		<tr>
			<td><?php echo $userGoal['id'];?></td>
			<td><?php echo $userGoal['goal_id'];?></td>
			<td><?php echo $userGoal['user_id'];?></td>
			<td><?php echo $userGoal['created'];?></td>
			<td><?php echo $userGoal['gm_valid_user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_goals', 'action' => 'view', $userGoal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_goals', 'action' => 'edit', $userGoal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_goals', 'action' => 'delete', $userGoal['id']), null, __('Are you sure you want to delete # %s?', $userGoal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Goal'), array('controller' => 'users_goals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users Goals');?></h3>
	<?php if (!empty($user['GmValidGoal'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Goal Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Gm Valid User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GmValidGoal'] as $gmValidGoal): ?>
		<tr>
			<td><?php echo $gmValidGoal['id'];?></td>
			<td><?php echo $gmValidGoal['goal_id'];?></td>
			<td><?php echo $gmValidGoal['user_id'];?></td>
			<td><?php echo $gmValidGoal['created'];?></td>
			<td><?php echo $gmValidGoal['gm_valid_user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_goals', 'action' => 'view', $gmValidGoal['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_goals', 'action' => 'edit', $gmValidGoal['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_goals', 'action' => 'delete', $gmValidGoal['id']), null, __('Are you sure you want to delete # %s?', $gmValidGoal['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gm Valid Goal'), array('controller' => 'users_goals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friends');?></h3>
	<?php if (!empty($user['FriendFrom'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From User Id'); ?></th>
		<th><?php echo __('To User Id'); ?></th>
		<th><?php echo __('Confirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['FriendFrom'] as $friendFrom): ?>
		<tr>
			<td><?php echo $friendFrom['id'];?></td>
			<td><?php echo $friendFrom['from_user_id'];?></td>
			<td><?php echo $friendFrom['to_user_id'];?></td>
			<td><?php echo $friendFrom['confirm'];?></td>
			<td><?php echo $friendFrom['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friends', 'action' => 'view', $friendFrom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friends', 'action' => 'edit', $friendFrom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friends', 'action' => 'delete', $friendFrom['id']), null, __('Are you sure you want to delete # %s?', $friendFrom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Friend From'), array('controller' => 'friends', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Friends');?></h3>
	<?php if (!empty($user['FriendTo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('From User Id'); ?></th>
		<th><?php echo __('To User Id'); ?></th>
		<th><?php echo __('Confirm'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['FriendTo'] as $friendTo): ?>
		<tr>
			<td><?php echo $friendTo['id'];?></td>
			<td><?php echo $friendTo['from_user_id'];?></td>
			<td><?php echo $friendTo['to_user_id'];?></td>
			<td><?php echo $friendTo['confirm'];?></td>
			<td><?php echo $friendTo['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'friends', 'action' => 'view', $friendTo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'friends', 'action' => 'edit', $friendTo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'friends', 'action' => 'delete', $friendTo['id']), null, __('Are you sure you want to delete # %s?', $friendTo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Friend To'), array('controller' => 'friends', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
