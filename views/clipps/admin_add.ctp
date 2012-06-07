<script>
	function updateEditors(type) {
		// Impresso
		if (type == '4e64fc9f-9c14-4d75-9f7b-1260737253ea') {
			$('#obs').show('slow');
			$('#obs_lbl').text('Páginas');
			$('#divTiragem').show('slow');
			$('#divColumn').show('slow');
		} else if (type == '4e64fcca-5014-4d13-b2fb-1260737253ea') {
		// Tv
			$('#obs').show('slow');
			$('#obs_lbl').text('Duração');
		} else {
			$('#obs').hide('slow');
			$('#divTiragem').hide('slow');
			$('#divColumn').hide('slow');
		}
		$.ajax({
			type:'POST',
			url: '<?php echo $this->Html->url('/admin/clipping/publishers/index/');?>' + type,
			success: function(data) {
			$("#ClippPublisherId").empty().append(data);
			updateSections($("#ClippSectionId").val());
			}
		});
	}
	
	function updateSections(publisher) {
		$.ajax({
			type:'POST',
			url: '<?php echo $this->Html->url('/admin/clipping/sections/index/');?>' + publisher,
			success: function(data) {
			$("#ClippSectionId").empty().append(data);
			}
		});
	}
	
	$(document).ready(function() {
			$("#ClippPublisherTypeId").bind('change',
				function() {
					var type = $(this).val();
					updateEditors(type);
			});
			
			$("#ClippPublisherId").bind('change',
				function() {
					var publisher = $(this).val();
					updateSections(publisher);
			});
			var type = $("#ClippPublisherTypeId").val();
			updateEditors(type);
	});
</script>
<div class="Clipps form">
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Clipps', true), array('action' => 'index'));?></li>
		</ul>
	</div>
	<div class="clipps form">
	<?php echo $this->Form->create('Clipp');?>
		<fieldset>
			<div class="tabs">
				<div id="clipp-basic">
				<?php
					echo $this->Form->input('title');
					echo $this->Form->input('publish_date',array('dateFormat' => 'DMY', 'timeFormat' => '24'));
					echo $this->Form->input('resume');
					echo $this->Form->input('content');
					echo $this->Form->input('observation', array('type'=>'text','div'=>array('id'=>'obs'),'label' => array('id'=>'obs_lbl')));
					echo $this->Form->input('tiragem', array('type'=>'text','div'=>array('id'=>'divTiragem'),'label' => 'Tiragem'));
					echo $this->Form->input('column', array('type'=>'text','div'=>array('id'=>'divColumn'),'label' => 'Colunas'));
					
					echo $this->Form->input('evaluation_id', array('empty'=>__('Select',true)));
					//echo $this->Form->input('status_id', array('empty'=>__('Select',true)));
					echo $this->Form->input('customer_id', array('empty'=>__('Select',true)));
					echo $this->Form->input('subject_id', array('empty'=>__('Select',true)));
				?>
				</div>
				<div id="clipp-publisher">
					<?php 
						echo $this->Form->input('publisher_type_id', array('empty'=>__('Select',true),'default'=>$default_publisher));
						echo $this->Form->input('publisher_id', array('type'=>'select','empty'=>__('Select',true)));
						echo $this->Form->input('section_id', array('type'=>'select','empty'=>__('Select',true)));
					?>
				</div>
			</div>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
    <div style="clear:both"></div>
	</div>
</div><div style="clear:both"></div>
