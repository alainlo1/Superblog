<?php
    require 'config/bdd.php';
    require 'Commentaireclass.php';

    class CommentaireManager{
        private $bdd;
        
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }

        // a l initialisation de mon manager je lui donne la co a la bdd
        public function __construct($bdd){
            $this->setDb($bdd);
        }

        public function add(Commentaire  $commentaire){
            $req = $this->bdd->prepare('INSERT INTO commentaires( com_p, contenu_c, date_pub, id_article) VALUES(:com_p, :contenu_c, NOW(), :id)');

             $req->bindValue(':com_p', $commentaire->com_p(), PDO::PARAM_STR);
             $req->bindValue(':contenu_c', $commentaire->contenu_c(), PDO::PARAM_STR);
             $req->bindValue(':id', $commentaire->id_article(), PDO::PARAM_INT);
            $req->execute();

        }

         public function get($id){
             $id = (int) $id;
             $req = $this->bdd->prepare('SELECT * FROM commentaires WHERE id_commentaire = ?');
             $req->execute(array($id));

             $donnees = $req->fetch(PDO::FETCH_ASSOC);
            
             $commentaire = new commentaire();

             $commentaire->hydrate($donnees);
            return $commentaire;
         }

        public function getAll(){
            $commentaires = [];

            $req = $this->bdd->query('SELECT * FROM commentaires');

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $commentaire = new commentaire();
                $commentaire->hydrate($donnees);
                $commentaires[] = $commentaire;
            }
            return $commentaires;
        }

        public function getByArticle($id) {
            $commentaires = [];
            
            $req = $this->bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ');
            $req->execute(array($id));

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $commentaire = new commentaire();
                $commentaire->hydrate($donnees);
                $commentaires[] = $commentaire;
            }
            return $commentaires;
        }

    }
?>