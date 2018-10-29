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
    <div class="row mt-3 justify-content-center text-center border border-dark bg-secondary text-white">
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
          <a class="col-md-2 col-12 py-5 m-5 bg-info" href="task_list_project.php?index=<?php echo $key+1; ?>">
            <div>
              <p class="text-white text-center"><?php echo $value['name_list']; ?></p><br />
              <p class="text-white text-center"><?php echo $value['deadline_list']; ?></p>
              <!--  foreach for display tasks-->
              <?php foreach ($data as $value) { ?>
                <?php if (is_null($value['done'])){ ?>
                  <ul class="text-dark">
                    <li><?php echo $value['name_task']; ?></li>
                  </ul>
                <?php }else{ ?>
                  <ul class="text-danger">
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
        <input type="text" name="name_list" placeholder="Nom de la liste">
        <input type="date" name="deadline">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </div>
</section>
