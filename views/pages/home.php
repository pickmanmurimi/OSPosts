<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/25/2017
 * Time: 11:42 PM
 * this is the home page
 * this is displayed when the user first loads the site(index.php) or hits 'home'
 */
//move the active highlight to the page the user is on
$homepage   = 'active';
$postpage   = '';
$viewposts  = '';
$signuppage = '';
?>
<!--the header has the nav-->
<?php require_once ('views/header.php'); ?>

<style type="text/css">
    .sectionnav{word-spacing: 30px;font-size: 2em;letter-spacing: 2px;font-family: 'OSpostsFont' !important;}
    h1{font-family: 'OSpostsFont' !important;}
</style>
<!--content-->
<section>
    <div class="jumbotron" style="">
        <div class="text-center">
            <h1>WELCOME TO OSPosts.COM</h1>
            <p>An open source writing platform</p>
        </div>
    </div>
</section>
<section>
    <div class="container text-center">
       <div class="row">
           <span class="lead sectionnav" ><a href="?controller=posts&action=post"> .write<i class="fa fa-pencil"></i> </a></span>
           <span class="lead sectionnav" ><a href="?controller=posts&action=viewposts&pageoffset=0"> .posts<i class="fa fa-gg"></i> </a></span>
           <span class="lead sectionnav" ><a href="#"> .profile<i class="fa fa-user"></i> </a></span>
           <span class="lead sectionnav" ><a href="#"> .about<i class="fa fa-empire"></i> </a></span>
       </div>
    </div>
</section>

<!--footer-->
<?php require_once ('views/footer.php');?>
