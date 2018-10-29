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
          
          <div  class="col-md-2 col-12 py-5 m-5 bg-success">
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
        <input type="text" name="name_task" placeholder="Nom de la tache">
        <input type="date" name="deadline">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </form>
    </div>
  </div>
</section>
