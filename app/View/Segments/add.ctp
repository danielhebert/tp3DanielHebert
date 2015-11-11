
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Segment'); ?></h2>

		<div class="segments form">
		
			<?php echo $this->Form->create('Segment', array('role' => 'form')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('details', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('goodtime', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('tutorial_id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->