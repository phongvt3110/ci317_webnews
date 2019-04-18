<?php
/**
 * Created by PhpStorm.
 * User: phongvt
 * Date: 31/03/2019
 * Time: 23:25
 */

class MY_string {

    function fullurl($use_forwarded_host = false){
        $ssl = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? true:false;
        $sp = strtolower($_SERVER['SERVER_PROTOCOL']);
        $protocol = substr($sp,0,strpos($sp,'/')) . (($ssl)?'s':'');
        $port = $_SERVER['SERVER_PORT'];
        $port = ((!$ssl && $port==80) || ($ssl && $port==443))? '': ':' . $port;
        $host = (isset($use_forwarded_host) && isset($_SERVER['HTTP_X_FORWARDED_HOST']))? $_SERVER['HTTP_X_FORWARDED_HOST']: (isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:null);
        $host = isset($host)? $host : $_SERVER['SERVER_NAME'] . $port;
        return $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
    }

    function create_url_slug($string){
        $slug = strtolower($this->vn_to_str($string));
        return $slug;
    }

    function vn_to_str($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
        return $str;
    }
}