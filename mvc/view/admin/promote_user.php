<?php

?>

<form action="/notes-v2/admin/promote" method="post">
    <div class="form-group">
        <label for="userId">User ID</label><br>
        <input type="text" name="userId" class="form-control" id="userId" placeholder="Enter User ID"><br><br>
<!--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    <div class="form-group">
        <label for="access">Access Name</label><br>
        <input type="text" name="access" class="form-control" id="access" placeholder="Enter Access Name">
    </div>

    <button type="submit" class="btn btn-primary">Promote</button>
</form>

<script>
    $(function () {
        $('#userId').on('keyup', function () {
            var value = $(this).val();
            $.ajax('/notes-v2/admin/getUserAccess/' + value,{
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
</script>