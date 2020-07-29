<?php
require_once "Controller.php";
class ActionController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function registerAction($regData){
        $this->accObj->register(array('username' => $regData['username'],
                                        'password' => $regData['password']));
    }

    public function login($loginData){
        $this->accObj->login($loginData['sl_username'], _hash($loginData['sl_password']));
        nextpage("./?link=home");
    }
    public function logout(){
        $this->accObj->logout();
        nextpage("./.");
    }

    public function removeAccount($accountData){
        // if(!$this->accObj->checkLoggedIn()) return;
        $this->accObj->removeAccount($accountData['acc_id']);
        $this->newsObj->removeNewsOfUser($accountData['acc_id']);
        nextpage("./?link=mana_user");
    }

    public function lockAccount($accountData){
        $this->accObj->lockAccount($accountData['acc_id']);
        nextpage("./?link=mana_user");
    }

    public function unlockAccount($accountData){
        $this->accObj->unlockAccount($accountData['acc_id']);
        nextpage("./?link=mana_user");
    }

    public function removeSource($sourceData){
        // if(!$this->accObj->checkLoggedIn()) return;
        $this->newsObj->removeSource($sourceData['source_id']);
        // echo $accountData['acc_id'];
        nextpage("./?link=mana_source");
    }

    public function removeTopic($topicData){
        // if(!$this->accObj->checkLoggedIn()) return;
        $this->topicObj->removeTopic($topicData['topic_id']);
        // print_r($topicData);
        // echo $accountData['acc_id'];
        nextpage("./?link=mana_topic");
    }

    public function updateSource($sourceData){
        $this->newsObj->updateSourceItem($sourceData);
        // echo "UpdatedOK";
        nextpage("./?link=mana_source");
    }

    public function updateTopic($topicData){
        // print_r($topicData);
        $this->topicObj->updateTopicItem($topicData);
        // echo "UpdatedOK";
        nextpage("./?link=mana_topic");
    }

    public function addSource($sourceData){
        $this->newsObj->addSource($sourceData);
        nextpage("./?link=mana_source");
    }
    public function addTopic($topicData){
        $this->topicObj->addTopic($topicData);
        nextpage("./?link=mana_topic");
    }

    public function searchUser($sourceData){
        $this->accObj->searchUser($sourceData['kw']);
        
    }
}
?>