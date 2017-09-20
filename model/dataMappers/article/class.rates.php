<?php

/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/12/2017
 * Time: 11:11 PM
 */
class rates
{
    public $post_id;
    public $likes;
    public $dislikes;
    public $last_rates;//date

    /**
     * rates constructor.
     * @param $postId
     */
    function __construct($postId)
    {
        $this->post_id = $postId;
    }

    /**
     * get the number of likes a post got
     */
    public function getLikes(){

        $db = database::getPDOobject();
        $getLikes = $db->prepare('SELECT `likes` FROM post_rates WHERE `post_id` = :postID');
        $getLikes->execute(array(':postID' => $this->post_id));
        return $getLikes->fetch()['likes'];

    }

    /**
     * get the number of dislikes
     */
    public function getDislikes(){

        $db = database::getPDOobject();
        $getDisLikes = $db->prepare('SELECT `dislikes` FROM post_rates WHERE `post_id` = :postID');
        $getDisLikes->execute(array(':postID' => $this->post_id));
        return $getDisLikes->fetch()['dislikes'];

    }

    /**
     * like an article
     */
    public function Like(){

        $db = database::getPDOobject();
        $like = $db->prepare('INSERT INTO `post_rates` (`post_id`, `likes`, `dislikes`, `last_rate`)
VALUES (:post_id, :likes, NULL, now()) ON DUPLICATE KEY UPDATE likes = IFNULL(likes,0) + 1;');
        $like->execute(array(':post_id' => $this->post_id,':likes' => 1,));

        return true;
    }

    /**
     * dislike an article
     */
    public function Dislike(){

        $db = database::getPDOobject();
        $dislike = $db->prepare('INSERT INTO `post_rates` (`post_id`, `likes`, `dislikes`, `last_rate`)
VALUES (:post_id, NULL, :dislikes, now()) ON DUPLICATE KEY UPDATE dislikes = IFNULL(dislikes,0) + 1;');
        $dislike->execute(array(':post_id' => $this->post_id,':dislikes' => 1,));

        return true;
    }
}