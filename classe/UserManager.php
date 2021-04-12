<?php
    require 'config/bdd.php';
    require 'Userclass.php';

    class UserManager{
        private $bdd;
        
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }

        // a l initialisation de mon manager je lui donne la co a la bdd
        public function __construct($bdd){
            $this->setDb($bdd);
        }

        public function add(User  $user){
            $req = $this->bdd->prepare('INSERT INTO users(pseudo, mail, password) VALUES(:pseudo, :mail, :password)');

            $req->bindValue(':pseudo', $user->pseudo(), PDO::PARAM_STR);
            $req->bindValue(':mail', $user->mail(), PDO::PARAM_STR);
            $req->bindValue(':password', $user->password(), PDO::PARAM_STR);

            $req->execute();

        }

        public function delete(User $user){
            $this->bdd->exec('DELETE FROM users WHERE id_users = '.$user->id_users());
        }

        public function get($id){
            $id = (int) $id;
            $req = $this->bdd->prepare('SELECT * FROM users WHERE id_users = ?');
            $req->execute(array($id));

            
            $donnees = $req->fetch(PDO::FETCH_ASSOC);        
            $user = new User();

            $user->hydrate($donnees);
            return $user;
        }

        public function getAll(){
            $users = [];

            $req = $this->bdd->query('SELECT * FROM users');

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $user = new User();
                $user->hydrate($donnees);
                $users[] = $user;
            }
            return $users;
        }

        public function update(User $user){
            $req = $this->bdd->prepare('UPDATE users SET pseudo = :pseudo, mail = :mail, password = :password WHERE id_users = :id');

            $req->bindValue(':id', $user->id_users(), PDO::PARAM_INT);
            $req->bindValue(':pseudo', $user->pseudo(), PDO::PARAM_STR);
            $req->bindValue(':mail', $user->mail());
            $req->bindValue(':password', $user->password(), PDO::PARAM_STR);

            $req->execute();
            
        }

        public function login($pseudo){
                $req = $this->bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
                $req->execute(array($pseudo));
                if($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                    $user = new User();
                    $user->hydrate($donnees);
                    return $user;
                }else{
                    return false;
                }
        }

        


    }
?>