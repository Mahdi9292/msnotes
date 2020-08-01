<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=baseUrl()?>/css/base.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?=baseUrl()?>/css/base2.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?=baseUrl()?>/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <script type="text/javascript" src="<?=baseUrl()?>/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?=baseUrl()?>/js/common.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }

    </style>
</head>


<body>

<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <a class="navbar-brand" href="#">MSNotes</a>-->
<!---->
<!--    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">-->
<!---->
<!--        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">-->
<!---->
<!--            <li class="nav-item active">-->
<!--                <span class="nav-link" href="#">Home </span>-->
<!--            </li>-->
<!---->
<!--        </ul>-->
<!--</nav>-->
<!--<div id="header-wrapper">-->
<!--    <div id="header"></div>-->
<!--</div>-->
<div><?=$content?></div>
</body>
</html>
