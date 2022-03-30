<?php
class classOffre{
    private $id;
    private $ref;
    private $duree;
    private $ddebut;
    private $doffre;
    private $place;
    private $description;
    private $entreprise;

    function __construct($id, $ref, $duree, $ddebut, $doffre, $place, $description, $entreprise){
        $this->id = $id;
        $this->ref = $ref;
        $this->duree = $duree;
        $this->ddebut = $ddebut;
        $this->doffre = $doffre;
        $this->place = $place;
        $this->description = $description;
        $this->entreprise = $entreprise;
    }

    function get_id(){
        return $this->id;
    }
    function get_ref(){
        return $this->ref;
    }
    function get_duree(){
        return $this->duree;
    }
    function get_ddebut(){
        return $this->ddebut;
    }
    function get_doffre(){
        return $this->doffre;
    }
    function get_place(){
        return $this->place;
    }
    function get_description(){
        return $this->description;
    }
    function get_entreprise(){
        return $this->entreprise;
    }
}
?>