<?php

$title="Create role";
ob_start();?>
    <h1>Создать роль</h1>
    <form action="/<?=APP_BASE_PATH?>/roles/store" method="post">
        <div class="form-group">
            <label for="role_name">Название роли:</label>
            <input type="text" class="form-control" id="role_name" name="role_name" required>
        </div>
        <div class="form-group">
            <label for="role_description">Описание роли:</label>
            <textarea сlass="form-control" id="role_description" name="role_description" required></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Создать роль">
    </form>


<?php $content=ob_get_clean();
include "app/views/layout.php";?>