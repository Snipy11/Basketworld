<div class="gradesMatches view">
<h2><?php  echo __('Grades Match');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gradesMatch['GradesMatch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradesMatch['Match']['id'], array('controller' => 'matches', 'action' => 'view', $gradesMatch['Match']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gradesMatch['User']['name'], array('controller' => 'users', 'action' => 'view', $gradesMatch['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grade'); ?></dt>
		<dd>
			<?php echo h($gradesMatch['GradesMatch']['grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gradesMatch['GradesMatch']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Grades Match'), array('action' => 'edit', $gradesMatch['GradesMatch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Grades Match'), array('action' => 'delete', $gradesMatch['GradesMatch']['id']), null, __('Are you sure you want to delete # %s?', $gradesMatch['GradesMatch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grades Match'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
