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
    <title>Admin Login</title>
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

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <div>
            <span>
                <h4 style="background-color: #333333; color: #dce8f1"> Hello Dear Admin</h4>
            </span>
        </div>

        <!-- Login Form -->
        <form action="<?=baseUrl()?>/user/adminLogin" method="post">
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="<?=_ph_email?>" >
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="<?=_ph_password?>">
            <input type="submit" class="fadeIn fourth btn btn-dark" value="<?=_btn_login?>">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a style="text-decoration: none" class="underlineHover" href="#">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="text-decoration: none" class="underlineHover" href="<?=baseUrl()?>/user/login">Back to user login</a>

        </div>

    </div>
</div>
</body>
</html>