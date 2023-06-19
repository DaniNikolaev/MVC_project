<?php

$title="Home page";
ob_start();?>

    <h1>Домашняя страница</h1>


<?php $content=ob_get_clean();
include "app/views/layout.php";?>