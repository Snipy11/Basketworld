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
			<?php if(!empty($team['User']['name'])): ?>
            <?php echo $this->Html->link($team['User']['name'], array('controller' => 'users', 'action' => 'view', $team['User']['id'])); ?>
            <?php else: ?>
            Bot
            <?php endif; ?>
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
    
    <?php echo $this->element('ranking', $this->requestAction(array(
        'controller' => 'rankings',
        'action' => 'index',
        $team['Division']['id']
    ))) ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <li><?php echo $this->Html->link(__('Effectif'), array('controller' => 'playersteams', 'action' => 'index', $team['Team']['id'])); ?></li>
    </ul>
</div>
