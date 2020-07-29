<?php
class Route{
    // $store = array(array(method => , key => , value => , action => ))
    private $store;

    public function __construct($function = ""){
        $this->store = array(array('method' => 'GET',
                                    'key' => 'DEFAULT',
                                    'value' => '',
                                    'function' => $function));
    }

    public function get($key, $value, $function){
        $routeItem = array('method' => 'GET',
                            'key' => $key,
                            'value' => $value,
                            'function' => $function);
        $this->store[] = $routeItem;
    }

    public function post($key, $value, $function, $data = null){
        $routeItem = array('method' => 'POST',
                            'key' => $key,
                            'value' => $value,
                            'function' => $function);
        $this->store[] = $routeItem;
    }

    private function implementFunction($func, $data = null){
        $_func = explode("@", $func);
        $controller = $_func[0];
        $function = $_func[1];
        require_once $controller.".php";
        $ctrlObj = new $controller;
        $ctrlObj->$function($data);
    }

    public function process(){
        $implemented = false;
        foreach($this->store as $routeItem){
            if($routeItem['key'] == 'DEFAULT') continue;
            if(isset($_GET[$routeItem['key']]) && $_GET[$routeItem['key']] == $routeItem['value']){
                if($routeItem['method'] == 'GET'){
                    $implemented = true;
                    $this->implementFunction($routeItem['function']);
                    break;
                }
                if($routeItem['method'] == 'POST'){
                    $implemented = true;
                    $this->implementFunction($routeItem['function'], $_POST);
                    break;
                }
            }
        }
        if($implemented == false){
            $this->implementFunction($this->store[0]['function']);
        }
    }
}
?>