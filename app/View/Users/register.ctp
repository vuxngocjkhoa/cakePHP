<!-- File: /app/View/Posts/register.ctp -->
<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>
<?php echo $this->Html->link(_('Login'), array('controller' => 'users', 'action' => 'login')) ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Register'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>