<?php require '../layouts/header.php'; ?>
<?php require "../../config/config.php"; ?>

<?php
  if (!isset($_SESSION['admin_name'])){
    echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
  }

  $props = $conn->query("SELECT * FROM props");
  $props->execute();
  $allprops = $props->fetchAll(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Properties</h5>
              <a href="<?php echo ADMINURL; ?>/properties-admins/create-properties.php" class="btn btn-primary mb-4 text-center float-right">Create Properties</a>

              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Home type</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allprops as $props) : ?>
                  <tr>
                    <th scope="row"><?php echo $props->id; ?></th>
                    <td><?php echo $props->name; ?></td>
                    <td><?php echo $props->price; ?></td>
                    <td><?php echo $props->home_type; ?></td>
                    <td><a href="<?php echo ADMINURL; ?>/properties-admins/delete-properties.php?id=<?php echo $props->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  <?php require '../layouts/footer.php'; ?>