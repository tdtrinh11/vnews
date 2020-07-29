<?php
require_once "functions.php";
require_once "DB.php";
class Topic extends DB{
    public function __construct(){
        parent::__construct();
    }

    private function genID(){
        $id = randInt(5);
        while(true){
            $query = $this->select("topic", "topic_id", "topic_id='$id'");
            if(count($query) == 0) break;
            else $id = randInt(5);
        }
        return $id;
    }

    public function getTopicList(){
        return $this->select("topic", 
                            "topic_id,topic_name, description");
    }

    public function updateTopicItem($topicInf){
        $topic_id = $topicInf['topic_id'];
        unset($topicInf['topic_id']);
        $topicUpdateInf = array();
        $topicUpdateInf['topic_name'] = $topicInf['topic_name'];
        $topicUpdateInf['description'] = $topicInf['description'];
        $this->update("topic", $topicUpdateInf, "topic_id='$topic_id'");                                              
    }

    public function removeTopic($topic_id){
        $this->delete("topic", "topic_id='$topic_id'");
    }

    public function addTopic($topicData){
        $this->insert("topic", array('topic_id' => $this->genID(), 
                                    'topic_name' => $topicData['topic_name'],
                                    'description' => $topicData['description']));
    }

    public function searchTopic($kw){
        return $this->select("topic",
                            "topic_id,topic_name, description",
                            "(topic_name LIKE '%$kw%' OR description LIKE '%$kw%')");
    }
}
?>