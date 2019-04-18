<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('cutnchar') ) {
    function cutnchar( $str = NULL, $n = 0) {
        if(strlen($str) < $n) return $str;
        $html = substr($str, 0, $n);
        $html = substr($html, 0, strrpos($html, ' '));
        return $html . '...';
    }


}

if( ! function_exists('lang') ) {
    function lang( $key = '') {
        $CI =& get_instance();
        $lang = $CI->lang->line($key); //stand for: $this->lang->line($key)
        return  !empty($lang) ? $lang : $key;
    }
}
