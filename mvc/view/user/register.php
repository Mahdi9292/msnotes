
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
<div class="wrapper">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img style="height: 1.5in; width: 1.5in" class="profile-image" src="<?=baseUrl()?>/image/empty-profile-128.png" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form action="<?=baseUrl()?>/user/register" method="post">
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="<?=_ph_email?>"" >
            <input type="password" id="password1" class="fadeIn second" name="password1" placeholder="<?=_ph_password?>">
            <input type="password" id="password2" class="fadeIn second" name="password2" placeholder="<?=_ph_confirm_password?>">
            <input type="text" id="name" class="fadeIn third" name="name" placeholder="<?=_ph_name?>"" >
            <input type="text" id="nickname" class="fadeIn third" name="nickname" placeholder="<?=_ph_nickname?>"" >

            <input type="submit" class="fadeIn fourth btn btn-primary" value="<?=_btn_register?>">
        </form>
        <div id="formFooter" class="fadeIn fourth">
            <a style="text-decoration: none" class="underlineHover" href="/notes-v2/user/login">login</a>

        </div>
    </div>

</div>