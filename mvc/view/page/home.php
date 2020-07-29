<div id="header-wrapper">
    <div id="header-top-right">
        <? if ($isGuest){?>
            <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
            <span style="margin-left: 10px"> <?= _header_guest ?></span>
            <a style="margin-left: 10px" class="btn btn-primary btn-sm" href="<?= baseUrl() ?>/user/login"> <?= _btn_login ?></a>
            <span><?= get_access_name()?></span>
        <? } else { ?>
            <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
            <a style="margin-left: 10px" class="btn btn-primary btn-sm" href="<?= baseUrl() ?>/user/logout"><?= _btn_logout ?></a>
            <span style="margin-left: 10px"> <?= _header_welcome ?> <?= $_SESSION['email'] ?> </span>
            <!--    Access Part        -->
            <span style="margin-left: 10px"><?= get_access_name()?></span>

        <? } ?>
    </div>
</div>

<? if ($isGuest){?>
    <div id="content" class="row">
        <div id="content" class="tac lf important-color m15">
            <span> <h4> You must <a class="btn btn-outline-secondary btn-sm" href="/notes-v2/user/register">register</a> or <a class="btn btn-outline-secondary btn-sm" href="/notes-v2/user/login">login</a> in order to access all features</h4></span>
        </div>
    </div>



<? } else {?>
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

        <tbody>
        <?if ($records == null){ $records = array();} ?>
        <? foreach ($records as $record) {
            if ($record['isDone']){
                $doneClass = "done";
            }else{
                $doneClass = "pending";
            }

            ?>

            <tr class="todo <?= $doneClass ?>">
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
    <? } ?>

</div>


<!-- Script-->
<script>
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