<?php

/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/10/2017
 * Time: 9:40 PM
 * this class handles some basic behaviours of the site
 */
class errorHandler
{
    static function sendToIndexpage($errorMessage){
        /**
         * this function will tae an error message
         * it will redirect the user to the home page
         * the error message will be displayed on the Index page
         **/

        $sessions = ['loginError' => $errorMessage,];
        sessions::setSessionValues($sessions);
//                    redirect to the sign up page
        header('location: http://localhost/OSPosts/index.php?controller=signup&action=index');

    }

    //    function reads the error from the error variable in the validate class
    static function returnError($customMessage){
        /**
         * read the error variable[array] from the validate class
         *   if there is an error,
         *         echo it to the user
         **/
        $response = [];
        $validateError = [];
        if ($customMessage != NULL){
            $response['message'] = $customMessage.' <br>';
        }else{
            $errorcount = count(validate::$error);
            $response['message'] = $errorcount . ' <b>found!</b> ';
            $validateError = validate::$error;
        }
        $response['error']   = true;
        echo json_encode(array('response'=>$response,'validation'=>$validateError));
        exit();
        return true;
    }

    static function echoError($message){
    $returnmessage = array();
    $returnmessage['error'] = true;
    $returnmessage['message'] = $message;

    echo json_encode($returnmessage);
    exit();
}

}