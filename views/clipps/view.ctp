<h2><?php  __('Send Email');?></h2>
  <div class="actions">
		<ul>
			<li><a href="javascript: history.go(-1)">Voltar</a></li>
			<li><a href="javascript:window.print()" >Imprimir</a></li>
		</ul>
</div>
<?php echo $this->Form->create('Email',array('url'=>$this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'send',$clipp['Clipp']['id']),true)));?>
	<?php echo $this->Form->input('email',array('label'=>'Insira o email de destino:'));?>
<?php echo $this->Form->end(__('Submit', true));?>
<br />
<div class="clipps view">
<h2><?php echo $clipp['Clipp']['title']; ?></h2>
	<dl>
	  <?php $i = 0; $class = ' class="altrow"';?>
<p style="margin-bottom:10px; text-align:justify">	  
	  <strong><?php __('Publish Date'); ?>:</strong>
	  <?php echo date('d/m/Y G:i',strtotime($clipp['Clipp']['publish_date']));?></p><!--<p style="margin-bottom:10px; text-align:justify"> -->
	  <!-- <strong>	  	  <?php //__('Resume'); ?>:<br /></strong> -->
	  <!-- <?php //echo $clipp['Clipp']['resume']; ?> -->
	  </p><p></p>
      <p style="margin-bottom:10px; text-align:justify"><strong><?php __('Content'); ?>:<br /></strong>
	  <!--<?php // echo $clipp['Clipp']['content']; ?></p><p style="color:#999"> -->
	  <!-- <strong><?php //__('Evaluation'); ?>:</strong> -->
	  <!-- <?php //echo $clipp['Evaluation']['name']; ?> -->
	  <!-- <strong>	  	  | <?php // __('Created'); ?>:</strong> -->
	  <!-- <?php //echo $clipp['Clipp']['created']; ?>-->
	  <!-- | 
	  <strong><?php //__('Created By'); ?></strong> -->
	  <!-- <?php //echo $clipp['CreatedBy']['name']; ?>-->
	  <!--
	  | 
	  <strong>	  <?php //__('Customer'); ?></strong>
	  <?php //echo $clipp['Customer']['name']; ?>
	  
	  <!--| 
	  <strong>	  <?php //__('Publisher Type'); ?></strong>
	  <?php //echo $clipp['PublisherType']['name']; ?>-->
	  <!--
	  | 
	  <strong>	  <?php //__('Publisher'); ?></strong>
	  <?php //echo $clipp['Publisher']['name']; ?>
	  
	  | 
	  <strong>	  <?php //__('Section'); ?></strong>
	  <?php //echo $clipp['Section']['name']; ?>
	  
	  <!--| 
	  <strong>	  <?php //__('Subject'); ?></strong>
	  <?php //echo $clipp['Subject']['name']; ?>--></p>
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
		<?php $extension = pathinfo($clipp_links['url']);?>
		<?php 
			if (isset($extension['extension'])) {
				if ($extension['extension']=='flv')
				{ 
					$class ='player';
					$inner = '<img src="'.$this->webroot.'img/flow_eye.jpg" alt="Player" />';
				} elseif ($extension['extension']=='wmv')
				{ 
					$class ='player-wmv';
					$inner = '<OBJECT ID="MediaPlayer" WIDTH="425" HEIGHT="300" CLASSID="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" 
STANDBY="Loading Windows Media Player components..." TYPE="application/x-oleobject">
<PARAM NAME="FileName" VALUE="'.$clipp_links['url'].'">
<PARAM name="autostart" VALUE="false">
<PARAM name="ShowControls" VALUE="true">
<param name="ShowStatusBar" value="false">
<PARAM name="ShowDisplay" VALUE="false">
<EMBED TYPE="application/x-mplayer2" SRC="'.$clipp_links['url'].'" NAME="MediaPlayer"
WIDTH="192" HEIGHT="190" ShowControls="1" ShowStatusBar="0" ShowDisplay="0" autostart="0"> </EMBED>
</OBJECT>';
				} else {
					$class = 'link';
					$inner = $clipp_links['url'];
				} 
			}
		?>
		<td><a href="<?php echo $clipp_links['url']; ?>" class="<?php echo $class;?>"><?php echo $inner; ?></a></td>
		<!--<td><?php //echo $this->Html->link(__('View', true), array('plugin'=>'clipping','controller'=>'storages','action' => 'view', $storage['id']));?></td>-->
	</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php endif;?>

