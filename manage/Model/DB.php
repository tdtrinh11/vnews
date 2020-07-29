<?php
require_once "config.php";
class DB{
	private $host;
	private $user;
	private $pass;
	private $dbname;

	private $connect;
	private $isConnected = false;

	public function __construct($host = _DBHOST_, $user = _DBUSER_, $pass = _DBPASS_, $dbname = _DBNAME_){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->dbname = $dbname;
		$this->setConnect();
	}

	public function setConnect(){
		$this->connect = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
		mysqli_query($this->connect, "SELECT NAME 'UTF8'");
		mysqli_set_charset($this->connect, "UTF8");
		$this->isConnected = true;
	}

	public function getConnect(){
		if($this->isConnected) return $this->connect;
		else return null;
	}

	public function select($table, $keys = "*", $cond = "1", $orderby = "", $groupby = ""){
        $cmd = "SELECT $keys FROM $table WHERE $cond";
        if($groupby != "") $cmd .= "GROUP BY $groupby";
        if($orderby != "") $cmd .= " ORDER BY $orderby";
        $data = array();
        $queryData = mysqli_query($this->getConnect(), $cmd);
        while($record = mysqli_fetch_array($queryData)){
            $data[] = $record;
        }
        return $data;
    }

	public function insert($table, $data){
        $cmd = "INSERT INTO $table ";
        $keys = "";
        $values = "";
        foreach(array_keys($data) as $key){
            if(strlen($keys) == 0){
                $keys .= "(";
                $values .= "(";
            }
            else{
                $keys .= ",";
                $values .= ",";
            }
            $keys .= $key;
            $values .= "'".$data[$key]."'";
        }
        $keys .= ")";
        $values .= ")";
        $cmd .= $keys." VALUES ".$values;
        mysqli_query($this->getConnect(), $cmd);
    }

	public function update($table, $data, $cond = "1"){
        $cmd = "UPDATE $table SET ";
        $params = "";
        foreach(array_keys($data) as $key){
            if(strlen($params) > 0){
                $params .= ",";
            }
            $params .= $key."='".$data[$key]."'";
        }
        $cmd .= $params." WHERE $cond";
        // echo $cmd;
        mysqli_query($this->getConnect(), $cmd);
    }

	public function delete($table, $cond = "1"){
        $cmd = "DELETE FROM $table WHERE $cond";
        echo $cmd;
        mysqli_query($this->getConnect(), $cmd);
	}
	
	public function createTable($table, $fields){
        $cmd = "CREATE TABLE $table (";
        $fieldKeys = "";
        foreach($fields as $field){
            if(strlen($fieldKeys) > 0)
                $fieldKeys .= ",";
            $fieldKeys .= $field[0]." ".$field[1]." ".$field[2];
        }
        $cmd .= $fieldKeys.")";
        mysqli_query($this->getConnect(), $cmd);
    }

    public function alterTable($table, $fields){
        
    }

    public function dropTable($table){
        mysqli_query($this->getConnect(), "DROP TABLE $table");
    }

    // execute a common SQL command
    public function execute($cmd){
        $queryData = mysqli_query($this->getConnect(), $cmd);
        $data = array();
        while($record = mysqli_fetch_array($queryData)){
            $data[] = $record;
        }
        return $data;
    }
}
?>