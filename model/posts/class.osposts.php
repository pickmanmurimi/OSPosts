<?php

/**
 * Created by PhpStorm.
 * User: pick
// * Date: 7/26/2017
// * Time: 12:07 PM
// * this handles all the posts/articles
// */
//class post
//{
//
//    static function publishArticle($article,$subject,$username,$email){
//        //instantiate the database connection
//        $db = database::getPDOobject();
//        //prepare the statement to post the article to the database
//        $post = $db->prepare('INSERT INTO `posts` (`user_id`, `subject`, `article`, `date_entered`, `date_edited`)
//VALUES (:user_id, :subject, :article, now(), NULL);');
//        //prepare the array to hold the values to post during execution
//        $values=['user_id' => 1,
//                'subject'  =>$subject,
//                  'article' =>$article,];
//        //insert the values into the database
//        $publish = $post->execute($values);
////      $publish returns true or false
//       return $publish;
//    }
//
////    validate data
////check that the data has been entered
  //  static function valNotNull($value){
//        if (empty($value)){
//            return true;
//        }else{
//            return false;
//        }
//    }
//    static function validateEmail($email)
//    {
//        if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {//REG EXPRESSION TO CHECK THE EMAIL FORMAT
//            return false;
//        }else{ return true;}
//    }
//
//}

$classmessage = '<h1> posts class is working</h1>';