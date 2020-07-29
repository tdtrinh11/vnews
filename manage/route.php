<?php
    require_once "Controller/Route.php";
    $route = new Route("ViewController@getIndex");
    $route->get("link", "register", "ViewController@getRegister");
    $route->post("action", "register", "ActionController@registerAction");
    //*****
    $route->post("action", "loginact", "ActionController@login");
    $route->get("action", "logoutact", "ActionController@logout");

    $route->post("action", "load_status", "ActionController@loadStatus");
    $route->post("action", "load_history", "ActionController@loadInOutHistory");

    $route->get("link", "login", "ViewController@getLogin");
    $route->get("link", "home", "ViewController@getIndex");

    $route->get("link", "mana_user", "ViewController@getManaUser");

    $route->get("link", "mana_source", "ViewController@getManaSource");

    $route->get("link", "mana_topic", "ViewController@getManaTopic");

    $route->post("action", "removeAccount", "ActionController@removeAccount");
    $route->post("action", "lockAccount", "ActionController@lockAccount");
    $route->post("action", "unlockAccount", "ActionController@unlockAccount");

    $route->post("action", "removeSource", "ActionController@removeSource");
    $route->post("action", "removeTopic", "ActionController@removeTopic");
    $route->post("action", "edittopic", "ActionController@updateTopic");
    $route->post("action", "editsource", "ActionController@updateSource");
    $route->post("action", "addSource", "ActionController@addSource");
    $route->post("action", "addTopic", "ActionController@addTopic");

    // $route->post("link", "searchUser", "ViewController@searchUser");

    //*****
    $route->process();
?>