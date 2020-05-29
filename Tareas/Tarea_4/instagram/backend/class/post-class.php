<?php

    class Post{
        private $codigoPost;
        private $codigoUsuario;
        private $contenidoPost;
        private $imagen;
        private $cantidadLikes;

        public function __construct(
            $codigoPost,
            $codigoUsuario,
            $contenidoPost,
            $imagen,
            $cantidadLikes
        ){
            $this->contenidoPost = $codigoPost;
            $this->codigoUsuario = $codigoUsuario;
            $this->contenidoPost = $contenidoPost;
            $this->imagen = $imagen;
            $this->cantidadLikes = $cantidadLikes;
        }

        /**
         * Get the value of codigoPost
         */ 
        public function getCodigoPost()
        {
                return $this->codigoPost;
        }

        /**
         * Set the value of codigoPost
         *
         * @return  self
         */ 
        public function setCodigoPost($codigoPost)
        {
                $this->codigoPost = $codigoPost;

                return $this;
        }

        /**
         * Get the value of codigoUsuario
         */ 
        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        /**
         * Set the value of codigoUsuario
         *
         * @return  self
         */ 
        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        /**
         * Get the value of contenidoPost
         */ 
        public function getContenidoPost()
        {
                return $this->contenidoPost;
        }

        /**
         * Set the value of contenidoPost
         *
         * @return  self
         */ 
        public function setContenidoPost($contenidoPost)
        {
                $this->contenidoPost = $contenidoPost;

                return $this;
        }

        /**
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        /**
         * Get the value of cantidadLikes
         */ 
        public function getCantidadLikes()
        {
                return $this->cantidadLikes;
        }

        /**
         * Set the value of cantidadLikes
         *
         * @return  self
         */ 
        public function setCantidadLikes($cantidadLikes)
        {
                $this->cantidadLikes = $cantidadLikes;

                return $this;
        }

        public function getPosts($user_id){
            $users_content = file_get_contents('../data/usuarios.json');
            $users = json_decode($users_content,true);
            $user = null;
            for($i=0;$i<sizeof($users);$i++){
                if($users[$i]['codigoUsuario']== $user_id){
                    $user = $users[i];
                break;
                }
            }
            $posts_content = file_get_contents('../data/post.json');
            $post = json_decode($posts_content,true);
            $post_result = array();
            for($i=0;sizeof($post);$i++){
                if(in_array($post[$i]['codigoUsuario'],$user['siguiendo'])){
                    $post_result[] = $post[$i];
                }
                
            }

            echo json_encode($post_result);
        }
    }

?>