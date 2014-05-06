<div class="cities view">
<h2><?php  echo __('Job'); ?></h2>
	<dl>
   
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($job['Job']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($job['Job']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expires'); ?></dt>
		<dd>
			<?php echo h($job['Job']['expires']); ?>
			&nbsp;
		</dd>
	</dl>
</div>