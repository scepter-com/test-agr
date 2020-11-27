<?php

use app\DataBase;
require_once 'app/DataBase.php';
$data_base = new DataBase();

$username = $_POST['username'];
$display_name = $_POST['displayName'];
$description = $_POST['description'];

$query = "INSERT INTO users (id, username, display_name, description) VALUES (NULL, :username, :display_name, :description)";
$statement = $data_base->getPDO()->prepare($query);
$parameters = array(
    'username' => $username,
    'display_name' => $display_name,
    'description' => $description);

if($statement->execute($parameters))
{
    echo 'Запись создана. Перезагрузите страницу.';
}
else
{
    echo 'Ошибка';
}

