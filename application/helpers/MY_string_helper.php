<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('cutnchar') )
{
    function cutnchar( $str = NULL, $n = 0)
    {
        if(strlen($str) < $n) return $str;
        $html = substr($str, 0, $n);
        $html = substr($html, 0, strrpos($html, ' '));
        return $html . '...';
    }
}