<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">MSNotes</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <? if ($isGuest){?>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <img class="nav-link profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
                </li>
                <li class="nav-item">
                    <span class="nav-link disabled"> <?= _header_guest ?></span>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= baseUrl() ?>/user/login"><?= _btn_login ?></a>
                </li>
                <li class="nav-item">
                    <span class="nav-link"><?= get_access_name()?></span>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>

        <? } else { ?>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <img class="nav-link profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
                </li>
                <li class="nav-item">
                <span class="nav-link disabled"> <? if (isset($_SESSION['nickname'])){echo "Welcome Dear &nbsp;" . $_SESSION['nickname'];}
                    else {echo _header_welcome ."&nbsp;". $_SESSION['email'];} ?></span>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= baseUrl() ?>/user/logout"><?= _btn_logout ?></a>
                </li>
                <li class="nav-item">
                    <span class="nav-link"><?= get_access_name()?></span>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>

        <? } ?>
    </div>
</nav>


<!-- BOOTSTRAP HEADER -->
<!-- From Here -->

<!-- To here -->
<? if ($isGuest){?>
    <div id="content" class="row">
        <div id="content" class="tac lf important-color m15">
            <span> <h4> You must <a class="btn btn-outline-secondary btn-sm" href="/notes-v2/user/register">register</a> or <a class="btn btn-outline-secondary btn-sm" href="/notes-v2/user/login">login</a> in order to access all features</h4></span>
        </div>
    </div>



<? } else {?>
    <div class="container">
        <div id="content" class="row">
            <?if(!isVip()){?>
                <div class="tac">
                    <span>If you want to use the unlimited opthions, please buy VIP membership !</span>
                    <a href="#" class="btn btn-info btn-sm">More Information :)</a>
                </div>
            <?}
            //       dump ($_SESSION);

            ?>
            <br><br>
            <table class="table table-hover text-center" >
                <thead>
                <tr class="todo">
                    <th>DONE</th>
                    <th>Delete</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>EventTime</th>
                    <!--            <th>Addresse</th>-->
                    <!--            <th>Kategorie</th>-->
                </tr>
                </thead>

                <tbody id="newComment">
                <?if ($records == null){ $records = array();} ?>
                <? foreach ($records as $record) {
                    if ($record['isDone']){
                        $doneClass = "done";
                    }else{
                        $doneClass = "pending";
                    }

                    ?>

                    <tr class="todo <?= $doneClass ?>" >
                        <td><span onclick="noteToggle(this, <?= $record['note_id'] ?>)" class="btn btn-secondary btn-sm">#</span></td>
                        <td><span onclick="noteRemove(this, <?= $record['note_id'] ?>)" class="btn btn-secondary btn-sm">X</span></td>
                        <td><?= $record['title'] ?></td>
                        <td><?= $record['description'] ?></td>
                        <td><?= $record['eventTime'] ?></td>

                    </tr>
                <? } ?>

                </tbody>
            </table>
            <br>
            <div class="tar">
                <a class="btn btn-dark btn-sm" href="/notes-v2/note/submit">Insert</a>
            </div>

        </div>

<!--        <div class="row col-lg-12">-->
<!--            <button class="btn btn-primary" type="button" id="commentButton">Edit With User ID</button><br>-->
<!--            <div style="display: none " id="commentForm" class="col-lg-12 border border-secondary rounded p10 m10t">-->
<!--                <div class="form-group">-->
<!--                    <label for="title">Title</label><br>-->
<!--                    <input type="text" name= "title" class="form-control" id="title" placeholder="Enter Title"><br><br>-->
                    <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="description">Description</label><br>-->
<!--                    <textarea type="text" name="description" class="form-control" id="description" placeholder="Enter Comment Here..."></textarea>-->
<!--                </div>-->
<!---->
<!--                <button onclick="insertComment()" class="btn btn-dark">Submit Comment</button>-->
<!--            </div>-->
<!--        </div>-->
    </div>
<? } ?>

<!-- Script-->
<script>
    $(document).ready(function() {
        $("#commentButton").click(function() {
            $("#commentForm").toggle();
        });
    });

    //function insertComment(){
    //    var value1 = $('#title').val();
    //    var value2 = $('#description').val();
    //    $.ajax('/notes-v2/note/submit/' + value1 + '/' + value2,{
    //        type: 'post',
    //        dataType: 'json',
    //        success: function (data) {
    //            var doneClass = <?//= json_encode($doneClass);?>//;
    //            doneClass += " todo";
    //            var date = data.date;
    //            // var user_id = data.user_id;
    //            var i = 1;
    //            $("#newComment").append("<tr class=" + doneClass + " ><td>#</td><td>x</td><td>"+value1+"</td><td>"+value2+"</td><td>"+date+"</td></tr>");
    //        }
    //    });
    //}


    function noteToggle(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('.todo').parent();
        $.ajax(
            '/notes-v2/note/toggle/' + noteId, {
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (parent.hasClass('done')) {
                        parent.removeClass('done');
                        parent.addClass('pending');
                    } else {
                        parent.removeClass('pending');
                        parent.addClass('done');
                    }
                }
            });
    }

    function noteRemove(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('.todo').parent();
        $.ajax(
            '/notes-v2/note/remove/' + noteId, {
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    parent.remove();
                }
            });
    }
</script>