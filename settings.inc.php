<?php
    //general
    define("PATH", realpath($_SERVER["DOCUMENT_ROOT"]) . "/CookingManagement/");
    define("USE_LANGUAGE", 0);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    //database
    define("DB_HOST", "");
    define("DB_USER", "");
    define("DB_PASSWORD", "");
    define("DB_NAME", "");
    define("DB_CHARSET", "");
?>