<?php //debug($clipps);exit;?>
<div class="clipps index">
	<div id="news">
		<div id="clipping">
	<?php
	$i = 0;
    $news_date = null;
	foreach ($clipps as $clipp):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = 'altrow';
		}
	?>
		<div class="noticias">
		<?php //arruma as datas ?>
            <?php if (date('d - m - Y',strtotime($clipp['Clipp']['publish_date'])) != date('d - m - Y',strtotime($news_date))) : ?>
            <?php $news_date = $clipp['Clipp']['publish_date']; ?>
	    <?php if ($news_date): ?>
		<!--<script>
			$(document).ready(function() {
				$('#<?php echo date('d-m-Y',strtotime($clipp['Clipp']['publish_date']))?>').html(
					$('.<?php echo date('d-m-Y',strtotime($clipp['Clipp']['publish_date']))?>').length
				);
			});
		</script>-->
	    <?endif;?>
            <strong>
				<?php echo date('d - m - Y',strtotime($clipp['Clipp']['publish_date']));?> - <span id="<?php echo date('d-m-Y',strtotime($clipp['Clipp']['publish_date']))?>"><?php echo $this->requestAction('/clipping/clipps/index/publisher_type_id:'.$type.'/count:'.date('Y-m-d',strtotime($clipp['Clipp']['publish_date'])));?></span> Matérias Encontradas
            </strong>
            <?php endif;?>
			<div class="dateTitle <?php echo date('d-m-Y',strtotime($clipp['Clipp']['publish_date']))?>"><?php echo date('G : i',strtotime($clipp['Clipp']['publish_date'])); ?></div>
            <?php if ($clipp['Clipp']['publisher_type_id'] != '4e64fcab-94c4-4403-8480-1260737253ea') : ?>
            <a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><h2 class="<?php echo $class;?>"><?php echo $clipp['Clipp']['title']; ?></h2></a>
            <?php else : ?>
            <a href="<?php echo $clipp['ClippLink']['0']['url'];?>" target="_blank"><h2 class="<?php echo $class;?>"><?php echo $clipp['Clipp']['title']; ?></h2></a>
            <a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><h3>[ Em cache]</h3></a>
            <?php endif; ?>
            	<?php if (
			(!empty($clipp['Storage']) && 
			($clipp['Clipp']['publisher_type_id'] != '4e64fcca-5014-4d13-b2fb-1260737253ea') &&
			($clipp['Clipp']['publisher_type_id'] != '4e64fcc2-4698-40e8-ac45-1260737253ea')
			)) : ?>
					<div id="image"><a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><img width="80px" height="80px" src="<?php echo $this->Html->url('/',true)?>files/storage/<?php echo $clipp['Storage']['0']['file'];?>"/></a></div>
				<?php else : ?>
					<?php if ($clipp['Clipp']['publisher_type_id'] == '4e64fcca-5014-4d13-b2fb-1260737253ea') : ?>
						<div id="image"><a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><img src="<?php	echo $this->webroot . 'img' . DS. 'retro-tv-icon.jpg'; ?>" alt="" /></a></div>
					<?php elseif ($clipp['Clipp']['publisher_type_id'] == '4e64fcc2-4698-40e8-ac45-1260737253ea') :?>	
						<div id="image"><a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><img src="<?php	echo $this->webroot . 'img' . DS. 'retro-radio-icon.jpg'; ?>" alt="" /></a></div>
					<?php elseif ($clipp['Clipp']['publisher_type_id'] == '4e64fcab-94c4-4403-8480-1260737253ea') :?>	
						<div id="image"><a href="<?php echo $this->Html->url(array('plugin'=>'clipping','controller'=>'clipps','action'=>'view',$clipp['Clipp']['id']));?>"><img src="<?php	echo $this->webroot . 'img' . DS. 'computer-icon.jpg'; ?>" alt="" /></a></div>						
					<?php endif;?>
			   <?php endif;?>
				
				<div class="corpo"><?php echo $clipp['Clipp']['resume']; ?></div>
			<div class="tags <?php echo $class;?>">
				<?php //debug($clipp); exit;?>
				<strong><?php echo __('Evaluation',true);?>:&nbsp;</strong><spam><?php echo $clipp['Evaluation']['name']; ?></spam>
				<strong><?php echo __('Publisher',true);?>:&nbsp;</strong><spam><?php echo $clipp['Publisher']['name']; ?></spam>
				<?php if ($clipp['Publisher']['publisher_type_id'] == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') : ?>
					<strong>Páginas :&nbsp;</strong><spam><?php echo $clipp['Clipp']['observation']; ?></spam>
				<?php endif; ?>
				<?php // Televisão ?>				
				<?php if ($clipp['Publisher']['publisher_type_id'] == '4e64fcca-5014-4d13-b2fb-1260737253ea') : ?>
					<strong>Duração :&nbsp;</strong><spam><?php echo $clipp['Clipp']['observation']; ?></spam>
				<?php endif; ?>
				<?php if (!empty($clipp['Section']['name'])) : ?>
				<strong><?php echo __('Section',true);?>:&nbsp;</strong><spam><?php echo $clipp['Section']['name']; ?></spam>
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</div>
<?php endforeach; ?>
	</div>
</div>
	<!--</table> -->
<div class="paging">
	<?php $paginator->options = array( 'url' => $paginatorURL );?>
	<?php echo $paginator->numbers(); ?></div>
	<div class="counter"><?php echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></div>
</div>
