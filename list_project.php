<?php
include 'include/header.php';
include 'selecte/lists.php';
include 'selecte/projects.php';
include 'selecte/tasks.php';
$_SESSION['index_project'] = intval($_GET['index']);
?>

<section>
  <div class="container">
    <!-- Display info for projects-->
    <div class="font-weight-bold row mt-3 justify-content-center text-center border broder-dark bg-secondary text-white">
      <?php echo $data_project[$_SESSION['index_project'] - 1]['name_project']; ?><br />
      <?php echo $data_project[$_SESSION['index_project'] - 1]['description_project']; ?><br />
      <?php echo $data_project[$_SESSION['index_project'] - 1]['deadline']; ?>
    </div>
    <h1 class="text-center">Liste</h1>
    <div class="row justify-content-center">
      <!-- foreach for display list -->
      <?php foreach ($data_list as $key => $value) { ?>
        <!--if list is not null -> go -->
        <?php if ($data_list){
          //add tasks (data_1 in folder tasks.php)
          $req = $bdd->prepare('SELECT * FROM tasks WHERE lists_id = :lists_id');
          $req->execute(array(
            'lists_id' => $data_1[$key]['id']
          ));
          $data = $req->fetchAll(); ?>
          <!-- link for view tasks info-->
          <a class="col-md-2 col-12 py-5 m-5 bg-info border-card rounded-top" href="task_list_project.php?index=<?php echo $key+1; ?>">
            <div>
              <p class="text-white text-center"><?php echo $value['name_list']; ?></p><br />
              <p class="text-white text-center"><?php echo $value['deadline_list']; ?></p>
              <!--  foreach for display tasks-->
              <?php foreach ($data as $value) { ?>
                <?php if (is_null($value['done'])){ ?>
                  <ul class="text-dark font-weight-bold">
                    <li><?php echo $value['name_task']; ?></li>
                  </ul>
                <?php }else{ ?>
                  <ul class="closed text-danger font-weight-bold">
                    <li><?php echo $value['name_task']; ?></li>
                  </ul>
                <?php } ?>
              <?php } ?>
              <div class="row mt-4 justify-content-center">
              <form action="delete/delete_list.php?index=<?php echo $key; ?>" method="post">
                <button type="submit" class="btn btn-danger">Supprimer</button>
              </form>
            </div>
            </div>
          </a>
        <?php } ?>
      <?php } ?>
    </div>

    <div class="row">
      <form class="m-5 d-flex flex-column col-12 col-md-4 mx-auto" action="post/add_list.php" method="post">
        <input type="text" name="name_list" placeholder="Nom de la liste" required>
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

