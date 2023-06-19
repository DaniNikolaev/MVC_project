<?php

$title="Authorization";
ob_start();?>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <h1>Авторизация</h1>
            <form action="/<?=APP_BASE_PATH?>/auth/authenticate" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Авторизация">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>
            </form>
            <div class="mt-4">
                <p>Нет аккаунта?<a href="/<?=APP_BASE_PATH?>/auth/register">Зарегистрируйтесь здесь</a> </p>
            </div>
        </div>
    </div>

<?php $content=ob_get_clean();
include "app/views/layout.php";?>