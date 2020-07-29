<?php
require_once "Controller.php";
class ViewController extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function getIndex(){
        if($this->accObj->checkLoggedIn() == false){
            $list_source = $this->newsObj->getAllSource();
            $subtop = $this->newsObj->getSubTop();
            $toppost = $this->newsObj->getTopPosts();

            $list_topic = $this->topicObj->getAllTopic();
            $list_leftcontent = array();
            foreach($list_topic as $lt){
                $lt = (array)$lt;
                $temp = $this->newsObj->getNewsByTopic($lt['topic_id'], 3);
                $list_leftcontent = array_merge($list_leftcontent, array($lt['description'] => $temp));
            }

            getView("home", array('title' => 'VNews',
                    "loggedIn" => $this->accObj->checkLoggedIn(),
                    "topPost" => $toppost,
                    "subTop" => $subtop,
                    "listLeftContent"=>$list_leftcontent,
                    "sourceList" => $list_source));
        }
        else{
            sessionInit();
            $uif = $this->accObj->getUserInfo($_SESSION['email']);
            $saved_news = $this->newsObj->getSavedNews($uif['acc_id']);

            $list_source = $this->newsObj->getAllSource();
            $list_topic = $this->topicObj->getAllTopic();
            $fav_topic = $this->topicObj->getFavTopic($uif['acc_id']);
            $list_leftcontent = array();
            $flist = array();
            foreach($fav_topic as $ft){
                $ft = (array)$ft;
                $flist = array_merge($flist, array($ft['topic_id']));
                foreach($list_topic as $lt){
                    $lt = (array)$lt;
                    if($lt['topic_id'] == $ft['topic_id']) break;
                }
                $temp = $this->newsObj->getNewsByTopic($lt['topic_id'], 3);
                $list_leftcontent = array_merge($list_leftcontent, array($lt['description'] => $temp));
            }

            foreach($list_topic as $lt){
                $lt = (array)$lt;
                if(in_array($lt['topic_id'], $flist)) continue;
                $temp = $this->newsObj->getNewsByTopic($lt['topic_id'], 3);
                $list_leftcontent = array_merge($list_leftcontent, array($lt['description'] => $temp));
            }

            $temp = array();

            foreach($saved_news as $sn){
                $sn = (array)$sn;
                $t = $this->newsObj->getNewsById($sn['nid']);
                $temp = array_merge($temp, $t);
            }

            $subtop = $this->newsObj->getSubTop();
            $toppost = $this->newsObj->getTopPosts();
            getView("home", array('title' => 'VNews',
                    "loggedIn" => $this->accObj->checkLoggedIn(),
                    "topPost" => $toppost,
                    "subTop" => $subtop,
                    "listLeftContent"=>$list_leftcontent,
                    "savedNews"=>$saved_news,
                    "list_saved" => $temp,
                    "sourceList" => $list_source));
            
        }
        
}

    public function getRegister(){
        getView("register", array('title' => 'Đăng ký'));
    }

    public function getRepair(){
        sessionInit();
        $email = $_SESSION['email'];
        $userInfo = $this->accObj->getUserInfo($email);

        $acc_id = $userInfo['acc_id'];
        $fav = $this->topicObj->getFavTopic($acc_id);

        $userInfo = $this->accObj->getUserInfo($email);
        getView("repair", array('title' => 'Chỉnh sửa thông tin cá nhân',
                                'userInfo'=>$userInfo,
                                'fav'=>$fav,
                                'loggedIn' => $this->accObj->checkLoggedIn()));
    }
    public function getPosts(){
        if($this->accObj->checkLoggedIn() == false){
            getView("login", array('title' => 'Đăng nhập'));
            notice("Đăng nhập để sử dụng dịch vụ");
        }
        else{
            if(!isset($_COOKIE['nid'])){
                echo "Khong co du lieu";
            }
            else{
                $nid = $_COOKIE['nid'];
                $list_source = $this->newsObj->getAllSource();
                $list_topic = $this->topicObj->getAllTopic();
                $post = $this->newsObj->getNewsById($nid);
                $keyword = $this->newsObj->getKeyword($nid);
                $list_post = $this->newsObj->getRecommendNews($keyword);
                getView("posts", array('title' => "Tin báo",
                                        'post' => $post,
                                        'list_source' => $list_source,
                                        'list_topic'=> $list_topic,
                                        'keyword' => $keyword,
                                        'list_post' => $list_post,
                                        'loggedIn' => $this->accObj->checkLoggedIn()));
            }
            
        }

        // getView("posts", array('title' => "Tin báo",
        //             'loggedIn' => $this->accObj->checkLoggedIn()));
    }
    public function getUser(){
        sessionInit();
        $email = $_SESSION['email'];

        $userInfo = $this->accObj->getUserInfo($email);
        $acc_id = $userInfo['acc_id'];
        $fav = $this->topicObj->getFavTopic($acc_id);

        $list_topic = $this->topicObj->getAllTopic();
        
        if($userInfo != false){
            getView("user", array('title' => "Thông tin cá nhân",
                                    'userInfo'=>$userInfo,
                                    'fav'=>$fav,
                                    'list_topic'=>$list_topic,
                                    'loggedIn' => $this->accObj->checkLoggedIn()));
        }
        else{
            echo "Thông tin người dùng bị lỗi";
        }
        
    }
    public function getLogin(){
        getView("login", array('title' => 'Đăng nhập'));
    }

    public function getForgotPass(){
        getView("forgot_pass", array('title' => 'Quên mật khẩu'));
    }

    public function getSearch(){
        // if($this->accObj->checkLoggedIn() == false){
        //     getView("login", array('title' => 'Đăng nhập'));
        //     notice("Đăng nhập để sử dụng dịch vụ");
        // }
        // else{
            if(isset($_POST['textSearch'])){
                $temp = $_POST['textSearch'];
                unset($_POST['textSearch']);
                setcookie("keyword", $temp, time()+10*60*1000);
            }
            else{
                $temp = "";
                echo "Khong co du lieu";
                return;
            }
            $list_source = $this->newsObj->getAllSource();
            $list_post = $this->newsObj->getNewsByKw($temp);
            getView("search", array('title' => "Tìm kiếm tin báo",
                            'keyword'=>$temp,
                            'listSource'=>$list_source,
                            'list_post' => $list_post,
                            'loggedIn' => $this->accObj->checkLoggedIn()));
        // }
        
    }

    public function getSavedNews(){

        sessionInit();
        $uif = $this->accObj->getUserInfo($_SESSION['email']);
        $saved_news = $this->newsObj->getSavedNews($uif['acc_id']);
        $temp = array();
        foreach($saved_news as $sn){
            $sn = (array)$sn;
            $t = $this->newsObj->getNewsById($sn['nid']);
            $temp = array_merge($temp, $t);
        }

        $list_source = $this->newsObj->getAllSource();
        $stt = "Không có tin báo đã lưu";

        if(isset($_POST['search_sn'])){

            $search_sn = $_POST['search_sn'];
            unset($_POST['search_sn']);

            if($search_sn == null){
                getView("saved_news", array('title' => "Tin đã lưu",
                        "savedNews" => $saved_news,
                        'list_post' => $temp,
                        "listSource" => $list_source,
                        "stt" => $stt,
                        'loggedIn' => $this->accObj->checkLoggedIn()));
                return;
            }

            $temp1 = array();
            $temp2 = array();
            
            for($i=0;$i<count($saved_news);$i++){
                $post = (array)$temp[$i];
                $str = $post['title'];

                if(strpos($str, $search_sn)){
                    $temp1 = array_merge($temp1, array($saved_news[$i]));
                    $temp2 = array_merge($temp2, array($temp[$i]));
                }
            }
            $saved_news = array_merge(array(), $temp1);
            $temp = array_merge(array(), $temp2);
            $stt = "Không có tin thỏa mãn";
        }

        getView("saved_news", array('title' => "Tin đã lưu",
                        "savedNews" => $saved_news,
                        'list_post' => $temp,
                        "listSource" => $list_source,
                        "stt" => $stt,
                        'loggedIn' => $this->accObj->checkLoggedIn()));
    }

    public function getBrowse(){
        $id = $_POST['category'];
        // echo $id;
        $list_post = $this->newsObj->getNewsByCate($id);
        $list_source = $this->newsObj->getAllSource();
        $topic = $this->topicObj->getTopicById($id);
        // print_r($list_post);
        getView("browse", array('title' => "Duyệt tin báo",
                "loggedIn" => $this->accObj->checkLoggedIn(),
                "listPosts" => $list_post,
                "topic" => $topic,
                "listSource" => $list_source));
    }
}
?>