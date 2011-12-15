<div class="form">
<?php echo $this->Form->create('User', array('action' => 'add'));?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
        echo $this->Form->input('password_confirmation', array('type' => 'password'));
		echo $this->Form->input('email');
		echo $this->Form->input('presentation');
		echo $this->Form->input('birthdate', array('minYear' => '1940'));
		echo $this->Form->input('gender', array('options' => User::genders() ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
	</ul>
</div>
