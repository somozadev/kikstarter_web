<?php include_once('header.php') ?>
<?php unset($_SESSION['donated_proyect_to']) ?>
<?php if (isset($_POST["cars"])) {
  include_once('cars.php');
} else if (isset($_POST["motorbikes"])) {
  include_once('motorbikes.php');
} else if (isset($_POST["drons"])) {
  include_once('drons.php');
} ?>

<?php include_once('footer.php') ?>