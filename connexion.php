<?php 
include 'include/header.php';
?>
  <section>
    <form class="mt-5 form-connect col-12 col-md-4 border border-dark p-5 d-flex flex-column" action="post/connexion_post.php" method="post">
        <p class="mx-auto">Formulaire de connexion</p>
        <input type="text" name="email" placeholder="Entrez votre email">
        <input type="password" name="pass" placeholder="Entrez votre mot de passe">
        <div class="mt-2">
        <label for="">connexion automatique</label>
        <input type="checkbox" name="connexion_auto">
        </div>
        <button type="submit" class="col-6 mx-auto mt-5 btn btn-success">envoyer</button>
    </form>
    <form class="col-12 col-md-4 position-btn p-5 d-flex flex-column" action="add_user.php" method="post">
        <button type="submit" class="col-6 mx-auto btn btn-success">s'inscrire</button>
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