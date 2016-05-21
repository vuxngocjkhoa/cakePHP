<!-- File: /app/View/Posts/login.ctp -->
<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>
<br/>
<div class="actions">
    <?php echo $this->Html->link(
    'Register',array('controller' => 'users', 'action' => 'register')
);?>
</div>

<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
        <?php echo $this->Form->input(__('username'));
        echo $this->Form->input(__('password'));
    ?> <?php echo $this->Form->submit(__('Login'));?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
