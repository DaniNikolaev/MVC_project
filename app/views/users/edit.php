<?php

$title="Edit user";
ob_start();?>
    <h1>Изменить пользователя</h1>
    <form action="/<?=APP_BASE_PATH?>/users/update/<?php echo $user['id'];?>" method="post">
        <div class="mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']?>" required>
        </div>
        <div class="mb-3">
            <label for="email">email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']?>" required>
        </div>
        <div class="mb-3">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role">
                <?php if (isset($roles)){
                foreach ($roles as $role):?>
                    <option value="<?php echo $role['id'];?>" <?php echo $user['role']==$role['id']?'selected':"";?>><?php echo $role['role_name'];?></option>
                <?php endforeach;}?>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Обновить пользователя">
    </form>

<?php $content=ob_get_clean();
include "app/views/layout.php";?>
