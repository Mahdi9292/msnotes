

<?= pagination ('/notes-v2/note/catalog', 3, 'btn btn-blue', 'btn', $pageIndex, $pageCount, 'getPage')?>

<br>
<br>
<br>

<!-- --------------------------------------- -->
<span class="btn btn-blue" onclick="getPage(1)">1</span>
<span>..</span>
<? for ($i = $pageIndex - 3; $i <=$pageIndex + 3; $i++ ){
    if ($i <= 1){continue;}
    if ($i >= $pageCount){continue;}
    if ($i == $pageIndex){
        ?>
        <span class="btn"><?=$i?></span>

    <? }else{ ?>

        <span class="btn btn-blue" onclick="getPage(<?=$i?>)" ><?=$i?></span>

    <?}}?>
<span>..</span>
<span  class="btn btn-blue" onclick="getPage(<?= $pageCount?>)"><?=$pageCount?></span>
<br>
<br>
<br>


<div id="notes">

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

    <br>
    <br>
    <div class="tar">
        <a class="btn-blue" href="/notes-v2/note/submit">Insert</a>
    </div>
</div>
