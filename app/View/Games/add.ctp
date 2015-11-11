<?php $this->Html->script('View/Platforms/onAdd', array('inline' => false)); ?>
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Add Game'); ?></h2>

		<div class="games form">
		
			<?php echo $this->Form->create('Game', array('type' => 'file')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('platform', array('class' => 'form-control',
						'id' => 'autocomplete')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('image', array('type' => 'file')); ?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->