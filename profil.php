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