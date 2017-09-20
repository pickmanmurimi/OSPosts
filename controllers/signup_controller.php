<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/29/2017
 * Time: 9:22 PM
 * this will load the view
 * then if data is submited it takes data from the view, passes it to the model then updates the view once the model processes the data
 */
class Signupcontroller
{
    public function index()
    {
        require_once('views/signup/index.php');
        exit();
    }

    public function signup(){
        $response = [];

//        create an instance of the class register

        $register = new register($_POST['fullnames'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['password1']);
//        check that there is no error that was returned during validation

        if (validate::$error == NULL){
/**
*           read the value of the error array in the validate class
*            if there is no error
*             check whether the user exists
*              if the user does not exist,
*                   register the user
**/

            if (!user::userExists($_POST['username'])) {
                $register->register();
                $response['error'] = false;
                $response['message'] = 'You have been successfully signed up!';
                echo json_encode(array('response' => $response, 'validation' => validate::$error));
                exit();

            }else{
//                error message
                $response['error']   = true;
                $error = [];
                $error['userError'] = ' User already exists';
                $response['message'] ='<b>1 found!</b>';
                echo json_encode(array('response'=>$response,'validation'=>$error));
                exit();
            }
        }else{
            /**
            *     read the error variable[array] from the validate class
            *           if there is an error,
            *                 echo it to the user
            **/
            $response['error']   = true;
            $errorcount = count(validate::$error);
            $response['message'] = $errorcount . ' <b>found!</b>';
            echo json_encode(array('response'=>$response,'validation'=>validate::$error));
            exit();

        }
    }

}