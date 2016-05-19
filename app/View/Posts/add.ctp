<!-- File: /app/View/Posts/add.ctp -->
<?php
    echo 'Languages: ' . $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
<br/>
<h1>Add a post</h1>

<?php
    echo $this->Form->create('Post');   //<form id="PostAddForm" method="post" action="/posts/add">
    echo $this->Form->input('title');   //text
    echo $this->Form->input('body', array('rows' => '3'));   //textarea
    echo $this->Form->end('Save');      // submit
?>
