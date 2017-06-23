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
 */
class Post {
    protected $discipline;
    protected $titre;
    protected $contenu;
    protected $upvotes;
    protected $date;
    protected $auteur;
    protected $tags;
    
    function __construct($discipline, $titre, $contenu, $upvotes, $date, $auteur, $tags) {
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->upvotes = $upvotes;
        $this->date = $date;
        $this->auteur = $auteur;
        $this->tags = $tags;
    }

}
