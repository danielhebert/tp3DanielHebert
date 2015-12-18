
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">
		
		<div class="segments view">

			<h2><?php  echo __('Segment'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($segment['Segment']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($segment['Segment']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Details'); ?></strong></td>
		<td>
			<?php echo h($segment['Segment']['details']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Goodtime'); ?></strong></td>
		<td>
			<?php echo h($segment['Segment']['goodtime']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Tutorial'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($segment['Tutorial']['name'], array('controller' => 'tutorials', 'action' => 'view', $segment['Tutorial']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($segment['User']['id'], array('controller' => 'users', 'action' => 'view', $segment['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php $created = $segment['Segment']['created'];
		echo is_numeric($created) ? date("Y-m-d", $created) : h($created); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php $modified = $segment['Segment']['modified'];
		echo is_numeric($modified) ? date("Y-m-d", $modified) : h($modified); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Times'); ?></h3>
				
				<?php if (!empty($segment['Time'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Commentary'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Segment Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($segment['Time'] as $time): ?>
		<tr>
			<td><?php echo $time['id']; ?></td>
			<td><?php echo $time['time']; ?></td>
			<td><?php echo $time['commentary']; ?></td>
			<td><?php echo $time['user_id']; ?></td>
			<td><?php echo $time['segment_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'times', 'action' => 'view', $time['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'times', 'action' => 'edit', $time['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'times', 'action' => 'delete', $time['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $time['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Time'), array('controller' => 'times', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
