<?php

    header('Content-Type: application/json');
    include_once('../class/post-class.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
        break;

        case 'GET':
            if(isset($_GET['idUsuario'])){
                Post::getPosts();
            }if(isset($_GET['idPost'])){

            }else{

            }
        break;

        case 'PUT':
        break;

        case 'DELETE':
        break;
    }

?>