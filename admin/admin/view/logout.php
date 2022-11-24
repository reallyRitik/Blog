<?php
include '../config/config.php';
include '../config/function.php';
session_destroy();
unset($GLOBALS);
redirect("login");
?>