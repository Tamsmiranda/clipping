<div class="evaluations form">
<h2><?php __('Edit Evaluation'); ?></h2>
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
        echo $this->Form->input('id',array('type'=>'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>