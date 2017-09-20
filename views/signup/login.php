<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 8/9/2017
 * Time: 11:24 PM
 */
?>
<!-- log in form-->
<ul class="nav navbar-nav navbar-right">
    <li>
        <form id="loginForm" method="post" action="index.php/?controller=login&action=login" class="navbar-form navbar-left">
            <!--                username-->
            <div class="form-group">
                <input class="form-control" type="text" id="loginUsername" name="loginUsername" placeholder="username">
            </div>
            <!--                password-->
            <div class="form-group">
                <input class="form-control" type="password" id="loginPassword" name="loginPassword" placeholder="password">
            </div>
            <!--            login button-->
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="login">log in</button>
            </div>
        </form>
    </li>
    <!--                password recovery-->
    <li class="<?php //echo $signuppage ?>"><a href="?controller=signup&action=index"><span class="glyphicon glyphicon-user"></span> Forgot password?</a> </li>
</ul>


<script>
//    $(document).ready(function () {
////        bind the form with ajax form plugin
//       $('#loginForm').ajaxForm({
//           //method and url have been set when the form was created
//           //now just set what to do before send or on success
//
////           before the data is submitted
//           beforeSubmit: function(){
//               //hide the alert divs
//               $('#loginerror').hide();
//               $('#loginsuccess').hide();
////               wipe all html in the validation box
//               $('#validation').html(null);
//           },
////           type of data we expect
//           dataType:  'json',
//           success: function(serverResponse) {
//               console.log(serverResponse);
//               if(serverResponse.response.error){
////                if there is an error
//                   $('#loginerror').show();
//                   $('#loginerrorMessage').html(serverResponse.response.message);
////                loop through the errors
//                   $.each(serverResponse.validation,function (key,value) {
//                       console.log(key +'-'+value);
//                       $('#validation').append('- ' +value + '<br>');
//                   });
//               }else {
////                if there is no error
//                   $('#loginsuccess').show();
//                   $('#loginsuccessMessage').html(serverResponse.response.message);
//               }
//           },
//       });
//    });
</script>