<!-- File: /app/View/Posts/add.ctp -->
<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>
<h1>Add a post</h1>

<?php
    echo $this->Form->create('Post');   //<form id="PostAddForm" method="post" action="/posts/add">
    echo $this->Form->input('title');   //text
    echo $this->Form->input('body', array('rows' => '3'));   //textarea
    echo $this->Form->end('Save');      // submit
?>
