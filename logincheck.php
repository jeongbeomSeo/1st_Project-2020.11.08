<?php
include_once 'db.php';
include_once 'api.php';

if (!isset($_SESSION['isLogged'])) {
  error('relogin');
}
?>