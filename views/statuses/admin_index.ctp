<div class="statuses index">
	<h2><?php __('Statuses');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Status', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($statuses as $status):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $status['Status']['name']; ?>&nbsp;</td>
		<td><?php echo $status['Status']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $status['Status']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $status['Status']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $status['Status']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
