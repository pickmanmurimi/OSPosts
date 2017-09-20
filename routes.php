<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/25/2017
 * Time: 11:24 PM
 * this is where pages get redirected to there controller which serves the right content
 * my router will get the controller and decide which controller file to serve which will load the class
 * the router will then create an instance of that class
 * the action passes will call the needed function
 * the right model files will be created here
 */
function call($controller,$action)
{
    //include the controller file that matches the controller needed
    require_once ('controllers/'.$controller.'_controller.php');
    //create an instance of the needed controller
    switch ($controller){
        case 'pages':
            $controller = new pagesController();
            break;
        case 'posts':
            require_once ('model/dataMappers/article/class.article.php');
            require_once ('model/dataMappers/article/class.rates.php');
            $controller = new  Postscontroller();
            break;
        case 'signup':
            require_once('model/dataMappers/register/class.register.php');
            $controller = new Signupcontroller();
            break;
        case 'login':
            $controller = new Login();
            break;
    }
    //call the needed action
    //say home action is called, call will be $controller->home();
    $controller->{ $action }();
}

$controllers = array('pages' => ['home','error',],
                     'posts' => ['post','publish','viewposts','getLikes','getDisLikes','Like','DisLike','viewLatest',],
                     'signup'=> ['index','signup'],
                     'login' => ['login','logout'],);

//check whether the needed key eg. 'pages' exists
if (array_key_exists($controller,$controllers)){
    //check whether the needed action exists
    if (in_array($action,$controllers[$controller])){
       //if the action exists call the needed page abd action
        call($controller,$action);
    }else{
        //call the error page
        call('pages','error');
    }
}else{
    call('pages','error');
}