<div class="clipps index">
	<h2><?php __('Clipps');?></h2>
	<?php echo $this->element('admin_search');?>
	<div style="clear:both"></div>
	<?php echo $this->Form->create('Email',array('url'=>$this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'send'),true),'id'=>'email'));?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clipp', true), array('action' => 'add')); ?></li>
			<li><a href="#" id="send">Enviar Selecionados por Email</a></li>
			<li><?php echo $this->Form->input('to',array('label'=>false,'div'=>false));?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Form->input('checkAll', array('type'=>'checkbox','label'=>false,'id'=>'checkAll'));?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('publish_date');?></th>
			<th><?php echo $this->Paginator->sort('customer_id');?></th>
			<th><?php echo $this->Paginator->sort('publisher_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($clipps as $clipp):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Form->input($clipp['Clipp']['id'],array('type'=>'checkbox','label'=>false,'class'=>'checkbox'));?></td>
		<td><?php echo $clipp['Clipp']['title']; ?>&nbsp;</td>
		<td><?php echo date('G:i d-m-Y',strtotime($clipp['Clipp']['publish_date']));?>&nbsp;</td>
		<td>
			<?php echo $clipp['Customer']['name']; ?>
		</td>
		<td>
			<?php echo $clipp['Publisher']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $clipp['Clipp']['id'])); ?>
			<?php echo $this->Html->link(__('PDF', true), array('action' => 'view', $clipp['Clipp']['id'],'pdf'=>'true')); ?>
			<?php echo $this->Html->link(__('Send', true),array('plugin'=>'clipping','controller'=>'clipps','action'=>'send',$clipp['Clipp']['id']),true);?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $clipp['Clipp']['id']),array('target' => '_blank')); ?>
			<?php echo $this->Html->link(__('Copiar', true), array('action' => 'edit', $clipp['Clipp']['id'], 'copy:true'), array('target' => '_blank')); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $clipp['Clipp']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $clipp['Clipp']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div style="display:none">
	<?php echo $this->Form->end(__('Submit', true));?>
	<div style="clear:both"></div>
	</div>
	<?php $paginator->options = array( 'url' => $paginatorURL );?>
	<div class="paging"><?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
	</div>
	<script>
		$('#send').click(function(){/*
			$.post(
				"<?php echo $this->Html->url(array('plugin' => 'clipping', 'controller' => 'clipps', 'action' => 'send'));?>",
				{email: "tamsmiranda@gmail.com"});*/
			$('#email').submit();
		});
		$('.ck_send').click(function(){
		});
		// Check All
		$(document).ready(function()
		{
			$("#checkAll").click(function()				
			{
				var checked_status = this.checked;
				$(".checkbox").each(function()
				{
					this.checked = checked_status;
				});
			});					
		});
	</script>
<div style="clear:both"></div>
