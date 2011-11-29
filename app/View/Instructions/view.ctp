<div class="instructions view">
<h2><?php  echo __('Instruction');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($instruction['Instruction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instruction'), array('action' => 'edit', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instruction'), array('action' => 'delete', $instruction['Instruction']['id']), null, __('Are you sure you want to delete # %s?', $instruction['Instruction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instruction'), array('action' => 'add')); ?> </li>
	</ul>
</div>
