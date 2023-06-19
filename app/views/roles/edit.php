<?php

$title="Edit role";
ob_start();?>
    <h1>Изменить роль</h1>
    <form action="/<?=APP_BASE_PATH?>/roles/update/<?php echo $role['id']?>" method="post">
        <div class="mb-3">
            <label for="role_name">Название роли:</label>
            <input type="text" class="form-control" id="role_name" name="role_name" value="<?php echo $role['role_name']?>" required>
        </div>
        <div class="mb-3">
            <label for="role_description">Описание роли:</label>
            <textarea class="form-control" id="role_description" name="role_description" required><?php echo $role['role_description']?></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Обновить роль">
    </form>


<?php $content=ob_get_clean();
include "app/views/layout.php";?>