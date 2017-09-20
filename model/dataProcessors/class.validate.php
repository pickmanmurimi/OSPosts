<?php

/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/6/2017
 * Time: 9:17 PM
 * this class has functions that validate different values entered by the user
 */
class validate
{
//    the variable holds the error message
    public static $error = [];

    static function validateEmail($email){
        //REG EXPRESSION TO CHECK THE EMAIL FORMAT
        if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
            validate::$error['email'] = ' Your email is not in the correct format! ';
            return false;
        }else{ return true;}
    }

//    this function checks that the expected not null and the length of the data input is correct
//     *************************************   [not important to understand working of code] ==> valuables to add on later  $checktype,$type
    static function validateText($text,$maxLength,$valueName){
        if (empty($text) || !isset($text)){
            validate::$error[$valueName] = $valueName.' cannot be null! ';
            return false;
        }else{
            if (strlen($text) > $maxLength){
                validate::$error[$valueName] = $valueName. ' exceeds the limit! ';
                return false;
            }else{
                return true;
            }
        }
    }

    /**
     *check the length of text entered is above the minimum length
     **/
    static function checkMinLength($text,$minLength,$valueName){
            if (strlen($text) < $minLength){
                validate::$error[$valueName] = $valueName. ' is too short<b>! ' . $minLength. ' +</b> characters required';
            }else{
                return true;
            }
    }
//    checks that the two passwords match
        //$encrypted takes true or false,
        //it checks whether to check the input password against the incrypted password ir not
    static function validatePassword($password1,$password2,$encrypted){
        if ($encrypted){
            //check against an encrypted password from te database
        }else{
            //chek against two input passwords
            if ($password1 === $password2){
                if (strlen($password1) < 6){
                    validate::$error['password'] = ' Your password is too short, 6 or more characters required! ';
                    return false;
                }else{
                return true;
                }
            }else{
              validate::$error['password'] = ' Your passwords do not match! ';
              return false;
            }
        }
    }
}