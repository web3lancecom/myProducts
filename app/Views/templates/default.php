<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">

    <title>Listing productts</title>
    <!-- Bootstrap core CSS -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="public/assets/css/style.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <?php if (isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">myProducts</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="logout.html">
          <input type="hidden" name="submit" value="1">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Déconnexion</button>
        </form>
      </div>
    </nav>
    <?php endif ?>
    <?=$content ?>
    <script src="public/assets/js/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="public/assets/js/popper.min.js" crossorigin="anonymous"></script>
    <script src="public/assets/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="public/assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="public/assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="public/assets/js/custom.js" crossorigin="anonymous"></script>
</body>
</html>