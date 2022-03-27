<?php

DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
require "db/conn.php";

session_start();

unset($_SESSION['user']);

if (session_destroy()) {
	header("Location: 0index.php");
}
