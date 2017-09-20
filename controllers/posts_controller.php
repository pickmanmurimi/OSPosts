<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/30/2017
 * Time: 12:52 AM
 */
class Postscontroller
{
    public function post(){

        if (sessions::trackSession('loggedIn')){

        require_once ('views/post/post.php');

        }else{
            /*
             * this page cannot be accessed if someone hasnot logged in
             * send the user back to the sign up page to register or login
             */
            $message = '<span>You need to <b>login</b> first to view the posts page<b>.</b></span><span> If you do not have an account, fill the form below to sign up. </span>';
            errorHandler::sendToIndexpage($message);

        }
    }
//    handles the viewposts view

    public function viewposts(){

        if (sessions::trackSession('loggedIn')){
            /**
             * get the articles
             * have an instance of rates
             */
            $articles = article::getArticles($_GET['pageoffset']);
            require_once ('views/post/viewposts.php');
        }else{
            $message = '<span>You need to <b>login</b> first to view the view posts page<b>.</b></span><span> If you do not have an account, fill the form below to sign up. </span>';
            errorHandler::sendToIndexpage($message);
        }
    }

    public function viewLatest(){
        header("Content-Type:text/event-stream");
        header("Cache-Controlling:no-control");
        //getLatsetArticle($offset)


        if (sessions::trackSession('loggedIn')){
            /**
             * get the latest article
             * have an instance of rates
             */
//            sessions::setSessionValues(['latestTime'=>])
            $articles = article::getLatsetArticle(NULL,$_GET['latestDate']);

            echo "data:".json_encode($articles)."\n\n";

            flush();
        }else{
            $message = '<span>You need to <b>login</b> first to view the view posts page<b>.</b></span><span> If you do not have an account, fill the form below to sign up. </span>';
            errorHandler::sendToIndexpage($message);
        }

    }

    /**
     * like an article
     */
    public function Like(){

        /**
         * create the rates object
         * get the dislikes of an article
         */

        $article = new rates($_GET['articleID']);
        $article->Like();
        echo $article->getLikes();
    }

    /**
     * Dislike an article
     */
    public function DisLike(){

        /**
         * create the rates object
         * get the dislikes of an article
         */

        $article = new rates($_GET['articleID']);
        $article->Dislike();
        echo $article->getDislikes();
    }

    /**
     * get likes
     */
    public function getLikes(){

        /**
         * create the rates object
         * get the likes of an article
         */

        $article = new rates($_POST['articleID']);
        echo $article->getLikes();
    }

    /**
     * get dislikes
     */
    public function getDisLikes(){

        /**
         * create the rates object
         * get the dislikes of an article
         */

        $article = new rates($_POST['articleID']);
        echo $article->getDislikes();
    }

//    this functions handles the publishing of articles

    public function publish(){

        $userId = sessions::getSessionValue('userId');
        $body   = $_POST['article'];
        $title  = $_POST['title'];
        $tag    = $_POST['tag'];

                /**
                 * create a new article object. $userId,$title,$body
                 * validation will be done by the object
                 **/

        $article = new article($_SESSION['userId'],$title,$body,$tag);
            if (validate::$error == NULL){
                /**
                 * check that there is no error
                 * then publish the article
                 **/
                if($article->publish()){
                    /**
                     * echo a success message
                     **/
                    $returnmessage = array();
                    $returnmessage['error'] = false;
                    $returnmessage['message'] = ' Your article has been published! ';
                    echo json_encode($returnmessage);
                    exit();

                }else{
                    /**
                     * if there is an error during publish
                     **/
                    errorHandler::echoError('Oops! something went wrong :(');
                };

            }else{
                /**
                 * if there is an error during validation
                 **/
                foreach (validate::$error as $validateError)
                {
                errorHandler::echoError($validateError);
                }
            }

    }
}
