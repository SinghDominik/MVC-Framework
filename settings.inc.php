<?php
    //general
    define("PATH", realpath($_SERVER["DOCUMENT_ROOT"]) . "/MVCFramework/");
    define("USE_LANGUAGE", 0);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    //database
    define("DB_HOST", "127.0.0.1");
	define("DB_USER", "root");
	define("DB_PASSWORD", "");
	define("DB_DATABASE", "");
    define("DB_CHARSET", "utf8");
?>