<div class="statuses form">
<h2><?php __('Add Status'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Statuses', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="statuses form">
<?php echo $this->Form->create('Status');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
</div><div style="clear:both"></div>