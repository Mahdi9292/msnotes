<div id="header-wrapper">
    <div id="header-top-right">
        <? if ($isGuest){?>
        <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
        <span style="margin-left: 10px"> <?= _header_guest ?></span>
        <a style="margin-left: 10px" class="btn-blue" href="<?= baseUrl() ?>/user/login"> <?= _btn_login ?></a>

        <? } else { ?>

        <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
        <a style="margin-left: 10px" class="btn-blue" href="<?= baseUrl() ?>/user/logout"><?= _btn_logout ?></a>
        <span style="margin-left: 10px"> <?= _header_welcome ?> <?= $_SESSION['email'] ?> </span>
        <? } ?>
    </div>
</div>

<div id="content">

    <? if ($isGuest){?>

    <div class="tac lf important-color m15">
        <span> You must register in order to access all fetures</span>
    </div>

    <? } else {
    
       

    ?>

    <ul class="todo-entry tac">
        <li>DONE</li>
        <li>Delete</li>
        <li>Title</li>
        <li>Description</li>
        <li>EventTime</li>
    </ul>
    <?if ($records == null){ $records = array();} ?>
    <? foreach ($records as $record) {
            if ($record['isDone']){
                $doneClass = "done";
            }else{
                $doneClass = "pending";
            }
            
        ?>

    <ul class="todo-entry <?= $doneClass ?>">
        <li><span onclick="noteToggle(this, <?= $record['note_id'] ?>)" class="btn">#</span></li>
        <li><span onclick="noteRemove(this, <?= $record['note_id'] ?>)" class="btn">X</span></li>
        <li><?= $record['title'] ?></li>
        <li><?= $record['description'] ?></li>
        <li><?= $record['eventTime'] ?></li>
    </ul>
    <? } ?>
    <? } ?>
    <br>
    <br>
    <div class="tar">
        <a class="btn-blue" href="/notes-v2/note/submit">Insert</a>
    </div>
</div>

<script>
    function noteToggle(sender, noteId) {
        sender = $(sender);
        var parent = sender.parentsUntil('.todo-entry').parent();
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
        var parent = sender.parentsUntil('.todo-entry').parent();
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