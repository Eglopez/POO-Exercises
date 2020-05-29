<?php

    header("Content-Type: application/json");
    include_once('../class/user-class.php');


    switch($_SERVER['REQUEST_METHOD']){

        case 'POST':
            //Add new User
        break;

        case 'GET':
            if(isset($_GET['id'])){
                User::getUser($_GET['id']);
            }else{
                User::getUsers();
            }
        break;

        case 'PUT':
            //Update User
        break;

        case 'DELETE':
            //Delete User
        break;
    }




?>