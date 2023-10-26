<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if(isset($_SESSION['admin_name'])){
  echo "<script>window.location.href='".ADMINURL."'</script>";
}

if(isset($_POST['submit'])){
  if(empty($_POST['email']) OR empty($_POST['password'])){
    echo "<script>alert('Please Enter Data in all the Fields')</script>";
} else {
  //$username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  //query
  $login = $conn->query("SELECT * FROM admins where email='$email'");
  $login->execute();

  //fetch
  $fetch = $login->fetch(PDO::FETCH_ASSOC); //fetches row as an associative array

  if($login->rowCount() > 0){
    // echo $login->rowCount();
    // echo "Email is valid";

    //validate password
    if(password_verify($password, $fetch['mypassword'])){

      $_SESSION['admin_name']=$fetch['admin_name'];
      $_SESSION['email']=$fetch['email'];
      $_SESSION['admin_id']=$fetch['id'];

      echo "<script>alert('Logged In')</script>";

      //header("location: ".APPURL."");
      echo "<script>window.location.href='".ADMINURL."'</script>";

    }
    else{
      echo "<script>alert('Wrong Password, try again')</script>";
    }
    }
   else{
    echo "<script>alert('Wrong Email Address')</script>";;
    }
  }
}

?>

          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mt-5">Login</h5>
                  <form method="POST" class="p-auto" action="login-admins.php">
                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                      
                      </div>

                      
                      <!-- Password input -->
                      <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                        
                      </div>



                      <!-- Submit button -->
                      <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                    
                    </form>

                </div>
          </div>
<?php require "../layouts/footer.php"; ?>