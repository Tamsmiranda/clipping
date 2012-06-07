<div class="subjects form">
	<h2><?php __('Add Subject'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Subjects', true), array('action' => 'index'));?></li>
		</ul>
	</div>
<?php echo $this->Form->create('Subject');?>
	<fieldset>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div><div style="clear:both"></div>