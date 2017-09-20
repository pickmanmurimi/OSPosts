<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/26/2017
 * Time: 1:13 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!--    use php to change the tittle dinamically-->
    <title>OSPosts.com</title>
    <meta charset="UTF-8">
    <!--    bootsrap-->
    <link rel="stylesheet" href="public/style/css/bootstrap.min.css">
    <!--    JQUERY-->
    <script src="public/style/js/jquery.js"></script>
    <!--    BOOTSRAP JS-->
    <script src="public/style/js/bootstrap.min.js"></script>
    <!--    jQuery form plugin-->
    <script src="public/style/plugins/jquery.form.js"></script>
    <!--    jQuery tooltip plugin-->
    <script src="public/style/plugins/tooltip.js"></script>
    <!--    font awsome-->
    <link rel="stylesheet" href="public/style/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--    basic styles-->

    <!--suppress CssUnknownTarget -->
    <style type="text/css">
        a{text-decoration: none !important;}
        /*OSposts font*/
        @font-face {
            font-family: OSpostsFont;
            /*Nunito font from google open source fonts*/
            /*my editor ignores the error that it cannot resolve the url. this code is run from index.php thus the url is fine*/
            src: url('public/style/fonts/Nunito/Nunito-SemiBold.ttf');
        }
        /*hover effect*/
        .hover:hover{
            background-color: mediumspringgreen;
        }
        .fixednav{
            position: fixed;
            width: 100%;
            left: 0;
            top: 0;
            z-index: 9999;
        }

    </style>
</head>
<body>



<!--******************************************************************************************-->
<header>
    <!--    navigation-->
    <nav id="mainnav" class="navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <?php if (sessions::trackSession('loggedIn')){
                    $href = "http://localhost/OSPosts/index.php?controller=pages&action=home";
                }else{
                    $href = "http://localhost/OSPosts/index.php?controller=signup&action=index";
                }?>
                <a class="navbar-brand" href="<?php echo $href; ?>">OSPosts.com</a>
            </div>
            <?php
            if (isset($_GET['controller']) && isset($_GET['action'])){
            if ($_GET['controller'] == 'signup' && $_GET['action'] == 'index'){
//                login form
                require_once ('signup/login.php');
            }else{
//                the navigation
                require_once ('nav.php');
            }
            }else{
                //                login form
                require_once ('signup/login.php');
            }
            ?>
        </div>
    </nav>
</header>

<script>
    $(window).bind('scroll', function () {
       if ($(window).scrollTop() > 50){
           $('#mainnav').addClass('fixednav');
       }else {
           $('#mainnav').removeClass('fixednav');
       }
    });
</script>