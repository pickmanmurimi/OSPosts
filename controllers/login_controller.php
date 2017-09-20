<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/8/2017
 * Time: 1:11 AM
 */
class login
{

    protected $username;
    protected $password;

    public function login()
    {
        $responce = [];
        /**
         * get the users credentials
         * validate the data
         * check that the user exists
         * **********if exists,
         * check that the password is correct
         * ***********if correct,
         * create the session variables
         * redirect the user to the homepage
         **/

        $this->username = $_POST['loginUsername'];
        $this->password = $_POST['loginPassword'];

//        validate the data
        validate::validateText($this->password, 255, 'password');
        validate::validateText($this->username, 30, 'username');

        if (validate::$error == NULL) {

//            check that the user exists
            if (user::userExists($this->username)) {

                $user = new user($this->username);
                    /**
                     *                check that the password is correct
                     **/
                if ($user->checkPassword($this->password)) {

//                    if the password is correct, create the session values

                    $sessions = [
                        'userId'    => $user->userId,
                        'username'  => $user->username,
                        'email'     => $user->email,
                        'fullnames' => $user->fullnames,
                        'loggedIn'  => true,
                        ];

                /**
                *                    pass the values to the setSessionValues() function
                *                          the function takes an array
                 *                          unset any error in the SESSION [error]
                 *                      redirect the user to the users homepage
                 **/
                if (sessions::trackSession('loginError')){
                    sessions::unsetSessions('loginError');
                }

                sessions::setSessionValues($sessions);
                header('location: http://localhost/OSPosts/index.php?controller=pages&action=home');

                }else{
                    /**
                     * if password is incorrect
                     * put the error in a session
                     * reload the sign up page
                     */
                    errorHandler::sendToIndexpage('Invalid username or password!');
                }

            }else {
                /**
                 * if the user does not exist,
                 * echo it to the user
                 * set the message yo want displayed
                 */
                errorHandler::sendToIndexpage('User does not exist!');

            }
        }else
            {
            /**
             *            read the error variable[array] from the validate class
             *            if there is an error,
             *                   echo it to the user
             **/
            errorHandler::sendToIndexpage(' Please fill both fields to login!');
        }
    }

    /**
     * log out function
     */

    public function logout(){
        /**
         * destroy all the sessions
         * redirect to the main page
         * errorHandler::sendToIndexpage() helps in redirection, the value NULL is given to the erroor message
         * since no error has ocured, the user has just logged out
         */
        sessions::unsetSessions(array('userId','username','email','fullnames','loggedIn',));
        sessions::destroySessions();
        errorHandler::sendToIndexpage(NULL);
    }
}