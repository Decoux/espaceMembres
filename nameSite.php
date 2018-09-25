<?php session_start(); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>

  <form class="col-4 mx-auto border border-dark p-5 d-flex flex-column" action="deconnexion_post.php" method="post">
    <h1 class="mx-auto">Connecté</h1>
    <button type='submit' class='col-6 mx-auto mt-5 btn btn-success'>deconnexion</button>
  </form>
  <div class="col-4 mt-5 mx-auto">
    <p class="text-center"><strong>Information sur le profil</strong></p>
    <p><strong>pseudo : </strong> <?php echo $_SESSION['pseudo']; ?></p>
    <p><strong>email : </strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>inscription : </strong>  <?php echo $_SESSION['inscription']; ?></p>
    <div class="size-img d-flex">
      <p><strong>Avatar:</strong> </p><img class="ml-2" src="img/<?php echo $_SESSION['avatar']; ?>">
    </div>
  </div>
  <form class="col-4 mt-5 mx-auto d-flex" action="update.php" method="post">
    <input class="" type="text" name="update_pseudo" value="">
    <button type="submit" class="btn btn-info ml-5">Changer de pseudo</button>
  </form>
  <form class="col-4 mt-3 mx-auto d-flex mb-5" action="update.php" method="post">
    <input class="" type="text" name="update_mail" value="">
    <button type="submit" class="btn btn-info ml-5">Changer d'adresse mail</button>
  </form>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
