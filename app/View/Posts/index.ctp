<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>
<br/>
<div class="actions">
    <?php echo $this->Html->link("User", array('controller' => 'Users', 'action' => 'index'));?>
    <br/><br/>
    <?php echo $this->Html->link('Add a post',array('controller' => 'posts', 'action' => 'add'));?>
    <br/><br/>
    <?php echo $this->Html->link( "Logout",   array('controller' => 'Users','action'=>'logout') ); ?>
</div>


<table>
    <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <!-- Duyệt và hiển thị các bài post -->
    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <!-- Hiển thị title bài post và link tới phương thức view() trong PostsController với id tương ứng -->
            <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    __('Delete'),
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Bạn chắc chắn muốn xóa bài post này?')
                );
            ?> | 
            <?php
                echo $this->Html->link(
                    'Update', array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

