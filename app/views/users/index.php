<?php

$title="User list";
ob_start();?>

<h1>Список пользователей</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Email verification</th>
        <th scope="col">Is admin</th>
        <th scope="col">Role</th>
        <th scope="col">Is active</th>
        <th scope="col">Last login</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($users))
        foreach ($users as $user):?>
        <tr>
            <td><?php echo $user['id'];?></td>
            <td><?php echo  $user['username']?></td>
            <td><?php echo  $user['email']?></td>
            <td><?php echo  $user['email_verification']?"Yes":"No";?></td>
            <td><?php echo  $user['is_admin']?"Yes":"No";?></td>
            <td><?php if (isset($roles))
                    foreach ($roles as $role)
                        if ($role['id']==$user['role'])
                            echo $role['role_name'];
                ?>
            </td>
            <td><?php echo  $user['is_active']?"Yes":"No";?></td>
            <td><?php echo  $user['last_login']?></td>
            <td><?php echo  $user['created_at'];?></td>
            <td>
                <a href="/<?=APP_BASE_PATH?>/users/edit/<?php echo $user['id'];?>" class="btn btn-primary">Изменить</a>
                <a href="/<?=APP_BASE_PATH?>/users/delete/<?php echo $user['id'];?>" class="btn btn-danger">Удалить</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
<a href="/<?=APP_BASE_PATH?>/users/create" class="btn btn-primary">Создать пользователя</a>
<?php $content=ob_get_clean();
include "app/views/layout.php";?>