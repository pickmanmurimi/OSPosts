<?php
///**
// * Created by PhpStorm.
// * User: pick
// * Date: 7/27/2017
// * Time: 1:27 PM
// */
//require_once ('model/posts/class.osposts.php');
//
//    $publish        = new post();
//    $returnmessage = array();
////    validate the users input
////    check that that all required fields have been filled
////        variables to publish
//    $article = $_POST['article'];
//    $subject = $_POST['subject'];
//    $username = $_POST['username'];
//    $email = $_POST['email'];
////        check that some fields have not been left empty
//    if (post::valNotNull($article) || post::valNotNull($subject) || post::valNotNull($username) || post::valNotNull($email)) {
//        $publishmessage = 'has not been published! Some fields cannot be left empty!';
//        $returnmessage['error'] = true;
//    } elseif (!post::validateEmail($email)) {
//        $publishmessage = 'your has not been published! Your email is invalid!';
//        $returnmessage['error'] = true;
//
//    } else {
//
//        $publishArticle = post::publishArticle($article, $subject, $username, $email);
//
//        if ($publishArticle) {
//            $publishmessage = 'has been published!';
//            $returnmessage['error'] = false;
//        } else {
//            $publishmessage = 'has not been published!';
//            $returnmessage['error'] = true;
//        }
//    }
//
//    $returnmessage['message'] = $username . ' your article ' . $publishmessage;
//
//    echo json_encode($returnmessage);

//echo 'publish article is working '; $classmessage;