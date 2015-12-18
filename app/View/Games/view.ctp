
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">
		
		<div class="games view">

			<h2><?php  echo __('Game'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($game['Game']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Platform'); ?></strong></td>
		<td>
			<?php echo h($game['Game']['platform']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Image'); ?></strong></td>
		<td>
		<?php if ($game['Game']['image']) echo $this->Html->image($game['Game']['image'], array('escape' => false));?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Versions'); ?></h3>
				
				<?php if (!empty($game['Version'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><?php echo __('Id'); ?></th>
									<th><?php echo __('Name'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($game['Version'] as $Version): ?>
		<tr>
			<td><?php echo $Version['id']; ?></td>
			<td><?php echo $Version['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'Versions', 'action' => 'view', $Version['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'Versions', 'action' => 'edit', $Version['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'Versions', 'action' => 'delete', $Version['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $Version['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Version'), array('controller' => 'Versions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
