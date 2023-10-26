<?php require '../layouts/header.php'; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['admin_name'])){
  echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
}

if(isset($_POST['submit'])){
  if(empty($_POST['admin_name']) OR empty($_POST['email']) OR empty($_POST['password'])){
    echo "<script>alert('Please Enter Data in all the Fields')</script>";
} else {
  $admin_name = $_POST['admin_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $insert = $conn->prepare("INSERT INTO admins(admin_name, email, mypassword) VALUES(:admin_name, :email, :mypassword)");
  $insert->execute([
    ':admin_name' => $admin_name,
    ':email' => $email,
    ':mypassword' => password_hash($password, PASSWORD_DEFAULT)
  ]);

  //header("location: login.php");
  echo "<script>window.location.href='".ADMINURL."/admins/admins.php'</script>";
  }
}

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="admin_name" id="form2Example1" class="form-control" placeholder="Admin Name" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
 
<?php require '../layouts/footer.php'; ?>