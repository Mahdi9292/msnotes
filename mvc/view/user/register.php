<div class="tac">
  <img src="<?=baseUrl()?>/image/empty-profile-128.png"><br><br>

  <form action="<?=baseUrl()?>/user/register" method="post">
    <input type="text" class="ltr" placeholder="<?=_ph_email?>" name="email"><br>
    <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password1"><br>
    <input type="password" class="ltr" placeholder="<?=_ph_confirm_password?>" name="password2"><br>
    <input type="text" placeholder="<?=_ph_name?>" name="name"><br>
    <input type="text" placeholder="<?=_ph_nickname?>" name="nickname"><br>

    <button type="submit" class="btn btn-primary"><?=_btn_register?></button>
      <a class="btn btn-secondary" href="/notes-v2/user/login">login</a>
  </form>
</div>