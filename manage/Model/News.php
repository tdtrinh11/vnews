<?php
require_once "functions.php";
require_once "DB.php";
class News extends DB{
    public function __construct(){
        parent::__construct();
    }

    private function genID(){
            $id = randInt(5);
            while(true){
                $query = $this->select("news_source", "source_id", "source_id='$id'");
                if(count($query) == 0) break;
                else $id = randInt(5);
            }
            return $id;
    }

    public function getSourceList(){
            return $this->select("news_source", 
                                "source_id,source_name,source,description");
    }

    public function updateSourceItem($sourceInf){
            $source_id = $sourceInf['source_id'];
            unset($sourceInf['source_id']);
            $sourceUpdateInf = array();
            $sourceUpdateInf['source_name'] = $sourceInf['source_name'];
            $sourceUpdateInf['source'] = $sourceInf['source'];
            $sourceUpdateInf['description'] = $sourceInf['description'];
            $this->update("news_source", $sourceUpdateInf, "source_id='$source_id'");                                              
    }

    public function removeSource($source_id){
        $this->delete("news_source", "source_id='$source_id'");
    }

    public function addSource($sourceData){
        $this->insert("news_source", array('source_id' => $this->genID(), 
                                            'source_name' => $sourceData['source_name'],
                                            'source' => $sourceData['source'],
                                            'description' => $sourceData['description']));
    }

    public function searchSource($kw){
        return $this->select("news_source",
                            "source_id,source_name,source,description",
                            "(source_name LIKE '%$kw%' OR description LIKE '%$kw%')");
    }

    public function removeNewsOfUser($uid){
        $this->delete('saved_news', "acc_id='$uid'");
    }
}
?>