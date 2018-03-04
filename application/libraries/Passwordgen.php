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
}