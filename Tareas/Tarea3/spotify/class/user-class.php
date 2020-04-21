<?php

    class User{
        private $id;
        private $name;
        private $playList;



        public function __construct($id,$name,$playList){
            $this->id = $id;
            $this->name = $name;
            $this->playlist = $playlist; 
        }

        public static function getUsers(){
            $contentUsers = file_get_contents('../data/usuarios.json');
            echo $contentUsers;
            $users = json_decode($contentUsers,true);
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

       
        public function getPlayList()
        {
                return $this->playList;
        }

       
        public function setPlayList($playList)
        {
                $this->playList = $playList;

                return $this;
        }

        
    }   

?>