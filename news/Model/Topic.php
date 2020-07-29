<?php
require_once "functions.php";
require_once "DB.php";
class Topic extends DB{
    public function __construct(){
        parent::__construct();
    }

    public function genID(){
        $id = randInt(5);
        while(true){
            $query = $this->select("fav_topic", "id", "id='$id'");
            if(count($query) == 0) break;
            else $id = randInt(5);
        }
        return $id;
    }

    public function getAllTopic(){
        $value = $this->select('topic');
        // print_r($value);
        return $value;
    }

    public function getTopicById($id){
        $value = $this->select('topic', "*", "topic_id=".$id);
        return $value;
    }

    public function addFavTopic($regData, $acc_id){
        $care = $regData['care'];
        try{
            foreach($care as $topic){
                $this->insert("fav_topic", array(
                    'id'=>$this->genID(),
                    'acc_id'=>$acc_id,
                    'topic_id'=>$topic
                ));
            }
        }
        catch (Exception $e){
            echo "loi them fav_topic";
            return false;
        }
        return true;        
    }
    
    public function getFavTopic($acc_id){
        $value = $this->select('fav_topic', '*', "acc_id=$acc_id");
        if($value == null){
            return null;
        }
        // print_r($value);
        return $value;
    }

    public function updateFavTopic($regData, $acc_id){
        $this->delete('fav_topic', "acc_id='$acc_id'");
        $care = $regData['care'];
        try{
            foreach($care as $topic){
                $this->insert("fav_topic", array(
                    'id'=>$this->genID(),
                    'acc_id'=>$acc_id,
                    'topic_id'=>$topic
                ));
            }
        }
        catch (Exception $e){
            echo "loi them fav_topic";
            return false;
        }
        return true; 
    }
}
?>