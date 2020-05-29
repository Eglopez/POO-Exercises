<?php

    class Comment{
        private $codigoComentario;
        private $codigoPost;
        private $usuario;
        private $comentarios;

        public function __construct(
            $codigoComentario,
            $codigoPost,
            $usuario,
            $comentarios
        ){
            $this->codigoComentario = $codigoComentario;
            $this->codigoPost = $codigoPost;
            $this->usuario = $usuario;
            $this->comentarios = $comentarios;
        }

        /**
         * Get the value of codigoComentario
         */ 
        public function getCodigoComentario()
        {
                return $this->codigoComentario;
        }

        /**
         * Set the value of codigoComentario
         *
         * @return  self
         */ 
        public function setCodigoComentario($codigoComentario)
        {
                $this->codigoComentario = $codigoComentario;

                return $this;
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
         * Get the value of usuario
         */ 
        public function getUsuario()
        {
                return $this->usuario;
        }

        /**
         * Set the value of usuario
         *
         * @return  self
         */ 
        public function setUsuario($usuario)
        {
                $this->usuario = $usuario;

                return $this;
        }

        /**
         * Get the value of comentarios
         */ 
        public function getComentarios()
        {
                return $this->comentarios;
        }

        /**
         * Set the value of comentarios
         *
         * @return  self
         */ 
        public function setComentarios($comentarios)
        {
                $this->comentarios = $comentarios;

                return $this;
        }

        public function saveComment(){
            $comments_content = file_get_contents('../data/comentarios.json');
            $comments = json_decode($comments_content,true);
            $comments[] = array(
                'codigoComentario' => $this->codigoComentario,
                'codigoPost' => $this->codigoPost,
                'usuario' => $this->usuario,
                'comentario' => $this->comentarios
            );

            $file = fopen('../data/comentarios.json','w');
            fwrite($file,json_encode($comments));
            fclose($file);
        }
    }

?>