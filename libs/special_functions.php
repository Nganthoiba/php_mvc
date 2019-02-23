<?php

function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*php function to generate random unique id*/
function randId($length){
    $id = md5(uniqid());
    $char = str_shuffle($id);
    for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i++) {
        $rand .= $char{mt_rand(0, $l)};
    }
    return $rand;
}

function filter($key,$method){
    if(trim($method)=="POST"){
        $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }else{
        $value = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    //$value = filter_input(INPUT_GET, $key, FILTER_SANITIZE_ENCODED);
    return trim($value);
}

function isLinkActive($link){
    $current_link = filter("uri", "GET");
    if(trim($link, '/') == trim($current_link,'/')){
        return "active";
    }
    else{
        return "";
    }
}

