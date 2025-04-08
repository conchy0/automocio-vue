<?php
$password = "Automocio_1924x";
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
echo $hashed_password;
?>