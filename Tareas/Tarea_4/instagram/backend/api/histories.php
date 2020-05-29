<?php

    header('Content-Type: application/json');
    include_once('../class/history-class.php');

    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
        break;

        case 'GET':
            if(isset($_GET['idUsuario'])){
                History::getUserHistories();
            }if(isset($_GET['idHistoria'])){

            }else{

            }
        break;

        case 'PUT':
        break;

        case 'DELETE':
        break;
    }

?>