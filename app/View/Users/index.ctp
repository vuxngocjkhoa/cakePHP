<!-- File: /app/View/Posts/index.ctp -->
<div style='float: right; margin-right: 30px'>
    <?php
    echo $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
</div>

<br/>
<div class="actions">
    <?php
    if(AuthComponent::user('role') == 'author'){
        echo $this->Html->link("Add Post", array('controller' => 'posts', 'action' => 'add'));
    }else{
        echo $this->Html->link("Post", array('controller' => 'posts', 'action' => 'index'));
    }
?>
    <br/><br/>
    <?php echo $this->Html->link( "Logout",   array('action'=>'logout') ); ?>
</div>

<br/>
<div class="users form">
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th><?php echo __('Username') ?></th>
                <th><?php echo __('Created') ?></th>
                <th><?php echo __('Last Update') ?></th>
                <th><?php echo __('Role') ?></th>
            </tr>
        </thead>
        <tbody>                       
        <?php $count = 0; ?>
        <?php foreach($users as $user){?>                
        <?php $count++;?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $user['User']['username'];?></td>
                <td><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
                <td><?php echo $this->Time->niceShort($user['User']['modified']); ?></td>
                <td><?php echo $user['User']['role']; ?></td>
            </tr>
        <?php }; ?>
        <?php unset($user); ?>
        </tbody>
    </table>
</div>                

