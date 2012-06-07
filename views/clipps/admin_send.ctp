<div class="clipps view">
<h2><?php  __('Send Email');?></h2>
<?php echo $this->Form->create('Email',array('url'=>$this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'send',$clipp['Clipp']['id']),true)));?>
	<?php echo $this->Form->input('email',array('label'=>'Insira o email de destino:'));?>
<?php echo $this->Form->end(__('Submit', true));?>
<br />
<h2><?php  __('Clipp');?> - <?php echo $clipp['Clipp']['title']; ?></h2>
  <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Clipps', true), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Add Storage', true), array('controller'=>'storages','action' => 'add', 'clipp'=>$clipp['Clipp']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('Add ClippLink', true), array('controller'=>'clipp_links','action' => 'add', 'clipp'=>$clipp['Clipp']['id'])); ?> </li>
		</ul>
	</div>
	<dl>
	  <?php $i = 0; $class = ' class="altrow"';?>
<p style="margin-bottom:10px; text-align:justify">	  
	  <strong>	  <?php __('Publish Date'); ?>:</strong>
	  <?php echo $clipp['Clipp']['publish_date']; ?> </p><p style="margin-bottom:10px; text-align:justify">
	  <strong>	  	  <?php __('Resume'); ?>:<br /></strong>
	  <?php echo $clipp['Clipp']['resume']; ?>
	  </p><p></p>
      <p style="margin-bottom:10px; text-align:justify"><strong><?php __('Content'); ?>:<br /></strong>
	  <?php echo $clipp['Clipp']['content']; ?></p><p style="color:#999">
	  <strong><?php __('Evaluation'); ?>:</strong>
	  <?php echo $clipp['Evaluation']['name']; ?> | 
	  <strong>	  	  | <?php __('Created'); ?>:</strong>
	  <?php echo $clipp['Clipp']['created']; ?>
	   | 
	  <strong>	  <?php __('Created By'); ?></strong>
	  <?php echo $clipp['CreatedBy']['name']; ?>
	  
	  | 
	  <strong>	  <?php __('Customer'); ?></strong>
	  <?php echo $clipp['Customer']['id']; ?>
	  
	  | 
	  <strong>	  <?php __('Publisher Type'); ?></strong>
	  <?php echo $clipp['PublisherType']['name']; ?>
	  
	  | 
	  <strong>	  <?php __('Publisher'); ?></strong>
	  <?php echo $clipp['Publisher']['name']; ?>
	  
	  | 
	  <strong>	  <?php __('Section'); ?></strong>
	  <?php echo $clipp['Section']['name']; ?>
	  
	  | 
	  <strong>	  <?php __('Subject'); ?></strong>
	  <?php echo $clipp['Subject']['name']; ?></p>
	</dl>
</div>
<?php if (!empty($clipp['ClippLink'])) : ?>
<div class="clipp_links view">
	<h2><?php  __('ClippLink');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Url')?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($clipp['ClippLink'] as $clipp_links):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $clipp_links['url']; ?>&nbsp;</td>
		<!--<td><?php //echo $this->Html->link(__('View', true), array('plugin'=>'clipping','controller'=>'storages','action' => 'view', $storage['id']));?></td>-->
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif;?>
</div>

<?php if (!empty($clipp['Storage'])) : ?>
<div class="storages view">
	<h2><?php  __('Storages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Name')?></th>
			<th><?php echo __('Description')?></th>
			<th><?php __('Preview');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($clipp['Storage'] as $storage):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $storage['name']; ?>&nbsp;</td>
		<td><?php echo $storage['description']; ?>&nbsp;</td>
		<td><a href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"><img width="10%" height="10%" src="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"/></a></td>
		<td><?php echo $this->Html->link(__('View', true), array('plugin'=>'clipping','controller'=>'storages','action' => 'view', $storage['id']));?></td>
	</tr>
	<?php endforeach; ?>
	</table>
<?php endif;?>
</div>