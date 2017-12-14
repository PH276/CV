<?php
// appelle la connexion à la BDD
require_once('parametres.inc.php');

class Contact
{
    // déclaration des variables = champs de la table t_commentaires.sql
    private $co_nom;
    private $co_email;
    private $co_sujet;
    private $co_message;

    private $pdoCV;

    public function __construct($co_nom, $co_email, $co_sujet, $co_message){

        $this->setCoNom($co_nom);
        $this->setCoEmail($co_email);
        $this->setCoSujet($co_sujet);
        $this->setCoMessage($co_message);

        $this->pdoCV = new PDO("mysql:host=".HOST.";dbname=".BDD, USER , PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    /**
    * Set the value of Co Nom
    *
    * @param mixed co_nom
    *
    * @return self
    */
    public function setCoNom($co_nom)
    {
        // on récupère les données rentrées par l'utilisateur
        $this->co_nom = htmlspecialchars($co_nom);

        return $this;
    }

    /**
    * Set the value of Co Email
    *
    * @param mixed co_email
    *
    * @return self
    */
    public function setCoEmail($co_email)
    {
        $this->co_email = htmlspecialchars($co_email);

        return $this;
    }

    /**
    * Set the value of Co Sujet
    *
    * @param mixed co_sujet
    *
    * @return self
    */
    public function setCoSujet($co_sujet)
    {
        $this->co_sujet = htmlspecialchars($co_sujet);

        return $this;
    }

    /**
    * Set the value of Co Message
    *
    * @param mixed co_message
    *
    * @return self
    */
    public function setCoMessage($co_message)
    {
        $this->co_message = htmlspecialchars($co_message);

        return $this;
    }

    public function valid(){
        // $retour = false;
        // $erreurnom = (empty($co_nom)) ? 'Indiquez votre nom' : null;
        // $erreuremail = (empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un email valide' : null;
        // $erreursujet = (empty($co_sujet)) ? 'Indiquez un sujet' : null;
        // $erreurmessage = (empty($co_message)) ? 'Parlez donc !!' : null;

        $retour = (!empty($this->co_nom) && !empty($this->co_email) && filter_var($this->co_email, FILTER_VALIDATE_EMAIL) && !empty($this->co_sujet) && !empty($this->co_message));
        return $retour;
    }



    // fonction d'insertion en BDD
    public function insertContact() {

        // on crée une requête puis on l'exécute
        $req = $this->pdoCV->prepare('INSERT INTO t_messages (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)');
        $req->execute([
            ':co_nom'	=> $this->co_nom,//n attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'^tre posté
            ':co_email'	=> $this->co_email,
            ':co_sujet'	=> $this->co_sujet,
            ':co_message'	=> $this->co_message]);

            // on ferme la requête pour protéger des injections
            $req->closeCursor();
        } // ---- fin function insertContact

        // Bonus - envoi d'un email
        public function sendEmail($to) {
            // $to = 'miatti.sebastien@live.fr';
            $headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
            $headers .= 'MIME-version: 1.0' . "\r\n";
            $headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";

            // on utilise la fonction mail() de PHP
            mail($to, $this->sujet, $this->message, $headers);
        }

    }
