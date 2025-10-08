<?php

$json = file_get_contents('data/users.json');
$users = json_decode($json, true);

foreach($users as $user)
{
    echo $user;
}