<?php 
include 'include/header.php';
include 'selecte/tasks.php';
$_SESSION['index_list']=$_GET['index'];
?>

<section>
  <div class="container">
          <h1 class="text-center">Taches</h1>

    <div class="row justify-content-center">
            <?php foreach ($data as $key => $value) { ?>
              <?php if ($data) { ?>
              
                  <div  class="col-2 py-5 m-5 bg-danger">
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
                    <p class="mt-4 text-white text-center font-weight-bold"><?php echo $data[$key]['done']; ?></p>

                  </div>

                 <?php } ?>
              <?php } ?>
            
      
      </div>
  <div class="row"> 
    <form class="m-5 d-flex flex-column col-12 col-md-4 mx-auto" action="post/add_task.php" method="post">
      <input type="text" name="name_task" placeholder="Nom de la tache">
      <input type="date" name="deadline">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
  </div>
</section>
