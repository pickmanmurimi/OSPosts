<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/28/2017
 * Time: 9:45 PM
 * sign up page
 */
//move the active highlight to the page the user is on
$homepage   = '';
$postpage   = '';
$viewposts  = '';
$signuppage = 'active';
?>
<!--header has the nav and the jquery,bootstrap files needed for the sign up page-->
<?php require_once ('views/header.php'); ?>
<!--content-->
<section>
    <style>
        .alert{margin: 0 !important;
                position: absolute;
                    width: 100%;
            z-index: 1;}
    </style>
<!--    alerts-->

    <!--    error div-->
    <div class="alert alert-danger" id="loginerror">
        <p class="text-center">
            <b>Error ! </b><span id="loginerrorMessage"></span>
            <span id="validation" style="font-family: OSpostsFont;">

<!--                check for errors in the loginError SESSION-->
                <?php if (sessions::trackSession('loginError')){
                    echo $_SESSION['loginError'];
                    /**
                    * unset the session after it is displayed
                    * this prevents the error from being displayed in case of the page being reloaded
                    **/
                    sessions::unsetSessions(array('loginError'));
                }else{
                    echo '<script> $("#loginerror").hide();</script>';
                }?>

            </span>
            <button class="btn btn-danger" onclick="$('#loginerror').hide();"> &times;</button>
        </p>

    </div>

    <!--    success div-->
    <div class="alert alert-success" id="loginsuccess" style="display: none">
        <p class="text-center">
            <b>Success ! </b><span id="loginsuccessMessage"></span>
            <button class="btn btn-success" onclick="$('#loginsuccess').hide();"> &times;</button>
        </p>
    </div>

<!--        warning div-->
    <div class="alert alert-warning" id="warning">
        <p class="text-center">
            <b>Warning ! </b><span id="warningMessage">

                <?php if (isset($_GET['message'])){
                    echo $_GET['message'];}else{
                    echo "<script>$('#warning').hide();</script>";
                }?>
            </span>

            <button class="btn btn-warning" onclick="$('#warning').hide();"> &times;</button>
        </p>
    </div>

    <div class="row text-center col-md-12">


<!--        side info whos one tho want to login-->
        <br>
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="jumbotron" style="font-family: OSpostsFont;">
                    <h1>OSPosts.com</h1>
                    <p>welcome to a new way of expressing ideas</p>
                </div>

<!--                panels-->
                <div style="margin: 20px;">
                    <div class="panel panel-primary" style="font-family: OSpostsFont;">
                        <div class="panel-heading">
                            <h3>To do</h3>
                        </div>
                        <div class="panel-body">
                            <p style="word-spacing: 20px;font-size: 1.7em;">read write rate</p>
                        </div>
                    </div>

                </div>


            </div>
        </div>
<!--        sign up-->
        <div class="text-center col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 style="font-family: OSpostsFont;">Sign up</h1>
                </div>

                <div class="panel-body">
                                            <!--                    pass the information to the controller-->
                    <form class="form-group" id="signupForm" action="index.php/?controller=signup&action=signup" method="post">
                        <div class="input-group">
<!--                            full names-->
                                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                <input class="form-control" type="text" placeholder="full name(*)" maxlength="60" id="fullnames" name="fullnames">

                        </div>
                        <br>
<!--                            username-->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                            <input class="form-control" type="text" placeholder="username(*)" maxlength="30" id="username" name="username">
                        </div>
                        <br>
<!--                        email-->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                            <input class="form-control" type="text" id="email" name="email" placeholder="email(*) eg. email@example.com"/>
                        </div>
                        <br>
<!--                           password-->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                            <input class="form-control" type="password" id="password" name="password" placeholder="password(*)"/>
                        </div>
                        <br>
<!--                        re-enter password-->
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i> </span>
                            <input class="form-control" type="password" id="password1" name="password1" placeholder="re-enter password(*)"/>
                        </div>
                        <br>

<!--                    sing up button-->
                        <button class="btn btn-primary btn-block" type="submit" id="signup">sign up</button>


                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<!--footer-->
<?php require_once ('views/footer.php');?>

<!--    script send registration data to php-->
<script>
    $(document).ready(function () {
//        bind the form to the ajaxForm function from the jquery form plugin
       $('#signupForm').ajaxForm({
           //method and url have been set when the form was created
           //now just set what to do before send or on success

//           before the data is submitted
           beforeSubmit: function(){
               //hide the alert divs
               $('#loginerror').hide();
               $('#loginsuccess').hide();
//               wipe all html in the validation box
               $('#validation').html(null);
           },
//           type of data we expect
            dataType:  'json',
           success: function(serverResponse) {
            console.log(serverResponse);
            if(serverResponse.response.error){
//                if there is an error
                $('#loginerror').show();
                $('#loginerrorMessage').html(serverResponse.response.message);
//                loop through the errors
                $.each(serverResponse.validation,function (key,value) {
                    console.log(key +'-'+value);
                    $('#validation').append('- ' +value + '<br>');
                });
            }else {
//                if there is no error
                $('#loginsuccess').show();
                $('#loginsuccessMessage').html(serverResponse.response.message);
            }
           },
       });
    });
</script>