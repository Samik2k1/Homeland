<?php require '../layouts/header.php'; ?>
<?php require "../../config/config.php"; ?>

<?php
  if (!isset($_SESSION['admin_name'])){
    echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
  }

  $requests = $conn->query("SELECT * FROM requests WHERE admin_name='$_SESSION[admin_name]'");
  $requests->execute();
  $allrequests = $requests->fetchAll(PDO::FETCH_OBJ);

  ?>


          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Requests</h5>
            
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Go to this Property</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($allrequests) > 0) :?>
                  <?php foreach($allrequests as $request) : ?>
                  <tr>
                    <th scope="row"><?php echo $request->id; ?></th>
                    <td><?php echo $request->name; ?></td>
                    <td><?php echo $request->email; ?></td>
                    <td><?php echo $request->phone; ?></td>
                     <td><a href="http://localhost/homeland/property-details.php?id=<?php echo $request->prop_id; ?>" class="btn btn-success  text-center ">Go</a></td>
                  </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                      <div class="bg-success text-white">You do not have any new Requests.</div>
                    <?php endif; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require '../layouts/footer.php';?>