<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Post
 *
 * @author rieau
 * 
 */
include_once'./Comment.php';

class Post extends Comment{
    protected $discipline;
    protected $titre;
    protected $tags;
    
    public function __construct($contenu, DateTime $date, $auteur, $id, $discipline, $titre, $tags) {
        parent::__construct($contenu, $date, $auteur, $id);
        $this->discipline = $discipline;
        $this->titre = $titre;
    $this->tags = $tags;
    }
    function getDiscipline() {
        return $this->discipline;
    }

    function getTitre() {
        return $this->titre;
    }

    function getTags() {
        return $this->tags;
    }

    function setDiscipline($discipline) {
        $this->discipline = $discipline;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setTags($tags) {
        $this->tags = $tags;
    }


}
