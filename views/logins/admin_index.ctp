<div class="logins index">
	<h2><?php __('Acessos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(__('Data'),'date');?></th>
			<th><?php echo $this->Paginator->sort(__('Usuário'),'user_id');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($logins as $login):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $login['Login']['created']; ?>&nbsp;</td>
		<td><?php echo $login['User']['name']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
</div>
