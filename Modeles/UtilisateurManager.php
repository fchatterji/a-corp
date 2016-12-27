<?php

require_once "utilisateur.php";

class UtilisateurManager {

    var $utilisateurs = [];
    var $bdd;

    public function __construct() {
        $this->bdd = Connexion::Bdd();
    }

    public function ListeUtilisateurs() {
        $resultats = $this->bdd->query("select * from utilisateur");
        
        $data = $resultats->fetchAll(PDO::FETCH_OBJ);
        
        $utilisateurs = [];
        foreach($data as $u)
        {
            $utilisateur = new Utilisateur();
            $utilisateur->id = $u->id;
            $utilisateur->login = $u->login;
            
            $utilisateurs[] = $utilisateur;
            
        }
        return $utilisateurs;
    }

    public function DetailUtilisateur($id) {
        
        $rq = "select * from utilisateur where id = :id";
        
        $rq_prep = $this->bdd->prepare($rq);
        
        $rq_prep->bindValue("id", $id, PDO::PARAM_INT);
        $rq_prep->execute();
        
        $data = $rq_prep->fetch(PDO::FETCH_OBJ);
        
        $utilisateur = new Utilisateur();
        $utilisateur->id = $data->id;
        $utilisateur->login = $data->login;
        $utilisateur->mail = $data->mail;

        return $utilisateur;
    }
    
    
    public function SauverUtilisateur($utilisateur) {
        
        $rq = "update utilisateur set login=:login, mail=:mail where id = :id";
        
        $rq_prep = $this->bdd->prepare($rq);
        $rq_prep->bindValue("id", $utilisateur->id, PDO::PARAM_INT);
        $rq_prep->bindValue("login", $utilisateur->login, PDO::PARAM_STR);
        $rq_prep->bindValue("mail", $utilisateur->mail, PDO::PARAM_STR);
        $rq_prep->execute();
        
    }
    
    
    
    public function Connexion($login, $mdp)
    {
        $rq = "select id, mdp from utilisateur where login =:login ";
        
        $rq_prep = $this->bdd->prepare($rq);
        $rq_prep->bindValue("login", $login, PDO::PARAM_STR);
        $rq_prep->execute();
        
        $data = $rq_prep->fetch(PDO::FETCH_OBJ);
    
        
        if($data != null)
        {
            if(password_verify($mdp, $data->mdp))
                return $data->id;
        }
        return false;
    }

    public function Test()
    {
         $rq = "update utilisateur set mdp=:mdp";
        
        $rq_prep = $this->bdd->prepare($rq);
        
        $rq_prep->bindValue("mdp", password_hash("motdepasse", PASSWORD_BCRYPT), PDO::PARAM_STR);
        
        $rq_prep->execute();
    }
}
