<?php
class classEntreprise{
    private $id;
    private $nom;
    private $mail;
    private $secteur;
    private $nb_stagiaire;
    private $invisible;

    function __construct($id, $nom, $mail, $secteur, $nb_stagiaire, $invisible){
        $this->id = $id;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->secteur = $secteur;
        $this->nb_stagiaire = $nb_stagiaire;
        $this->invisible = $invisible;
    }

    function get_id(){
        return $this->id;
    }
    function get_nom(){
        return $this->nom;
    }
    function get_mail(){
        return $this->mail;
    }
    function get_secteur(){
        return $this->secteur;
    }
    function get_nb_stagiaire(){
        return $this->nb_stagiaire;
    }
}
?>