<?php
    require_once "Controller/Route.php";
    $route = new Route("ViewController@getIndex");

    $route->get("link", "home", "ViewController@getIndex");

    $route->get("link", "login", "ViewController@getLogin");
    $route->post("action", "loginact", "ActionController@login");
    $route->get("link", "register", "ViewController@getRegister");
    $route->post("action", "register", "ActionController@registerAction");
    $route->get("action", "logoutact", "ActionController@logout");

    $route->get("link", "forgot_pass", "ViewController@forgot_pass");
    $route->get("link", "user", "ViewController@getUser");
    $route->get("link", "repair", "ViewController@getRepair");
    $route->post("action", "repair", "ActionController@UpdateUserInfo");
    //*****
    
    $route->post("action", "load_status", "ActionController@loadStatus");
    $route->post("action", "load_history", "ActionController@loadInOutHistory");
    //*****

    $route->get("link", "browse", "ViewController@getBrowse");
    $route->get("link", "search_news", "ViewController@getSearch");
    $route->post("action", "search_news", "ActionController@searchNews");
    $route->get("link", "posts", "ViewController@getPosts");
    $route->post("action", "post", "ActionController@loadPosts");
    $route->post("action", "posts", "ActionController@processPosts");

    $route->get("link", "saved_news", "ViewController@getSavedNews");
    $route->post('action', "save", "ActionController@saveNews");
    $route->post('action', "remove_saved_news", "ActionController@removeSavedNews");
    
    $route->process();
?>