<?php

    header('Content-Type: application/json');
    include_once('../class/user-class.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
        break;

        case 'GET':
            if(isset($_GET['id'])){
                User::getUser($_GET['id']);
            }else{
                User::getUsers();
            }
        break;

        case 'PUT':
        break;

        case 'DELETE':
        break;
    }

?>