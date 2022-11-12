<?php 

// $password = 'secret';
$password = '123456';

// $hash = password_hash($password, PASSWORD_DEFAULT);

// echo $hash;

$hash = '$2y$10$xi3KnvVKKNjfRoLhxozaOuo2XVVKQJ7VT4YXlU44ndYG0Th400eQO';

var_dump(password_verify($password, $hash));

?>