<?php

    header('Content-Type: application/json');
    include_once('../class/comment-class.php');
    $_POST = json_decode(file_get_contents('php://input'),true);

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            $comment = new Comment(
                $_POST['codigoComentario'],
                $_POST['codigoPost'],
                $_POST['usuario'],
                $_POST['comentarios']
            );
            $comment->saveComment();
        break;

        case 'GET':
        break;

        case 'PUT':
        break;

        case 'DELETE':
        break;
    }

?>