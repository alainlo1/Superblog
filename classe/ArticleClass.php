<?php
    class Article{

        private $id_article;
        private $titre;
        private $contenu_a;
        private $image_a;
        
        public function id_article() {return $this->id_article;}
        public function titre() {return $this->titre;}
        public function contenu_a() {return $this->contenu_a;}
        public function image_a() {return $this->image_a;}

        public function setId_article($id){
            $this->id_article = (int) $id;
        }
        public function setTitre($titre){
            $this->titre = $titre;
        }
        public function setContenu_a($contenu_a){
            $this->contenu_a = $contenu_a;
        }
        public function setImage_a($image_a){
            $this->image_a = $image_a;
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