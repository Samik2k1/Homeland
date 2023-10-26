<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php
  if (!isset($_SESSION['admin_name'])){
      echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
  }

  $props = $conn->query('SELECT COUNT(*) AS num_props FROM props');
  $props->execute();
  $allprops = $props->fetch(PDO::FETCH_OBJ);

  $categories = $conn->query('SELECT COUNT(*) AS num_categories FROM categories');
  $categories->execute();
  $allcategories = $categories->fetch(PDO::FETCH_OBJ);

  $admins = $conn->query('SELECT COUNT(*) AS num_admins FROM admins');
  $admins->execute();
  $alladmins = $admins->fetch(PDO::FETCH_OBJ);

?>
            
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Properties</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of properties: <?php echo $allprops->num_props; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $allcategories->num_categories; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $alladmins->num_admins; ?></p>
              
            </div>
          </div>
        </div>
      
<?php require "layouts/footer.php"; ?>