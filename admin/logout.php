<?php
require_once "../properties/methods.php";
require_once "../properties/connection.php";

unset($_SESSION['user']);
session_unset();
session_destroy();
redirectTo();