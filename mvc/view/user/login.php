<?
if (isset($_SESSION['email'])){
  $message = _already_logged_in . ' ' . $_SESSION['email'];
  $data ['message'] = $message;
   View::render('/message/success.php', $data);
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <title>Document</title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?=baseUrl()?>/js/jquery-1.11.3.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <link href="/notes-v2/css/base2.css" rel="stylesheet">
    <link href="/notes-v2/css/base.css" rel="stylesheet">
    <link href="/notes-v2/css/style.css" rel="stylesheet">
<!--    <link href="/notes-v2/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--    <script src="/notes-v2/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!--    <script src="/notes-v2/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>-->
    <!--    <script type="text/javascript" src="/notes-v2/js/jquery-1.11.3.min.js"></script>-->
    <!--    <script src="/notes-v2/vendor/twbs/bootstrap/js/dist/"></script>-->

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<!--  MSNotes must redirect to landing page  -->
    <a class="navbar-brand" href="#">MSNotes</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?=baseUrl()?>/page/home">Home <span class="sr-only">(current)</span></a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="#">Link</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link disabled" href="#">Disabled</a>-->
<!--            </li>-->
        </ul>
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->
    </div>
</nav>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img style="height: 1.5in; width: 1.5in" class="profile-image" src="<?=baseUrl()?>/image/empty-profile-128.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="<?=baseUrl()?>/user/login" method="post">
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="<?=_ph_email?>" >
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="<?=_ph_password?>">
            <input type="submit" class="fadeIn fourth btn btn-primary" value="<?=_btn_login?>">
        </form>
        <a style="text-decoration: none; margin-bottom:15px " href="<?=baseUrl()?>/user/adminLogin" role="button" class="btn btn-outline-dark"> Admin </a>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a href="<?=baseUrl()?>/user/register" class="btn btn-outline-dark"><?=_btn_signup?></a>
            <a style="text-decoration: none" class="underlineHover" href="#">Forgot Password?</a>

        </div>

    </div>
</div>
</body>
</html>