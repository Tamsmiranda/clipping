<div class="storages index">
	<h2><?php __('Storages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('file');?></th>
			<th><?php echo $this->Paginator->sort('dir');?></th>
			<th><?php echo $this->Paginator->sort('mimetype');?></th>
			<th><?php echo $this->Paginator->sort('filesize');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('created_by');?></th>
			<th><?php echo $this->Paginator->sort('modified_by');?></th>
			<th><?php echo $this->Paginator->sort('clipp_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($storages as $storage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $storage['Storage']['id']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['name']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['description']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['file']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['dir']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['mimetype']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['filesize']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['created']; ?>&nbsp;</td>
		<td><?php echo $storage['Storage']['modified']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($storage['CreatedBy']['name'], array('controller' => 'users', 'action' => 'view', $storage['CreatedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storage['ModifiedBy']['name'], array('controller' => 'users', 'action' => 'view', $storage['ModifiedBy']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($storage['Clipp']['title'], array('controller' => 'clipps', 'action' => 'view', $storage['Clipp']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $storage['Storage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $storage['Storage']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $storage['Storage']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $storage['Storage']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Storage', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clipp', true), array('controller' => 'clipps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Created By', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>