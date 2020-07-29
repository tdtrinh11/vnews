<?php
require_once "Controller.php";
class ViewController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function getIndex(){
        if($this->accObj->checkLoggedIn() == false){
            getView("login", array('title' => 'Đăng nhập'));
        }
        else{
            getView("home", array('title' => 'Trang quản lý'));
        }
    }

    public function getLogin(){
        getView("login", array('title' => 'Đăng nhập'));
    }

    public function getManaUser(){

        if($this->accObj->checkLoggedIn() == true){
            if(isset($_POST['kw'])){
                $kw = $_POST['kw'];
                unset($_POST['kw']);
                getView("mana_user", array('title' => "Quản lý người dùng",
                                            'userList' => $this->accObj->searchAccount($kw),
                                            'label' => 'user'));
            }
            else {
                getView("mana_user", array('title' => "Quản lý người dùng",
                                            'userList' => $this->accObj->getList(),
                                            'label' => 'user'));
            }
        }
        else {
            getView("login", array('title' => 'Đăng nhập'));
        }
        
    }

    public function getManaSource(){
        
            if($this->accObj->checkLoggedIn() == true){

                if(isset($_POST['kw'])){
                    $kw = $_POST['kw'];
                    unset($_POST['kw']);
                    getView("mana_source", array('title' => "Quản lý nguồn tin",
                                             'sourceList' => $this->newsObj->searchSource($kw),
                                            'label' => 'source'));
                }
                else {
                    getView("mana_source", array('title' => "Quản lý nguồn tin",
                                         'sourceList' => $this->newsObj->getSourceList(),
                                         'label' => 'source'));
                }
            }
            else {
                getView("login", array('title' => 'Đăng nhập'));
            }
    }

    public function getManaTopic(){
        
            if($this->accObj->checkLoggedIn() == true){
                if(isset($_POST['kw'])){
                    $kw = $_POST['kw'];
                    unset($_POST['kw']);
                    getView("mana_topic", array('title' => "Quản lý chủ đề ",
                                             'topicList' => $this->topicObj->searchTopic($kw),
                                            'label' => 'topic'));
                }
                else {

                    getView("mana_topic", array('title' => "Quản lý chủ đề",
                                        'topicList' => $this->topicObj->getTopicList(),
                                        'label' => 'topic'));
                }
            }
            else {
                getView("login", array('title' => 'Đăng nhập'));
            }
        }

}
?>