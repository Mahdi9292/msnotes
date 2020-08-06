<?
if (isset($_SESSION['email'])){
  $message = _already_logged_in . ' ' . $_SESSION['email'];
  $data ['message'] = $message;
   View::render('/message/success.php', $data);
  exit;
}
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Administrator</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <img class="nav-link profile-image" src="<?= baseUrl() ?>/image/empty-profile-24.png">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href = "<?=baseUrl()?>/user/login" >login as user</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

            </ul>

    </div>
</nav><!-- END HEADER -->

<div class="container" style="margin-top: 80px; padding: 10px;">
    <div class="row">
        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2">
            <div>
                <span>
                    <h4 style="background-color: #333333; color: #fff; padding: 10px;"> Sign in</h4>
                </span>
            </div>
            <form action="<?=baseUrl()?>/user/adminLogin" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" id="email" class="form-control" name="email" placeholder="<?=_ph_email?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" class="form-control" name="password" placeholder="<?=_ph_password?>">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10">
                        <!-- <input type="submit" class="fadeIn fourth btn btn-dark" value="<?//=_btn_login?>"> -->
                        <button type="submit" class="btn btn-dark"><?=_btn_login?></button>
                    </div>
                </div>
                
            </form>
            <div class="col-sm-10">
                <button class="btn btn-light" onclick="window.location.href = '<?=baseUrl()?>/user/login';" >login as user</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-link btn-sm">Forgot Password?</button>
            </div>

        </div> 
    </div>
</div>
