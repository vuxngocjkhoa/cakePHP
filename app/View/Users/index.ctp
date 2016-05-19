<?php
    echo 'Languages: ' . $this->Html->link('Eng', array('language'=>'eng')) . ' | ';
    echo $this->Html->link('Vie', array('language'=>'vie')) . '<br/>';
?>
<br/>
 <?php echo $this->Html->link("Post", array('controller' => 'posts', 'action' => 'index'));?>
<br/>

<div class="users form">
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Created</th>
                <th>Last Update</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>                       
        <?php $count = 0; ?>
        <?php foreach($users as $user){?>                
        <?php $count++;?>
        <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
        <td><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
        <td><?php echo $this->Time->niceShort($user['User']['modified']); ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        </tr>
        <?php }; ?>
        <?php unset($user); ?>
        </tbody>
    </table>
</div>                
<?php echo $this->Html->link( "Logout",   array('action'=>'logout') ); ?>
