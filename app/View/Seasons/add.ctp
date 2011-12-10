<div class="seasons form">
<?php echo $this->Form->create('Season');?>
	<fieldset>
		<legend><?php echo __('Add Season'); ?></legend>
	<?php
		echo $this->Form->input('year', array(
			'type' => 'text',
			'default' => $season['Season']['year'] + 1
			));
		echo $this->Form->input('start_date');?>
		<fieldset>
				<legend><?php echo __('Niveau de profondeur des divisions.') ?></legend>
		<?php
		foreach($countries as $key => $country):
			echo $this->Form->hidden("Country.{$key}.id", array('value' => $country['Country']['id']));
			echo $this->Form->input("Country.{$key}.level", array(
				'label' => $country['Country']['country'],
				'default' => $country['level']
			));
		endforeach;
	?></fieldset>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
