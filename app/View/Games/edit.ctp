<?php $this->Html->script('View/Platforms/onEdit', array('inline' => false)); ?>
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<h2><?php echo __('Edit Game'); ?></h2>

		<div class="games form">
		
			<?php echo $this->Form->create('Game', array('role' => 'form', 'type' => 'file')); ?>

				<fieldset>

					<div class="form-group">
						<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('platform', array('class' => 'form-control',
						'id' => 'autocomplete')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('image', array('type' => 'file')); ?>
						<?php 
							if ($this->request->data['Game']['image']) {
								echo $this->Html->image($this->request->data['Game']['image'], array('escape' => false));
							} else {
								echo $this->Html->div('well', __('This game has no image.'));
							}?>
					</div><!-- .form-group -->

					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->