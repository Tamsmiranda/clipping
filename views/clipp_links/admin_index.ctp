<div class="clippLinks index">
	<h2><?php __('Clipp Links');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clipp Link', true), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Clipps', true), array('controller' => 'clipps', 'action' => 'index')); ?> </li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('clipp_id');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($clippLinks as $clippLink):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $clippLink['ClippLink']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clippLink['Clipp']['title'], array('controller' => 'clipps', 'action' => 'view', $clippLink['Clipp']['id'])); ?>
		</td>
		<td><?php echo $clippLink['ClippLink']['url']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $clippLink['ClippLink']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $clippLink['ClippLink']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $clippLink['ClippLink']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $clippLink['ClippLink']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>