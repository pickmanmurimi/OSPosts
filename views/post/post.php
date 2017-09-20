<?php
/**
 * Created by PhpStorm.
 * User: pick
 * Date: 7/26/2017
 * Time: 12:36 AM
 * a user can post a new item on this page
 */
//move the active highlight to the page the use is on
$postpage   = 'active';
$homepage   = '';
$viewposts  = '';
$signuppage = '';
?>
<?php// echo $classmessage;?>
<!--header has the nav-->
<?php require_once ('views/header.php');?>
<!--content-->
<section>
<div class="container text-center col-md-6 col-md-offset-3">
    <h1>Write an article</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <form id="ArticleForm" method="post" action="index.php/?controller=posts&action=publish">
<!--                title-->
                <div class="input-group">
                    <span class="input-group-addon">Title</span>
                    <input class="form-control" maxlength="70" type="text" id="title" name="title" placeholder="required: title"/>
                    <span class="input-group-addon" id="titlecharacters">70</span>
                </div>
                <br>
<!--                tags-->
                <div class="input-group">
                    <span class="input-group-addon">Tags</span>
                    <input class="form-control" data-toggle="tooltip" data-placement="top" title="use the backslash '\' to separate tags" maxlength="50" type="text" id="tag" name="tag" placeholder="example: technology\software"/>
                    <span class="input-group-addon"  id="tagscharacters">50</span>
                </div>
                <br>

                <!--                       POST-->
                <div class="form-group">
                    <label for="article">article</label>
                    <textarea class="form-control" rows="8" id="article" maxlength="500" name="article" placeholder="Your article..."></textarea>
                    <span><span id="remaining">500</span> characters remaing</span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-primary" id="publish">publish</button>
                </div>
            </form>
            <div class="alert alert-danger" id="msgerr" style="display: none;"><strong>Error! </strong><p id="errormsg"></p></div>
            <div class="alert alert-success" id="msgscss" style="display: none;"><strong>Success! </strong><p id="successmsg"></p></div>
        </div>
    </div>
</div>
</section>

<!--footer-->
<?php require_once ('views/footer.php');?>

<!--script-->
<script>
//    tooltip
    $(document).ready( function () {
       $('[data-toggle ="tooltip"]').tooltip();
    });
    //    COUNTS THE NUMBER OF CHARACTERS ENTERD IN THE TEXT AREa
    $(document).ready(function () {
        $('#article').keyup(function () {
//            calls count
            count(500,150,$(this),$('#remaining'));
        });
    });
//    counts the number of characters entered in the subject
    $(document).ready(function () {
        $('#tag').keyup(function () {
//            calls count
            count(50,10,$(this),$('#tagscharacters'));
        });
    });

//    counts the number of characters entered in the subject
    $(document).ready(function () {
        $('#title').keyup(function () {
//            calls count
            count(70,10,$(this),$('#titlecharacters'));
        });
    });

    //counts the characters remaining
    function count(maxchracters,warning,form,display) {
        var characters = form.val().length;
        var remaining = maxchracters - characters;
        //get the element that shows the remaining words
        var remainingdispaly =  display;
        if(remaining < warning){
            remainingdispaly.css({'color':'red'});//warns the user when the characters are at 200
        }else {
            remainingdispaly.css({'color':'green'})
        }

        remainingdispaly.html(remaining);

    }
</script>
<script>
    $(document).ready(function () {
//        bind the form to the ajaxForm function from the jquery form plugin
        $('#ArticleForm').ajaxForm({
            //method and url have been set when the form was created
            //now just set what to do before send or on success

//           before the data is submitted
            beforeSubmit: function(){
                //hide the alert divs
                $('#msgerr').hide();
                $('#msgscss').hide();
//               wipe all html in the validation box
                $('#validation').html(null);
            },
//           type of data we expect
            dataType:  'json',
            success: function(serverResponse) {
                console.log(serverResponse);
                if(serverResponse.error){
//                if there is an error
                    $('#msgerr').show();
                    $('#errormsg').html(serverResponse.message);

                    } else {
//                if there is no error
                    $('#msgscss').show();
                    $('#successmsg').html(serverResponse.message);
                }
            },
        });
    });

</script>