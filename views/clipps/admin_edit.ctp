<div class="Clipps form">
	<h2><?php __('Edit Clipp'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('List Clipps', true), array('action' => 'index'));?></li>
		</ul>
	</div>
	<div class="clipps form">
	<?php echo $this->Form->create('Clipp');?>
		<fieldset>
			<div class="tabs">
				<ul>
					<li><a href="#clipp-basic"><span><?php __('Clipp'); ?></span></a></li>
					<li><a href="#clipp-content"><span><?php __('Content'); ?></span></a></li>
					<li><a href="#clipp-publisher"><span><?php __('Publisher'); ?></span></a></li>
					<?php echo $this->Layout->adminTabs(); ?>
				</ul>
				<div id="clipp-basic">
				<?php
					echo $this->Form->input('title');
					echo $this->Form->input('publish_date',array('dateFormat' => 'DMY', 'timeFormat' => '24'));
					echo $this->Form->input('resume');
					echo $this->Form->input('observation');
					echo $this->Form->input('evaluation_id');
					//echo $this->Form->input('status_id');
					echo $this->Form->input('customer_id');
					echo $this->Form->input('subject_id');
				?>
				</div>
				<div id="clipp-content">
					<?php echo $this->Form->input('content');?>
				</div>
				<div id="clipp-publisher">
					<?php 
						echo $this->Form->input('publisher_type_id');
						echo $this->Form->input('publisher_id');
						echo $this->Form->input('section_id');
					?>
				</div>
				<div id="clipp-files"> 
					
				</div>
			</div>
            <?php
                echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('Mode.copy',array('type'=>'hidden','value'=> $copy));
            ?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit', true));?>
	</div>
</div>
