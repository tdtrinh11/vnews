<?php
require_once "Controller.php";
class ActionController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function registerAction($regData){
        $acc_id = $this->accObj->genID();
        if($this->accObj->register($regData, $acc_id)){
            $this->topicObj->addFavTopic($regData, $acc_id);
        }
        nextpage("./.");
        // $this->accObj->register($regData, $acc_id);
        // $this->topicObj->addFavTopic($regData, );
    }

    public function login($loginData){
        $this->accObj->login($loginData['email'], _hash($loginData['pass']));
        nextpage("./.");
    }
    public function logout(){
        $this->accObj->logout();
        nextpage("./.");
    }

    public function UpdateUserInfo($regData){
        // print_r($regData);
        $email = $regData['email'];
        $userInfo = $this->accObj->getUserInfo($email);
        $acc_id = $userInfo['acc_id'];

        if($this->accObj->UpdateUserInfo($regData)){
            $this->topicObj->updateFavTopic($regData, $acc_id);
        }
        nextpage("./?link=user");
    }

    // public function processPosts($regData)
    // {
    //     echo $regData;
    // }

    // public function searchNews($regData){
    //     nextpage("./.");
    // }

    public function saveNews($regData){
        if(!$this->accObj->checkLock()){
            sessionInit();
            $email = $_SESSION['email'];
            $uif = $this->accObj->getUserInfo($email);
            if($uif == false){
                echo "co loi xay ra";
                return;
            }
            $acc_id = $uif['acc_id'];
            $this->newsObj->saveNews($regData, $acc_id);
            echo "<script>alert('Lưu tin báo thành công')</script>";
            nextpage("./?link=posts");
        }
        else {
            echo "Tài khoản đã bị khóa";
        }
    }

    public function removeSavedNews($regData){
        $this->newsObj->removeSavedNews($regData['id']);
        nextpage("./?link=saved_news");
    }
}
?>