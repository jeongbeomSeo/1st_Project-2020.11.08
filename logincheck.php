<?php
include_once 'db.php';
include_once 'api.php';

if( !isset ( $_SESSION['isLogged'] ) ){
  header("Location: ./error.php?error='relogin'");
} else{
  header("Location: ./list.php");
}
?>