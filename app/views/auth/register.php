<?php

$title="Register";
ob_start();?>
<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10">
    <h1>Регистрация</h1>
    <form action="/<?=APP_BASE_PATH?>/users/store" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Регистрация">
    </form>
    <div class="mt-4">
        <p>Уже есть аккаунт?<a href="/<?=APP_BASE_PATH?>/auth/login">Авторизуйтесь здесь</a> </p>
    </div>
    </div>
</div>





<?php $content=ob_get_clean();
include "app/views/layout.php";?>