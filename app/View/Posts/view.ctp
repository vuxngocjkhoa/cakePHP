<!-- File: /app/View/Posts/view.ctp -->
<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>
<br/>
<h1><?php echo 'Title: ' . $post['Post']['title']; ?></h1> 
<p><?php echo 'Content: ' . h($post['Post']['body']); ?></p>
<p><small><?php echo $post['Post']['created']; ?></small></p>
<p>
<?php echo $this->Html->link('Back',array('controller' => 'posts', 'action' => 'index')); ?>
</p>
