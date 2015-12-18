
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">
		
		<div class="tutorials view">

			<h2><?php  echo __('Tutorial'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($tutorial['Tutorial']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($tutorial['Tutorial']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Rules'); ?></strong></td>
		<td>
			<?php echo h($tutorial['Tutorial']['rules']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Game'); ?></strong></td>
		<td>
			<?php 
			if($tutorial['Version']['game_id'] != null) { 
				echo $this->Html->link($tutorial['Version']['Game']['name'], array('controller' => 'games', 'action' => 'view', $tutorial['Version']['Game']['id']));
				}
			?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Version'); ?></strong></td>
		<td>
			<?php echo h($tutorial['Version']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($tutorial['User']['id'], array('controller' => 'users', 'action' => 'view', $tutorial['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php $created = $tutorial['Tutorial']['created'];
			echo is_numeric($created) ? date("Y-m-d", $created) : h($created); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php $modified = $tutorial['Tutorial']['modified'];
			echo is_numeric($modified) ? date("Y-m-d", $modified) : h($modified); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

					
			<div class="related">

				<h3><?php echo __('Related Segments'); ?></h3>
				
				<?php if (!empty($tutorial['Segment'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Tutorial Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($tutorial['Segment'] as $segment): ?>
		<tr>
			<td><?php echo $segment['id']; ?></td>
			<td><?php echo $segment['name']; ?></td>
			<td><?php echo $segment['details']; ?></td>
			<td><?php echo $segment['tutorial_id']; ?></td>
			<td><?php echo $segment['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'segments', 'action' => 'view', $segment['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'segments', 'action' => 'edit', $segment['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'segments', 'action' => 'delete', $segment['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $segment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Segment'), array('controller' => 'segments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

					
			<div class="related">

				<h3><?php echo __('Related Exploits'); ?></h3>
				
				<?php if (!empty($tutorial['Exploit'])): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
											<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Details'); ?></th>
									<th class="actions"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
										$i = 0;
										foreach ($tutorial['Exploit'] as $exploit): ?>
		<tr>
			<td><?php echo $exploit['id']; ?></td>
			<td><?php echo $exploit['name']; ?></td>
			<td><?php echo $exploit['details']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'exploits', 'action' => 'view', $exploit['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'exploits', 'action' => 'edit', $exploit['id']), array('class' => 'btn btn-default btn-xs')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'exploits', 'action' => 'delete', $exploit['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $exploit['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table><!-- /.table table-striped table-bordered -->
					</div><!-- /.table-responsive -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Exploit'), array('controller' => 'exploits', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- /.actions -->
				
			</div><!-- /.related -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
