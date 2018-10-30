<?php
include 'include/header.php';
include 'selecte/tasks.php';
include 'selecte/lists.php';
$_SESSION['index_list']=$_GET['index'];
?>

<section>
  <div class="container">
    <h1 class="text-center">Taches</h1>
    <div class="row justify-content-center">
      <!-- foreach for display task info -->
      <?php foreach ($data_task as $key => $value) { ?>
        <!-- If variable data_task is not null -> go -->
        <?php if ($data_task) { ?>
          
          <div  class="col-md-2 col-12 py-5 m-5 border-card bg-success rounded-top">
            <p class="text-white text-center"><?php echo $value['name_task']; ?></p><br />
            <p class="text-white text-center"><?php echo $value['deadline']; ?></p>
            <form class="" action="update_task.php?index=<?php echo $key + 1; ?>" method="post">
              <div class="row justify-content-center">
                <input type="checkbox" id="done" name="done" value="done">
              </div>
              <div class="row mt-4 justify-content-center">
                <button type="submit" class="btn btn-primary">Mettre a jour</button>
              </div>
            </form>
            <p class="mt-4 text-white text-center font-weight-bold"><?php echo $data_task[$key]['done']; ?></p>
            <div class="row mt-4 justify-content-center">
              <form action="delete/delete_task.php?index=<?php echo $key + 1; ?>" method="post">
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </div>
          </div>

        <?php } ?>
      <?php } ?>


    </div>
    <div class="row">
      <!-- form for add task-->
      <form class="m-5 d-flex flex-column col-12 col-md-4 mx-auto" action="post/add_task.php" method="post">
        <input type="text" name="name_task" placeholder="Nom de la tache" required>
        <input type="date" name="deadline" required>
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

