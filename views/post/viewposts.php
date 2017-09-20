<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/12/2017
 * Time: 8:46 PM
 */
//move the active highlight to the page the use is on
$postpage   = '';
$homepage   = '';
$signuppage = '';
$viewposts  = 'active';
?>

<!--the header has the nav-->
<?php require_once ('views/header.php'); ?>

<script>
    var source = new  EventSource("index.php?controller=posts&action=viewLatest&latestDate=<?php echo date('Y-m-d H:i:s');?>");
    source.onmessage = function(event){
        document.getElementById("latestArticle").innerHTML = event.data;
    };
</script>

<section>
    <div class="container col-md-8 col-lg-offset-2">
        <h4><small>RECENT POSTS</small></h4>
        <p id="latestArticle"> </p>
        <?php echo date('Y-m-d H:i:s');?>

        <?php foreach ($articles as $value){    $rates = new rates($value['article_id']);?>
        <article class="jumbotron" style="font-family: OSpostsFont;">
            <hr style="margin-bottom:4px;height: 2px;color: #2e6da4;background-color: #2e6da4;">
            <hr style="margin-top:4px;height: 2px;color: #2e6da4;background-color: #2e6da4;">

            <h2><?php echo $value['subject'];?></h2>

            <h5 style="color: #2e6da4;"><i class="fa fa-clock-o"></i> Posted by <?php echo $value['user_name']. ' on ' .$value['date_entered'];?> </h5>
            <div id="tags">
                <small>TAGS</small>
<!--                    tags-->
                <?php foreach (stringst::splitTags($value['tags'],'\\') as $tag ){?>

            <span style="margin-left: 2px;margin-right: 2px;" class="label label-primary"> <?php echo $tag; ?> </span>
                <?php }?>
            </div>
            <hr>
            <div style="font-size: medium;">

<!--                article paragraphs-->
                <?php foreach (stringst::splitTags($value['article'],"\n") as $paragraph){?>

                <p> <?php echo $paragraph; ?></p>

                <?php }; ?>

            </div>
            <hr>
            <div>

                <p><button class="btn btn-xs btn-primary" onclick="like(<?php echo $value['article_id'];?>)">like :)</button> <span id="like<?php echo $value['article_id'];?>" class="badge"> <?php echo $rates->getLikes(); ?> </span>
                    <button class="btn btn-xs btn-warning" onclick="dislike(<?php echo $value['article_id'];?>)">dislike :(</button> <span id="dislike<?php echo $value['article_id'];?>" class="badge"> <?php echo $rates->getDislikes(); ?> </span>

                </p>
                <small class="text-right"><?php echo $value['email'];?></small>
            </div>
        </article>
        <?php };?>
    </div>

<!--    pagination-->
    <div>
        <ul class="pagination">
            <?php $total_pages = ceil(article::getRpp()/5);
                for ($i = 1; $i<$total_pages; $i++){
                    $offset = $i * 5;
            ?>
            <li><a href="index.php?controller=posts&action=viewposts&pageoffset=<?php echo $offset;?>" > <?php echo $i;?> </a></li>

            <?php };?>
        </ul>
    </div>
</section>
<script>
//    like
    function like(articleID) {
            $('#like'+articleID).load('index.php/?controller=posts&action=Like&articleID='+articleID);
        }
//    dislike
function dislike(articleID) {
        $('#dislike' + articleID).load('index.php/?controller=posts&action=DisLike&articleID='+articleID,);
    }
</script>