<?php if (!empty($clipp['Storage'])) : ?>
<div class="storages view">
	<?php if ($clipp['Clipp']['publisher_type_id'] != '4e64fc9f-9c14-4d75-9f7b-1260737253ea') : ?>
	<h2><?php  __('Storages');?></h2>
	<?php else : ?>
	<h2>Páginas</h2>
	<?php endif; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php //echo __('Name')?></th> -->
			<th><?php //__('Preview');?></th>
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
		<!-- <td><?php //echo $storage['name']; ?>&nbsp;</td> -->
		<td>
			<?php $extension = pathinfo($storage['file']);?>
			<?php if($extension['extension'] == 'wmv'):?>
				<OBJECT ID="MediaPlayer" WIDTH="425" HEIGHT="300" CLASSID="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95" STANDBY="Loading Windows Media Player components..." TYPE="application/x-oleobject">
					<PARAM NAME="FileName" VALUE="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>">
					<PARAM name="autostart" VALUE="false">
					<PARAM name="ShowControls" VALUE="true">
					<param name="ShowStatusBar" value="false">
					<PARAM name="ShowDisplay" VALUE="false">
					<EMBED TYPE="application/x-mplayer2" SRC="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>" NAME="MediaPlayer" WIDTH="192" HEIGHT="190" ShowControls="1" ShowStatusBar="0" ShowDisplay="0" autostart="0"> </EMBED>
				</OBJECT>
			<?php elseif($extension['extension'] == 'flv'):?>
			<a class="player" href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"><img src="<?php echo $this->webroot.'img/flow_eye.jpg';?>" alt="Player" /></a>
			<?php else:?>
			<?php 
			$maxwidth = 840;
			$image = $this->Html->url('/',true)."files/storage/".$storage['file'];
			list($width,$height) = getimagesize($image);
			if ($width < $maxwidth) :?>
				<h3>Centimetragem:</h3><label><?php echo number_format(($width/118), 2, ',', ' ');?> cm x <?php echo number_format(($height/118), 2, ',', ' ');?> cm</label><br />
				<div><a href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"><img width="<?php echo $width;?>px" height="<?php echo $height;?>px" alt="<?php echo $storage['description']; ?>" width="100%" height="100%" src="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"/></a></div>
			<?php else :?>
				<h3>Centimetragem:</h3><label><?php echo number_format(($width/118), 2, ',', ' ');?> cm x <?php echo number_format(($height/118), 2, ',', ' ');?> cm</label><br />
				<div><a href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"><img width="<?php echo $maxwidth;?>px" height="<?php echo ($maxwidth/$width * $height);?>px" alt="<?php echo $storage['description']; ?>" width="100%" height="100%" src="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>"/></a></div>
			<?php endif;?>

			<?php endif;?>
		</td>
		<td>
			<?php if ($clipp['Clipp']['publisher_type_id'] != '4e64fc9f-9c14-4d75-9f7b-1260737253ea') : ?>
			<a href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>">Download</a>
			<?php else : ?>
			<a href="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $storage['file'];?>">Visualizar</a>
			<?php endif; ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
</div>
<?php endif;?>
<script src="<?php echo $this->webroot;?>js/flowplayer-3.2.6.min.js"></script>
<script>
	flowplayer("a.player", "<?php echo $this->webroot;?>swf/flowplayer-3.2.7.swf");
</script>