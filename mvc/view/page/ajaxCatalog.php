

<?= pagination ('/notes-v2/note/catalog', 3, 'btn btn-blue', 'btn', $pageIndex, $pageCount);?>

<br>
<br>
<br>

<!-- --------------------------------------- -->
<?= pagination ('/notes-v2/note/catalog', 3, 'btn btn-blue', 'btn', $pageIndex, $pageCount, 'getPage');?>

<br>
<br>
<br>

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
                    <td><span onclick="noteToggle(this, <?= $record['note_id'] ?>)" class="btn">#</span></td>
                    <td><span onclick="noteRemove(this, <?= $record['note_id'] ?>)" class="btn">X</span></td>
                    <td><?= $record['title'] ?></td>
                    <td><?= $record['description'] ?></td>
                    <td><?= $record['eventTime'] ?></td>

                </tr>
            <? } ?>

            </tbody>
        </table>

    <br>
    <div class="tar">
        <a class="btn btn-blue tooltip.in" href="/notes-v2/note/submit">Insert</a>
    </div>
</div>
