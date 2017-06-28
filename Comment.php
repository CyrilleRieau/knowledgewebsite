<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author rieau
 */
class Comment {

    protected $contenu;
    protected $date;
    protected $auteur;
    protected $upvotes = 0;
    protected $downvotes = 0;

    function __construct($contenu, DateTime $date, $auteur) {
        $this->contenu = $contenu;
        $this->date = $date;
        $this->auteur = $auteur;
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


}
