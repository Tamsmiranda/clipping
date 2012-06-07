<div class="storages form">
<?php echo $this->Form->create('Storage');?>
	<fieldset>
		<legend><?php __('Edit Storage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('file');
		echo $this->Form->input('dir');
		echo $this->Form->input('mimetype');
		echo $this->Form->input('filesize');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('clipp_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Storage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Storage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Storages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clipp', true), array('controller' => 'clipps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>