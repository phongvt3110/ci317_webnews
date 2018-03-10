<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwordgen {

    public function encodepass($pass)
    {
        return base64_encode($pass);
    }
    public function decodepass($pass){
        return base64_decode($pass);
    }
    public function genpass($pass){
        return base64_encode(password_hash($pass,PASSWORD_DEFAULT));
    }
    public function verify_pass($passchecked,$pass){
        if(password_verify($passchecked,base64_decode($pass))){
            return true;
        } else return false;
    }
}