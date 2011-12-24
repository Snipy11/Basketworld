<div>
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

