<?php

/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/8/2017
 * Time: 1:16 PM
 */
class user
{
    public $fullnames;
    public $username;
    public $email;
    public $userId;
    private $password;
    public $posts;
function __construct($userName)
{
    $this->username = $userName;

    if (user::userExists($this->username)){
//        database instance

        $db = database::getPDOobject();

//        query
//        BINARY makes the query case sensitive
        $checkUser = $db->prepare('SELECT `user_id`,`fullnames`,`user_name`,`email` FROM `users` WHERE BINARY `user_name` = BINARY :userName LIMIT 1');
        $checkUser->bindParam(':userName',$userName);
        $checkUser->execute();
        $user = $checkUser->fetch();

        $this->userId    = $user['user_id'];
        $this->fullnames = $user['fullnames'];
        $this->email     = $user['email'];

    }
}

    /**
 *getters
 **/
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (property_exists($this,$name)){
            return $this->$name;
        }
    }

/**
 *    setters
 **/
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if (property_exists($this,$name)){
            $this->$name = $value;
        }
    }

    /**
     * check whether a user exists
     * return true if does
     */
    public static function userExists($userName){

//        database instance
        $db = database::getPDOobject();

//        query
//        BINARY makes the query case sensitive
        $checkUser = $db->prepare('SELECT `user_name` FROM `users` WHERE BINARY `user_name` = BINARY :userName');
        $checkUser->bindParam(':userName',$userName);
        $checkUser->execute();
        $user = $checkUser->fetchAll();

        if (count($user) > 0 ){
//            user exits
            return true;
        }else{
//            user does not exist
            return false;
        }
    }


/**
 * get the users password
 **/
    public function getHashedPassword(){

            //        query the database to get the users password
            //        database instance
        $db = database::getPDOobject();

            //        query
        $checkUser = $db->prepare('SELECT `password` FROM `users` WHERE BINARY `user_name` = BINARY :userName LIMIT 1');
        $checkUser->bindParam(':userName',$this->username);
        $checkUser->execute();
        $encyptedPassword = $checkUser->fetch()['password'];

        return $encyptedPassword;
}

/*
 * verify the users password
 */
    public function checkPassword($password){

/*
*       verify the password
*       if correct ,return true else return false
*       verify the password
*/

        if (password_verify($password,$this->getHashedPassword())){
            return true;
        }else{
            return false;
        }

    }


}

//$user = new user('f');
//$sessions = [
//    'userId'    => $user->__get('userId'),
//    'username'  => $user->username,
//    'email'     => $user->email,
//    'fullnames' => $user->fullnames,
//    'loggedIn'  => true,
//];
//
//foreach ($sessions as $name => $value){
//    echo $name . '-' . $value . '<br>';
//}
////        database instance
//$userName = 'f';
//$db = database::getPDOobject();
//
////        query
////        BINARY makes the query case sensitive
//$checkUser = $db->prepare('SELECT `user_id`,`fullnames`,`user_name`,`email` FROM `users` WHERE BINARY `user_name` = BINARY :userName LIMIT 1');
//$checkUser->bindParam(':userName',$userName);
//$checkUser->execute();
//$user = $checkUser->fetch();
//
//echo $user['user_id'] . '<br>';
//echo $user['fullnames'] . '<br>';
//echo $user['email'] . '<br>';