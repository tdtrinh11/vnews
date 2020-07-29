<?php
function setTimeZone(){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
}

function sessionInit(){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function getView($view, $data = null){
    $viewParams = $data;
    require_once "View/$view.view.php";
}

function getTemplate($template, $data = null){
    $viewParams = $data;
    require_once "View/Template/$template.template.php";
}

function notice($mess){
    echo "<script>alert(\"$mess\");</script>";
}

function nextpage($link){
    ob_start();
    header("location: $link");
    ob_flush();
}

function debug($var){
    //...
}

function _hash($data){
    return sha1(sha1($data));
}

function randString($length){
    $chars="abcdefghijklmnopqrstuvwxyz0123456789";
    $str="";
    for($i = 0; $i < $length; $i++)
        $str .= $chars[rand(0,35)];
    return $str;
}
function randInt($length){
    $chars="0123456789";
    $str="";
    for($i = 0; $i < $length; $i++)
        $str .= $chars[rand(0,9)];
    return $str;
}

function getCurDate(){
    setTimeZone();
    return date("Y-m-d");
}

function getCurTime(){
    setTimeZone();
    return date("Y-m-d H:i:s");
}
?>