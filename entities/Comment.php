<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entities;

use DateTime;

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
    protected $post_id;
    protected $user_id;
    protected $id;

    function __construct(string $contenu, $date, string $auteur, int $upvotes = NULL, int $downvotes= NULL, $post_id, $user_id, int $id = NULL) {
        $this->contenu = $contenu;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->upvotes = $upvotes;
        $this->downvotes = $downvotes;
        $this->post_id = $post_id;
        $this->user_id = $user_id;
        $this->id = $id;
    }
    
    
function getContenu(){
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
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getPost_id() {
        return $this->post_id;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setPost_id($post_id) {
        $this->post_id = $post_id;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }



}


