<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/10/2017
 * Time: 1:43 AM
 * navigation
 */
?>
<ul class="nav navbar-nav">
    <li class="<?php echo $homepage ?>"><a href="?controller=pages&action=home">Home</a></li>
    <li class="<?php echo $postpage ?>"><a href="?controller=posts&action=post">Post</a></li>
    <li class="<?php echo $viewposts ?>"><a href="?controller=posts&action=viewposts&pageoffset=0">View posts</a></li>
</ul>

<!--    user details-->
<ul class="nav navbar-nav">

    <li><a href="?controller=pages&action=home"><i class="fa fa-user"></i> <b> <?php echo sessions::getSessionValue('username');?></b> </a></li>

</ul>

<ul class="nav navbar-nav navbar-right">
    <li>
<!--        action = index.php/?controller=logout&action=logout-->
        <form id="logoutForm" method="post" action="index.php/?controller=login&action=logout" class="navbar-form navbar-left">
            <!--            logout button-->
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="login">logout</button>
            </div>
        </form>
    </li>
</ul>
