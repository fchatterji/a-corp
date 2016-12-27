<?php


class UtilisateurControleur
{
    var $manager;
    
    public function __construct()
    {
        $this->manager = new UtilisateurManager();
    }
    
    public function Index()
    {
        $this->Liste();
    }
    
    public function Liste()
    {
        $this->manager->Test();
        $utilisateurs = $this->manager->listeUtilisateurs();
        
        include "Vues/Utilisateurs/ListeUtilisateursVue.php";
    }
    
    public function Detail()
    {
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $utilisateur = $this->manager->detailUtilisateur($id);

            include "Vues/Utilisateurs/DetailUtilisateurVue.php";
        }
    }
    
    public function Sauver()
    {
        if(isset($_SESSION['idUtilisateur']))
        {
            if(isset($_POST['login']))
            {
                if($_SESSION['token'] == $_POST['token'])
                {
                $erreurs = [];
                $login = filter_input(INPUT_POST,"login",FILTER_SANITIZE_SPECIAL_CHARS);

                if(empty($login))
                    $erreurs["login"] = "le login doit être renseigné.";

                else if(filter_var($login, FILTER_CALLBACK, array("options" => array("Filtres","VerifierLogin"))) === false)
                {
                    $erreurs["login"] = "le login a des caractères non acceptés.";
                }

                $utilisateur = new Utilisateur();
                $utilisateur->id = $_POST["id"];
                $utilisateur->login = $login;
                $utilisateur->mail = filter_input(INPUT_POST, "mail",FILTER_SANITIZE_SPECIAL_CHARS);

                if(count($erreurs) == 0)
                {
                    $this->manager->SauverUtilisateur($utilisateur);

                    include "Vues/Utilisateurs/DetailUtilisateurVue.php";
                }
                else
                    include "Vues/Utilisateurs/EditionUtilisateurVue.php";
                }
                else
                {
                    echo "Tentative CSRF";
                }
            }
        }
    }
    
    
    public function Edition()
    {
        if(isset($_SESSION['idUtilisateur']))
        {
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $utilisateur = $this->manager->detailUtilisateur($id);
                $token = uniqid(rand(), true);
                $_SESSION['token'] = $token;
                include "Vues/Utilisateurs/EditionUtilisateurVue.php";
            }
        }
        else
        {
            echo "Erreur 403";
        }
    }
    
    public function Authentification()
    {
        include "Vues/Utilisateurs/AuthentificationVue.php";
    }
    
    public function Connexion()
    {
        if(isset($_POST['login']))
        {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            
            if(($id = $this->manager->Connexion($login, $mdp)) !== false)
            {
                $_SESSION['idUtilisateur'] = $id;
            }
            else
            {
                $_SESSION['idUtilisateur'] = null;
            }
        }
    }
    
}
