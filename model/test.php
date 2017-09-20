<?php
///**
// * Created by PhpStorm.
// * User: pick
// * Date: 8/6/2017
// * Time: 9:51 PM
// */
//
////require_once 'class.validate.php';
////require_once 'register/class.register.php';
require_once '../connection.php';
////validate::validateEmail('nigaanc@nigga.com');
//////echo validate::$error;
////validate::validateText('012','2','Test');
////validate::validateText('023','2','Another Value');
//////echo validate::$error;
////validate::validatePassword('nigg','nigga',false);
////foreach (validate::$error as $error){
////    echo $error . '<br>';
////}
////echo json_encode(array('echo1'=>array(validate::$error),'echo2'=>(validate::$error)));
////if (validate::$error == NULL){
////    echo 'No errors were found';
////}else{
////    echo count(validate::$error);
////}
//
////function signup(){
////    $response = [];
////    //*****************************************function __construct($fullname,$username,$email,$password,$cpassword)
////    //******************************************fullnames=&username=&email=&password%22=&%22="
//////        create an instance of the class register
////    $register = new register('fullnames','username','email@email.com','password','password');
//////        check that there is no error that was returned during validation
////    if (validate::$error == NULL){
//////            if there is no error, register the user
////        $register->register();
////        $response['error']   = false;
////        $response['message'] = 'You have been successfully signed up!';
////        echo json_encode(array('response'=>$response,'validation'=>validate::$error));
////        exit();
////    }else{
//////            if there is an error, echo it to the user
////        $response['error']   = true;
////        $errorcount = count(validate::$error);
////        $response['message'] = $errorcount . ' Error(s) found!<br>';
////        echo json_encode(array('response'=>$response,'validation'=>validate::$error));
////        exit();
////
////    }
////}
////
////signup();
//$password = 'nigga';
//echo password_hash($password,PASSWORD_DEFAULT);
//echo '<br>$2y$10$m/sWHQR09aCIObcrxdYGnO0IJKCip/9YcFfmXBWbMWGFdSF8JOHSy';
//function userExists($userName)
//{
////        check whether the user is already there
////        return true if exists
////        return false if user does not exists
////        database instance
//    $db = database::getPDOobject();
////        query
//    $checkUser = $db->prepare('SELECT `user_name` FROM `users` WHERE `user_name` = :userName');
//    $checkUser->bindParam(':userName', $userName);
//    $checkUser->execute();
//    $user = $checkUser->fetchAll();
//    if (count($user) > 0) {
////            user exits
//        return true;
//    } else {
////            user does not exist
//        return false;
//    }
//}
//if (userExists('f')){
//    echo '<br><b>nigga exists</b>';
//}else{
//    echo '<br><b>nigga does not exist</b>';
//};

echo "<h1>SALMA'S NESTED LOOP</h1>";
$counter = 0;
while ($counter < 100){
    $salmaCounter = 0;
   while ($salmaCounter < $counter){
       echo $salmaCounter."*";
       //echo $counter*$salmaCounter;

       $salmaCounter ++;
   }
   echo "<br>";
   $counter ++;
}
$sessionValues = [
    'userId'    => 'id',
    'username'  => 'username',
    'email'     => 'email',
    'fullnames' => 'fullnames',
    'loggedIn'  => true,
];


foreach ($sessionValues as $name => $value) {
    echo $name.'-'. $value . '<br>';
}
$userName = 'f';
$db = database::getPDOobject();

//        query
//        BINARY makes the query case sensitive
$checkUser = $db->prepare('SELECT `user_id`,`fullnames`,`user_name`,`email` FROM `users` WHERE BINARY `user_name` = BINARY :userName LIMIT 1');
$checkUser->bindParam(':userName',$userName);
$checkUser->execute();
$user = $checkUser->fetch();

$userId    = $user['user_id'];
$fullnames = $user['fullnames'];
$email     = $user['email'];

echo $userId . '-' . $fullnames . '-' . $email;
