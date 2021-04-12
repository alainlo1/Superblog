<?php

    class User{

        private $id_users;
        private $pseudo;
        private $mail;
        private $password;

        public function id_users() {return $this->id_users;}
        public function pseudo() {return $this->pseudo;}
        public function mail() {return $this->mail;}
        public function password() {return $this->password;}

        public function setId_users($id){
            $this->id_users = (int) $id;
        }
        public function setPseudo($pseudo){
            $this->pseudo = $pseudo;
        }
        public function setMail($mail){
            $this->mail = $mail;
        }
        public function setPassword($password){
            $this->password = $password;
        }


        public function hydrate(array $donnees){
            foreach ($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if(method_exists($this,$method)){
                    $this->$method($value);
                }
            }
        }

    }


?>