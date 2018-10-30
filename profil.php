<?php session_start() ?>
<?php include 'include/header.php'; ?>
  <section>
    <div class="col-4 mt-5 mx-auto">
      <p class="text-center"><strong>Information sur le profil</strong></p>
      <p><strong>nom : </strong> <?php echo $_SESSION['name']; ?></p>
      <p><strong>prenom : </strong>  <?php echo $_SESSION['firstname']; ?></p>
      <p><strong>email : </strong> <?php echo $_SESSION['email']; ?></p>
    </div>
    <form class="col-4 mt-5 mx-auto d-flex" action="update.php" method="post">
      <input class="" type="text" name="update_pseudo" value="">
      <button type="submit" class="btn btn-info ml-5">Changer de pseudo</button>
    </form>
    <form class="col-4 mt-3 mx-auto d-flex mb-5" action="update.php" method="post">
      <input class="" type="text" name="update_mail" value="">
      <button type="submit" class="btn btn-info ml-5">Changer d'adresse mail</button>
    </form>
    <form class="col-4 mx-auto" action="post/deconnexion_post.php" method="post">
      <button type='submit' class='mx-auto btn btn-success'>deconnexion</button>
    </form>
  </section>
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
