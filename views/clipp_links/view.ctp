<div class="clippLinks view">
<h2><?php  __('Clipp Link');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $clippLink['ClippLink']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Clipp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($clippLink['Clipp']['title'], array('controller' => 'clipps', 'action' => 'view', $clippLink['Clipp']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $clippLink['ClippLink']['url']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clipp Link', true), array('action' => 'edit', $clippLink['ClippLink']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Clipp Link', true), array('action' => 'delete', $clippLink['ClippLink']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $clippLink['ClippLink']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clipp Links', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clipp Link', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clipp', true), array('controller' => 'clipps', 'action' => 'add')); ?> </li>
	</ul>
</div>
