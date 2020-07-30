<div id="header-wrapper">
    <div id="header-top-right">

            <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
            <a style="margin-left: 10px" class="btn btn-primary btn-sm" href="<?= baseUrl() ?>/user/logout"><?= _btn_logout ?></a>
            <span style="margin-left: 10px"> <?= _header_welcome ?> <?= $_SESSION['email'] ?> </span>
            <!--    Access Part        -->
            <span style="margin-left: 10px"><?= get_access_name()?></span>


    </div>
</div>

<div id="content" class="row">
    <br><br>
    <div class="tar">
        <a class="btn btn-dark btn-sm" href="/notes-v2/admin/promote_user_form" target="_blank">Update User Access</a>
    </div>
    <table class="table table-hover" >
        <thead>
        <tr class="todo">
            <th>User ID</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Access Level/s</th>
            <th>Register Time</th>
            <!--            <th>Addresse</th>-->
            <!--            <th>Kategorie</th>-->
        </tr>
        </thead>

        <tbody>
        <?if ($records == null){ $records = array();} ?>

        <? foreach ($records as $record) {?>
            <?
                $access = $record['access'];
                $access = str_replace('|', ',',$access);
                $access = substr($access, 1, strlen($access)-2);

            ?>
            <tr>
                <td><?= $record['user_id'] ?></td>
                <td><?= $record['email'] ?></td>
                <td><?= $record['fullname'] ?></td>
                <td><?= $access ?></td>
                <td><?= $record['registerTime'] ?></td>

            </tr>
        <? } ?>

        </tbody>
    </table>
    <br>

</div>
