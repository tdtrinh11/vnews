<?php
require_once "functions.php";
require_once "DB.php";
class News extends DB{
    public function __construct(){
        parent::__construct();
    }

    public function genID(){
        $id = randInt(5);
        // $email = $_SESSION['email'];
        while(true){
            $query = $this->select("account", "acc_id", "acc_id='$id'");
            if(count($query) == 0) break;
            else $id = randInt(5);
        }
        return $id;
    }

    private function genSNID(){
        $id = randInt(5);
        while (true){
            $query = $this->select("saved_news", "id", "id='$id'");
            if(count($query) == 0) break;
            else $id = randInt(5);
        }
        return $id;
    }

    public function getAllSource(){
        $value = $this->select('news_source');
        return $value;
    }

    public function getNewsByCate($id){
        $value = $this->select('news', "*", "topic_id=".$id);
        return $value;
    }

    public function saveNews($regData, $acc_id){
        
        $this->insert('saved_news', array(
                        "id"=>$this->genSNID(),
                        "acc_id"=>$acc_id,
                        "nid" => $regData['nid']
        ));
    }

    public function getSavedNews($acc_id){
        $value = $this->select('saved_news', '*', "acc_id='$acc_id'");
        $news = array();
        // print_r($value);
        return $value;
    }

    public function removeSavedNews($id){
        $this->delete('saved_news', "id='$id'");
    }

    public function getNewsByTopic($topic_id, $n){
        $value = $this->select('news', "*", "topic_id='$topic_id'", "RAND()", "", "$n");
        return $value;
    }

    public function getTopPosts(){
        $topPost = array();
        $sid = array(0,1,3);
        foreach($sid as $id){
            $value = $this->select('news', '*', "source_id='$id'", "RAND()", "", "1");
            $topPost = array_merge($topPost, $value);
        }
        return $topPost;
    }

    public function getSubTop(){
        $topPost = array();
        $sid = array(0,1,3);
        foreach($sid as $id){
            $value = $this->select('news', '*', "source_id='$id'", "RAND()", "", "5");
            $topPost = array_merge($topPost, $value);
        }
        return $topPost;
    }

    public function getNewsById($nid){
        return $this->select('news', '*', "news_id='$nid'");
    }

    public function getNewsByKw($kw){
        return $this->select('news', '*', "(title LIKE '%$kw%' OR summary LIKE '%$kw%')");
    }

    public function getKeyword($nid){
        $post = $this->getNewsById($nid);
        $post = (array)$post[0];
        // print_r($post);
        $link = $post['source'];
        $id = $post['source_id'];
        $content = getContent($id, $link);
        $keyword = runTextRank("'".$content['text']."'");
        return $keyword;
    }

    public function getRecommendNews($keyword){
        $list_post = array();
        foreach($keyword as $kw){
            $temp = $this->getNewsByKw($kw);
            if($temp == null){
                continue;
            }
            else{
                $count = 1;
                foreach($temp as $t){
                    $list_post = array_merge($list_post, array($t));
                    $count++;
                    if($count == 3){
                        break;
                    }
                }
            }
        }
        return $list_post;
    }
}
?>