<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/11/2017
 * Time: 1:23 PM
 * this is haddles all the articles
 */
class article
{
    public $title;
    public $tag;
    public $body;
    public $userId;
    public $dateEntred;
    public $dateEdited;

    /**
     * article constructor.
     * @param $userId
     * @param $title
     * @param $body
     */

    function __construct($userId,$title,$body,$tag)
    {
        /**
         * the dates are system generated, no need to get them from the controller
         * the valuables will be assigned
         */

        $this->userId = $userId;
        $this->title  = $title;
        $this->body   = $body;
        $this->tag    = $tag;

        /** validate the values passed**/

        validate::validateText($this->title,70,'Title');
        validate::validateText($this->tag,50,'tag');
        validate::validateText($this->body,500,'body');
        validate::checkMinLength($this->body,100,'body');
        validate::validateText($this->userId,500,'user Id');

    }

    public function publish(){
        /**
         * this will write the article to the database
         **/

        $db = database::getPDOobject();

        $publish = $db->prepare('INSERT INTO `posts` (`user_id`, `subject`,`tags`, `article`, `date_entered`, `date_edited`)
VALUES (:userId, :subject, :tag, :article, now(), NULL)');

        $publishData = [':userId' => htmlspecialchars($this->userId),
        ':subject' => htmlspecialchars($this->title),
            ':tag' =>htmlspecialchars($this->tag),
       ':article' => htmlspecialchars($this->body),];
        $execute = $publish->execute($publishData);

        if($execute){
            return true;
        }else{
            return false;
        };


    }

    /**
     * gets all the articles in the database
     * will get the latest 5
     */
    static function getArticles($offset){
            if ($offset == NULL){
                $offset = 0;
            }
        $db = database::getPDOobject();

        $getArticles = $db->prepare('SELECT article_id,posts.user_id,subject,tags,article,date_entered,date_edited,user_name,fullnames,email,date_created,last_activity FROM `posts` 
JOIN users ON posts.user_id = users.user_id ORDER BY posts.date_entered DESC LIMIT 5 OFFSET :offset ');
        $getArticles->execute(array(":offset" => $offset));


        return  $getArticles->fetchAll();
    }

    /**
     * gets all the articles in the database
     * will get the latest 1
     */
    static function getLatsetArticle($offset,$latestDate){
        if ($offset == NULL){
            $offset = 0;
        }
        $db = database::getPDOobject();

        $getArticles = $db->prepare('SELECT count(article_id) as latestArticles FROM `posts` WHERE `date_entered` > :latestDate ');
        $getArticles->execute(array(":latestDate" => $latestDate));


        return  $getArticles->fetch()['latestArticles'];
    }

    /**
     * get the results per page
     */
    static function getRpp(){
        $db = database::getPDOobject();

        $getArticles = $db->prepare('SELECT article_id,posts.user_id,subject,tags,article,date_entered,date_edited,user_name,fullnames,email,date_created,last_activity FROM `posts` 
JOIN users ON posts.user_id = users.user_id ORDER BY posts.date_entered DESC');
        $getArticles->execute();


        return  $getArticles->rowCount();
    }
}