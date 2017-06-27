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
    function getPseudo() {
        return $this->pseudo;
    }

    function getBio() {
        return $this->bio;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getAge() {
        return $this->age;
    }

    function getMail() {
        return $this->mail;
    }

    function getPassword() {
        return $this->password;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setBio($bio) {
        $this->bio = $bio;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setPassword($password) {
        $this->password = $password;
    }



}
