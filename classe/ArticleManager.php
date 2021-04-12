<?php
    require 'config/bdd.php';
    require 'Articleclass.php';

    class ArticleManager{
        private $bdd;
        
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }

        // a l initialisation de mon manager je lui donne la co a la bdd
        public function __construct($bdd){
            $this->setDb($bdd);
        }

        public function add(article  $article){
            $req = $this->bdd->prepare('INSERT INTO articles( titre, contenu_a,image_a) VALUES(:titre, :contenu_a, :image_a)');

             $req->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
             $req->bindValue(':contenu_a', $article->contenu_a(), PDO::PARAM_STR);
             $req->bindValue(':image_a', $article->image_a(), PDO::PARAM_STR);

            $req->execute();

        }

        public function delete(Article $article){
            $this->bdd->exec('DELETE FROM articles WHERE id_article = '.$article->id_article());
        }

        public function get($id){
            $id = (int) $id;
            $req = $this->bdd->prepare('SELECT * FROM articles WHERE id_article = ?');
            $req->execute(array($id));

            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            
            $article = new article();

            $article->hydrate($donnees);
            return $article;
        }

        public function getAll(){
            $articles = [];

            $req = $this->bdd->query('SELECT * FROM articles');

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $article = new article();
                $article->hydrate($donnees);
                $articles[] = $article;
            }
            return $articles;
        }

        public function update(article $article){
            $req = $this->bdd->prepare('UPDATE articles SET  titre = :titre, contenu_a = :contenu_a WHERE id_article = :id');

            $req->bindValue(':id', $article->id_article(), PDO::PARAM_INT);
            $req->bindValue(':titre', $article->titre(), PDO::PARAM_STR);
            $req->bindValue(':contenu_a', $article->contenu_a(), PDO::PARAM_STR);

            $req->execute();
            
        }

        


    }
?>