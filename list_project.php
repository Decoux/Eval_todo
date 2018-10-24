<?php 
include 'include/header.php';
include 'selecte/lists.php';
$_SESSION['index'] = $_GET['index'];

?>

<section>
  <div class="container">
    <div class="row justify-content-center">
            <?php foreach ($data as $key => $value) { ?>
              <?php if ($data){ ?>
                
                <a class="col-2 py-5 m-5 bg-secondary" href="">
                  <div>
                    <p class="text-white text-center"><?php echo $value['name_list']; ?></p><br />
                    <p class="text-white text-center"><?php echo $value['deadline']; ?></p>
                  </div>
                </a>
            <?php } ?>
            <?php } ?>
      </div>
    </div>
  <div class="row"> 
    <form class="m-5 d-flex flex-column col-12 col-md-4 mx-auto" action="post/add_list.php" method="post">
      <input type="text" name="name_list" placeholder="Nom de la liste">
      <input type="date" name="deadline">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</section>