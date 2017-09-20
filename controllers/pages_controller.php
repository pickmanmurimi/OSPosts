<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/25/2017
 * Time: 11:41 PM
 * this will controll what page to be displayed
 */
class Pagescontroller
{
//    the main page..what new users see when they login to OSPosts
    public function home(){

        if (sessions::trackSession('loggedIn')){

        require_once ('views/pages/home.php');

        }else{
            /**
             * redirect to the sign up page on error
             * i.e if the logged in session is not set
             **/
            $message = '<span>You need to <b>login</b> first to view the home page<b>.</b></span><span> If you do not have an account, fill the form below to sign up. </span>';
            errorHandler::sendToIndexpage($message);
        }
    }
    public function error(){
        require_once ('views/pages/error.php');
    }
}