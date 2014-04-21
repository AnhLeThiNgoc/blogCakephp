<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Upload', array('action' => 'add')); ?>
    <fieldset>
        <legend><?php echo __('Add file'); ?></legend>
        <?php 
        
        echo $this->form->create('Upload', array('type' => 'file'));
        echo $this->form->input('file', array('type' => 'file'));
        echo $this->form->end();
    	?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
