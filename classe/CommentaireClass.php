<?php
    class Commentaire{

        private $id_commentaire;
        private $com_p;
        private $contenu_c;
        private $date_pub;
        private $id_article;
        
        public function id_commentaire() {return $this->id_commentaire;}
        public function com_p() {return $this->com_p;}
        public function contenu_c() {return $this->contenu_c;}
        public function date_pub() {return $this->date_pub;}
        public function id_article() {return $this->id_article;}

        public function setId_commentaire($id){
            $this->id_commentaire = (int) $id;
        }
        public function setId_article($id){
            $this->id_article = (int) $id;
        }
        public function setCom_p($com_p){
            $this->com_p = $com_p;
        }
        public function setContenu_c($contenu_c){
            $this->contenu_c = $contenu_c;
        }
        public function setDate_pub($date_pub){
            $this->date_pub = $date_pub;
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