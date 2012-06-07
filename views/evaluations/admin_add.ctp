<div class="evaluations form">
<h2><?php __('Add Evaluation'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Evaluations', true), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('Evaluation');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>