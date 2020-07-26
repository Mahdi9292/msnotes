<?
if (isset($_SESSION['email'])){
  $message = _already_logged_in . ' ' . $_SESSION['email'];
  // require_once('msg-success.php');
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
    <title>Document</title>
    <link href="/notes-v2//css/base2.css" rel="stylesheet">
    <link href="/notes-v2//vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="/notes-v2//vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--    <script src="/notes-v2//vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>-->
    <!--    <script type="text/javascript" src="/notes-v2/js/jquery-1.11.3.min.js"></script>-->

    <!--    <script src="/notes-v2//vendor/twbs/bootstrap/js/dist/"></script>-->
</head>
<body>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="<?=baseUrl()?>/user/login" method="post">
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="<?=_ph_email?>" >
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="<?=_ph_password?>">
            <input type="submit" class="fadeIn fourth" value="<?=_btn_login?>">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
            <a href="<?=baseUrl()?>/user/register" class="link-gray"><?=_btn_signup?></a>
        </div>

    </div>
</div>
</body>
</html>