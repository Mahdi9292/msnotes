
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
<div id="content">
  <div class= "row">
 <br><br>
 <br><br>

    <form action = "<?=baseUrl()?>/note/submit" method = "post">
      <input type = "text" placeholder = "Title" name= "title" style="width:300px; font-size:14px"><br>
      <br>
      <textarea type = "text" placeholder ="Description" name="description" style="width:300px; height:150px; font-size:14px"></textarea><br>
      <br>
      <button type= "submit" class= "btn-blue" style="padding: 5px 20px; font-size:14px">Submit</button>&nbsp;&nbsp;
        <a href="/notes-v2/page/home " class="btn btn-dark btn-sm"> Return </a>
    </form>


    <br>
  </div>


</div>
