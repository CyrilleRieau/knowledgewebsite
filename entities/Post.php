<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities;

/**
 * Description of Post
 *
 * @author rieau
 */
include_once'./entities/Comment.php';

class Post extends Comment {

    protected $discipline;
    protected $titre;
    protected $tags;
    protected $id;

    public function __construct(string $contenu, $date, string $auteur, string $discipline, string $titre, string $tags, int $id=NULL) {
        parent::__construct($contenu, $date, $auteur);
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->tags = $tags;
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
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
