<p>
	<strong>Hello <?php echo $username; ?></strong>
</p>

<p>To activate this account, follow this link: </p>
<p><?php echo $this->Html->link('Activate my account', $this->Html->url($link, true)); ?></p>