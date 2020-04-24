<?php

    class Artist{
        private $id;
        private $name;
        private $albums;

        public function __constructor($id,$name,$albums){
            $this->id = $id;
            $this->name = $name;
            $this->albums = $albums;
        }

        public static function getArtists(){
            $contentArtists = file_get_contents('../data/artistas.json');
            echo $contentArtists;
        }

        public static function getArtist($id){
            $contentArtists = file_get_contents('../data/artistas.json');
            $artists = json_decode($contentArtists,true);
            echo json_encode($artists[$id]);
        }

        
        public function getId()
        {
                return $this->id;
        }

      
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        
        public function getName()
        {
                return $this->name;
        }

        
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

      
        public function getAlbums()
        {
                return $this->albums;
        }

        
        public function setAlbums($albums)
        {
                $this->albums = $albums;

                return $this;
        }
    }

?>