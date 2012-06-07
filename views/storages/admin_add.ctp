<div class="storages form">
<h2><?php __('Add Storage'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
	</ul>
</div>
<?php echo $this->Form->create('Storage',array('type' => 'file'));?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('file',array('type' => 'file'));
		//echo $this->Form->input('dir');
		//echo $this->Form->input('mimetype');
		//echo $this->Form->input('filesize');
		//echo $this->Form->input('created_by');
		//echo $this->Form->input('modified_by');
		echo $this->Form->input('clipp_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>