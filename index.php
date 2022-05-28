<?php
    require_once("./lib/system/core.class.php");

    $core = new core(htmlspecialchars($_GET["page"]));
    $core->process();
    $core->show();
?>