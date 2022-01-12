<?php

require_once "../includes/methods.php";
require_once "../includes/db.config.php";

unset($_SESSION['user']);
session_unset();
session_destroy();
redirectTo();