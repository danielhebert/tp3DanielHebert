<div class="container">
	
</div>
<br />
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link(__("Home"), array(
                                            'controller' => 'games',
                                            'action' => 'index'),
                                            array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active">		
			<?php 
			if ($this->Session->check('Auth.User')) {
				echo $this->Html->link(__('Hello') . " " . $this->Session->read('Auth.User.username') . "(" . $this->Session->read('Auth.User.Role.name') . ")",
										array('controller' => 'users', 'action' => 'view', $this->Session->read('Auth.User.id')));
				echo "</li><li>";
				echo $this->Html->link(__('Logout'), array(
					'controller' => 'users',
					'action' => 'logout'));
			} else {
				echo $this->Html->link(__('Login'), array(
					'controller' => 'users',
					'action' => 'login')
				);
				echo "</li><li>";
				echo $this->Html->link(__('Register'), array(
					'controller' => 'users',
					'action' => 'add')
				);
			}
			?>
		<li>
			<?php
				echo $this->Html->link(__('About'), array(
					'controller' => 'pages',
					'action' => 'about')
				);
			?>
		</li>
		</li>
			<li class="dropdown">
				<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">__('Languages') <b class="caret"></b></a> -->
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('Languages'); ?> <b class="caret"></b></a>
				<!-- <?php echo $this->Html->link(__('Languages') . $this->Html->tag('span', ' ', array('class' => 'caret')), "#", array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown')); ?> -->
				<ul class="dropdown-menu">
                <?php echo $this->I18n->flagSwitcher(array(
				   'class' => 'languages',
				   'id' => 'language-switcher'
					));
                ?>
				</ul>
			</li>
		</ul><!-- /.nav navbar-nav -->
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->