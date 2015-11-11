
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">
		
		<div class="versions view">

			<h2><?php  echo __('Version'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($version['Version']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Game'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($version['Game']['name'], array('controller' => 'games', 'action' => 'view', $version['Game']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($version['Version']['name']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Tutorials'); ?></h3>
				
				<?php if (!empty($version['Tutorial'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Rules'); ?></th>
		<th><?php echo __('Version Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($version['Tutorial'] as $tutorial): ?>
		<tr>
			<td><?php echo $tutorial['id']; ?></td>
			<td><?php echo $tutorial['name']; ?></td>
			<td><?php echo $tutorial['rules']; ?></td>
			<td><?php echo $tutorial['version_id']; ?></td>
			<td><?php echo $tutorial['user_id']; ?></td>
			<td><?php echo $tutorial['created']; ?></td>
			<td><?php echo $tutorial['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tutorials', 'action' => 'view', $tutorial['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tutorials', 'action' => 'edit', $tutorial['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tutorials', 'action' => 'delete', $tutorial['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $tutorial['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
