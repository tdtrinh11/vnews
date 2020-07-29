<?php
if(!defined('__CONTROLLER__')) define('__CONTROLLER__', 'true');
require_once "Model/Account.php";
require_once "Model/News.php";
require_once "Model/Topic.php";

class Controller{
    protected $accObj;
    protected $newsObj;
    protected $topicObj;

    public function __construct(){
        $this->accObj = new Account;
        $this->newsObj = new News;
        $this->topicObj = new Topic;
    }
}
?>