<?php

$title="Role list";
ob_start();?>

    <h1>Список ролей</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название роли</th>
            <th scope="col">Описание роли</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($roles))
            foreach ($roles as $role):?>
                <tr>
                    <td><?php echo  $role['id'];?></td>
                    <td><?php echo  $role['role_name']?></td>
                    <td><?php echo  $role['role_description']?></td>
                    <td>
                        <a href="/<?=APP_BASE_PATH?>/roles/edit/<?php echo $role['id'];?>" class="btn btn-primary">Обновить</a>
                        <form method="POST" action="/<?=APP_BASE_PATH?>/roles/delete/<?php echo $role['id']?>" class="d-inline-block">
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <a href="/<?=APP_BASE_PATH?>/roles/create" class="btn btn-primary">Создать роль</a>
<?php $content=ob_get_clean();
include "app/views/layout.php";?>