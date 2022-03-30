<?php
class classCompte{
    private $id;
    private $ident;
    private $mdp;
    private $nom;
    private $prenom;
    private $mail;
    private $id_etud;
    private $id_pilote;
    private $id_deleg;
    private $id_admin;

    function __construct($id, $ident, $mdp, $nom, $prenom, $mail, $id_etud, $id_pilote, $id_deleg, $id_admin){
        $this->id = $id;
        $this->ident = $ident;
        $this->mdp = $mdp;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->id_etud = $id_etud;
        $this->id_pilote = $id_pilote;
        $this->id_deleg = $id_deleg;
        $this->id_admin = $id_admin;
    }

    function get_id(){
        return $this->id;
    }
    function get_ident(){
        return $this->ident;
    }
    function get_mdp(){
        return $this->mdp;
    }
    function get_nom(){
        return $this->nom;
    }
    function get_prenom(){
        return $this->prenom;
    }
    function get_mail(){
        return $this->mail;
    }
    function get_id_etud(){
        return $this->id_etud;
    }
    function get_id_pilote(){
        return $this->id_pilote;
    }
    function get_id_deleg(){
        return $this->id_deleg;
    }
    function get_id_admin(){
        return $this->id_admin;
    }
}
?>