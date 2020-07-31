<?php
if (isset($test)){
    echo "My Name Is " . $test;
}

?>
<!-- Sample for creating simple comment -->
<div class="commentbox">
    <input type="text" placeholder="your comment" class="comment"></div>
    <input type="button" onclick="insertComment()" value="insert">
</div>

<script>
    function insertComment() {
        var comment = $('.comment').val(); // your comment text box
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function (data) {

                $('.commentbox').append("</br>" + comment); // list of comments. its inserting your last comment at the end of line.

            }
        });
    }
</script>