<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author rieau
 */
class User {

    protected $pseudo;
    protected $bio;
    protected $avatar;
    protected $age;
    protected $mail;
    protected $password;

    function __construct($pseudo, $bio, $avatar, $age, $mail, $password) {
        $this->pseudo = $pseudo;
        $this->bio = $bio;
        $this->avatar = $avatar;
        $this->age = $age;
        $this->mail = $mail;
        $this->password = $password;
    }

}
