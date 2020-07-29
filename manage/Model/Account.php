<?php
require_once "functions.php";
require_once "DB.php";
class Account extends DB{

    public function __construct(){
        parent::__construct();
    }

    public function register($regData){
        // $this->insert("account", array())
    }

    public function login($username, $password){
        sessionInit();
        $_SESSION['sl_user'] = $username;
        $_SESSION['sl_pass'] = $password; // hashed password
    }

    public function checkLoggedIn(){
        sessionInit();
        if(!isset($_SESSION['sl_user']) || !isset($_SESSION['sl_pass'])) return false;
        $check = $this->select("admin", "*", "username='{$_SESSION['sl_user']}' AND password='{$_SESSION['sl_pass']}'");
        if(count($check) == 1) return true;
        else return false;
    }

    public function logout(){
        sessionInit();
        unset($_SESSION['sl_user']);
        unset($_SESSION['sl_pass']);
    }

    public function getUserInfo($uid){
        //.
    }

    public function getList(){
        return $this->select("account", 
                            "acc_id,email,name,gender,birthday,stt");
    }

    public function removeAccount($account_id){
        $this->delete("account", "acc_id='$account_id'");
    }

    public function lockAccount($account_id){
        $data = array(
            "stt"=>1
        );
        $this->update("account", $data, "acc_id='$account_id'");
    }

    public function unlockAccount($account_id){
        $data = array(
            "stt"=>0
        );
        $this->update("account", $data, "acc_id='$account_id'");
    }

    public function searchAccount($kw){
        return $this->select("account",
                            "acc_id,email,name,gender,birthday,stt",
                            "(email LIKE '%$kw%' OR name LIKE '%$kw%')");
    }
}
?>