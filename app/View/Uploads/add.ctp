<?php
    echo $form->create('Upload', array('type' => 'file'));
    echo $form->input('file', array('type' => 'file'));
    echo $form->end();
?>