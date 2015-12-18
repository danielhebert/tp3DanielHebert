
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<div class="segments index">
		
			<h2><?php echo __('Segments'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('goodtime'); ?></th>
							<th><?php echo $this->Paginator->sort('tutorial_id'); ?></th>
							<th><?php echo $this->Paginator->sort('created'); ?></th>
							<th><?php echo $this->Paginator->sort('modified'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($segments as $segment): ?>
	<tr>
		<td><?php echo h($segment['Segment']['name']); ?>&nbsp;</td>
		<td><?php echo h($segment['Segment']['goodtime']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($segment['Tutorial']['name'], array('controller' => 'tutorials', 'action' => 'view', $segment['Tutorial']['id'])); ?>
		</td>
		<td><?php $created = $segment['Segment']['created'];
echo is_numeric($created) ? date("Y-m-d", $created) : h($created); ?>&nbsp;</td>
		<td><?php $modified = $segment['Segment']['modified'];
echo is_numeric($modified) ? date("Y-m-d", $modified) : h($modified); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $segment['Segment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $segment['Segment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $segment['Segment']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $segment['Segment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->