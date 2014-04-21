<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('action' => 'add')); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php 
        	echo $this->Form->input('username');
        	echo $this->Form->input('email');
        	echo $this->Form->input('birthday');
        	echo $this->Form->input('password');
    	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>