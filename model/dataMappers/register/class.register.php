<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/5/2017
 * Time: 11:13 PM
 * the object will write register/sign up the values to the database
 */
class register
{
    private $fullname;
    private $username;
    private $email;
    private $password;
    private $encryptedPassword;

    function __construct($fullname,$username,$email,$password,$cpassword)
    {
        $this->fullname = strtolower($fullname);
        $this->username = $username;
        $this->email    = strtolower($email);
        $this->password = $password;

        //        create an encrypted password
        $this->encryptedPassword = password_hash($password,PASSWORD_DEFAULT);

//        validate the data
//        if there are errors they will be put i the error array in the validate object
        //************************************************validateText($text,$maxLength,$valueName)

//        validateText checks that the values are not empty and of the required length
            validate::validateText($fullname,60,'Fullname');
            validate::validateText($username,30,'Username');
            validate::validateText($password,255,'Password');
            validate::validateText($cpassword,255,'Confirm password');
            validate::validateText($email,60,'email');
            validate::validatePassword($password,$cpassword,false);
            validate::validateEmail($email);

    }

//    this function will write the users details into the database
    function register(){
//        if there is no error during validation, then register the user
//        database instance
            $db = database::getPDOobject();
//            query
//        prepare the query, this helps to prevent injection and also speeds up queries

            $register = $db->prepare('INSERT INTO `users` (`user_name`, `fullnames`, `email`, `password`, `date_created`, `last_activity`)
VALUES (:username, :fullnames, :email, :password, now(), NULL)');

            $register->execute([':username'  => $this->username,
                                     ':fullnames' => $this->fullname,
                                     ':email'     => $this->email,
                                     ':password'  => $this->encryptedPassword,]);
            return true;
            exit();
    }

}