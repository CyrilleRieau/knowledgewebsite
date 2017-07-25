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

namespace entities;

class Post {

    protected $contenu;
    protected $date;
    protected $auteur;
    protected $upvotes = 0;
    protected $downvotes = 0;
    protected $discipline;
    protected $titre;
    protected $tags;
    protected $user_id;
    protected $id;

public function __construct(string $contenu, $date, string $auteur, string $discipline, string $titre, string $tags, int $upvotes = NULL, int $downvotes= NULL, $user_id, int $id = NULL) {
        $this->contenu = $contenu;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->tags = $tags;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
        $this->user_id = $user_id;
        $this->id = $id;
    }
    
    function getContenu() {
        return $this->contenu;
    }

    function getDate() {
        return $this->date;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getUpvotes() {
        return $this->upvotes;
    }

    function getDownvotes() {
        return $this->downvotes;
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

    function getUser_id() {
        return $this->user_id;
    }

    function getId() {
        return $this->id;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    function setUpvotes($upvotes) {
        $this->upvotes = $upvotes;
    }

    function setDownvotes($downvotes) {
        $this->downvotes = $downvotes;
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

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setId($id) {
        $this->id = $id;
    }


}
