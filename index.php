<?php
include 'include/header.php';
include 'selecte/projects.php';
?>
<section>
  <div class="container">
    <h1 class="text-center">Projets</h1>
    <div class="row justify-content-center">
      <!-- display projects -->
      <?php foreach ($data_project as $key => $value) { ?>
        <a class="col-md-2 col-12 py-5 m-5 bg-secondary border-card rounded-top" href="list_project.php?index=<?php echo $key+1; ?>">
          <div>
            <p class="text-white text-center"><?php echo $value['name_project']; ?></p><br />
            <p class="text-white text-center"><?php echo $value['description_project']; ?></p><br />
            <p class="text-white text-center"><?php echo $value['deadline']; ?></p><br />
          </div>
          <div class="row mt-4 justify-content-center">
              <form action="delete/delete_project.php?index=<?php echo $key; ?>" method="post">
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </div>
        </a>
      <?php } ?>
    </div>
    <!-- Form add projects-->
    <div class="row">
      <form class="m-5 d-flex flex-column col-12 col-md-4 mx-auto" action="post/add_projects.php" method="post">
        <input type="text" name="name_project" placeholder="Nom du projet" required>
        <textarea name="description_project" placeholder="Description du projet" cols="30" rows="10" required></textarea>
        <input type="date" name="deadline" required>
        <select name="categorie" multiple>
          <option value="JS">JS</option>
          <option value="php">php</option>
          <option value="html">html</option>
          <option value="css">css</option>
        </select>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </div>
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
