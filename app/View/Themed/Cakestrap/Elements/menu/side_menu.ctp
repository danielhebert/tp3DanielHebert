	<div id="sidebar" class="col-sm-2">
		
		<div class="actions">
		
			<ul class="nav nav-pills nav-stacked">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Exploits') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Exploits'), array('controller' => 'exploits', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->read('Auth.User.Role.name') == "admin") {
								echo $this->Html->link(__('New Exploit'), array('controller' => 'exploits', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Games') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Games'), array('controller' => 'games', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->read('Auth.User.Role.name') == "admin") {
								echo $this->Html->link(__('New Game'), array('controller' => 'games', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Versions') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Versions'), array('controller' => 'versions', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->read('Auth.User.Role.name') == "admin") {
								echo $this->Html->link(__('New Version'), array('controller' => 'versions', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Roles') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->read('Auth.User.Role.name') == "admin") {
								echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Segments') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Segments'), array('controller' => 'segments', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') === '1') {
								echo $this->Html->link(__('New Segment'), array('controller' => 'segments', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Times') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Times'), array('controller' => 'times', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->check('Auth.User')) {
								echo $this->Html->link(__('New Time'), array('controller' => 'times', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>				
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Tutorials') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Tutorials'), array('controller' => 'tutorials', 'action' => 'index')); ?></li>
						<li><?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') === '1') {
								echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); 
							}?></li>
					</ul>
				</li>		
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Users') . '&nbsp;';?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
						<li><?php if (!$this->Session->check('Auth.User') || $this->Session->read('Auth.User.Role.name') == "admin") {
								echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); 
							}?></li>
						<li><?php if ($this->Session->check('Auth.User') && $this->Session->read('Auth.User.active') === '0') {
								echo $this->Html->link(__('Resend confirmation email'), array('controller' => 'users', 'action' => 'resendLink')); 
							}?></li>
					</ul>
				</li>	
			</ul>
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->