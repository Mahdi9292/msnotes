<?php

?>
<!--Header-->
<div id="header-wrapper">
    <div id="header-top-right">

        <img class="profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
        <a style="margin-left: 10px" class="btn btn-primary btn-sm" href="<?= baseUrl() ?>/user/logout"><?= _btn_logout ?></a>
        <span style="margin-left: 10px"> <?= $_SESSION['email'] ?> </span>
        <!--    Access Part        -->
        <span style="margin-left: 10px"><b style="margin-left: 40px">Your Access levels:</b> <?= get_access_name()?></span>
    </div>
</div>


<!-- Form to Edit with User ID-->
<div id="content">
    <div class="m40t"><h4> Edit User Access </h4></div><br><br><br>

    <button class="btn btn-primary" type="button" id="formButton-userId">Edit With User ID</button><br>
    <div style="display: none " id="form-userId" class="border border-secondary rounded p10 m10t">
        <div class="form-group">
            <label for="userId">User ID</label><br>
            <input type="text" name="userId" class="form-control" id="userId" placeholder="Enter User ID"><br><br>
            <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="access">Access Name</label><br>
            <input type="text" name="access" class="form-control" id="access" placeholder="Enter Access Name">
        </div>

        <button onclick="promoteByUserId()" class="btn btn-dark">Promote</button>
    </div>
    <hr>

    <!-- Form to Edit with Email-->
    <button class="btn btn-primary" type="button" id="formButton-email">Edit With User Email</button><br>
    <div style="display: none" id="form-email" class="border border-secondary rounded p10 m10t">
        <div class="form-group">
            <label for="email">User Email</label><br>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter User Email"><br><br>
            <!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
        </div>
        <div class="form-group">
            <label for="access">Access Name</label><br>
            <input type="text" name="access" class="form-control" id="access2" placeholder="Enter Access Name">
        </div>

        <button onclick="promoteByEmail()" class="btn btn-dark">Promote</button>
    </div>
</div>
<!-- Script -->

<script>
    $(document).ready(function() {
        $("#formButton-userId").click(function() {
            $("#form-userId").toggle();
        });
    });

    $(function() {
        $("#formButton-email").click(function() {
            $("#form-email").toggle();
        });
    });
    function promoteByUserId(){
        var value1 = $('#userId').val();
        var value2 = $('#access').val();
        $.ajax('/notes-v2/admin/promoteByUserId/' + value1 + '/' + value2,{
            type: 'post',
            dataType: 'json',
            success: function (data) {
                alert("Access Level for User ID: " + value1 + " Successfully updated !");
            }
        });
    }

    function promoteByEmail(){
        var value1 = $('#email').val();
        var value2 = $('#access2').val();
        $.ajax('/notes-v2/admin/promoteByEmail/' + value1 + '/' + value2,{
            type: 'post',
            dataType: 'json',
            success: function (data) {
                alert("Access Level for User with email: " + value1 + " Successfully updated !");
            }
        });
    }


    $(function () {
        $('#userId').on('keyup', function () {
            var value = $(this).val();
            $.ajax('/notes-v2/admin/getUserAccessByUserId/' + value,{
                dataType: 'json',
                success: function (data) {
                    var access =data.access.replaceAll(/\|/g, ',', data.access);
                    access = access.substring(1, access.length -1);
                    $('#access').val(access);
                    // console.log(data.access);
                }

            });
        });
    });

    $(function () {
        $('#email').on('keyup', function () {
            var value = $(this).val();
            $.ajax('/notes-v2/admin/getUserAccessByEmail/' + value,{
                dataType: 'json',
                success: function (data) {
                    var access =data.access.replaceAll(/\|/g, ',', data.access);
                    access = access.substring(1, access.length -1);
                    $('#access2').val(access);
                    // console.log(data.access);
                }

            });
        });
    });
</script>