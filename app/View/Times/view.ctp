
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">
		
		<div class="times view">

			<h2><?php  echo __('Time'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($time['Time']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Time'); ?></strong></td>
		<td>
			<?php echo h($time['Time']['time']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Commentary'); ?></strong></td>
		<td>
			<?php echo h($time['Time']['commentary']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('User'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($time['User']['id'], array('controller' => 'users', 'action' => 'view', $time['User']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Segment'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($time['Segment']['name'], array('controller' => 'segments', 'action' => 'view', $time['Segment']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php $created = $time['Time']['created'];
			echo is_numeric($created) ? date("Y-m-d", $created) : h($created); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php $modified = $time['Time']['modified'];
			echo is_numeric($modified) ? date("Y-m-d", $modified) : h($modified); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
