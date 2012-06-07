<div class="clippLinks form">
<h2><?php __('Add Clipp Links');?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Clipp Links', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('ClippLink');?>
	<fieldset>
	<?php
		echo $this->Form->input('clipp_id');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>