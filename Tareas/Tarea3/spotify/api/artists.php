<?php

    header("Content-Type: application/json");
    include_once('../class/artist-class.php');

    switch($_SERVER['REQUEST_METHOD']){

        case 'POST':
            //Add an artist
        break;

        case 'GET':
            if(isset($_GET['id'])){
                Artist::getArtist();
            }else{
                Artist::getArtists();
            }
        break;
    }

?>