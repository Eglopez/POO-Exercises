<?php

    header('Content-Type: application/json');
    include_once('../class/post-class.php');
    $_POST = json_decode(file_get_contents('php://input'),true);

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $post = new Post(
                $_POST['codigoPost'],
                $_POST['codigoUsuario'],
                $_POST['contenidoPost'],
                $_POST['imagen'],
                $_POST['cantidadLikes']
            );
            $post->savePost();
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