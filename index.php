<?php
    require_once("./lib/system/core.class.php");

    spl_autoload_register(function ($model_class) {
        require_once PATH . "/lib/" . $model_class . ".class.php";
    });

    $core = new core();
    $core->process();
    $core->show();
?>