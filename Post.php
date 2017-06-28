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
    
    public function __construct($contenu, DateTime $date, $auteur, $discipline, $titre, $tags) {
        parent::__construct($contenu, $date, $auteur);
        $this->discipline = $discipline;
        $this->titre = $titre;
        $this->tags = $tags;
    }

}
