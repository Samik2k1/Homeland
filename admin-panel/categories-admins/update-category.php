<?php require '../layouts/header.php'; ?>
<?php require "../../config/config.php"; ?>

<?php
  if (!isset($_SESSION['admin_name'])){
    echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
  }

  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $category = $conn->query("SELECT * FROM categories WHERE  id='$id'");
    $category->execute();
    $allcategories = $category->fetch(PDO::FETCH_OBJ);
  }

  if(isset($_POST['submit'])){
      if(empty($_POST['name'])){
        echo "<script>alert('Please Enter Data in all the Fields')</script>";
    } else {
      $name = $_POST['name'];

      $update = $conn->prepare("UPDATE categories SET name='$name' WHERE id='$id' ");
      $update->execute();

      //header("location: login.php");
      echo "<script>window.location.href='".ADMINURL."/categories-admins/show-categories.php'</script>";
    }
  }

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?id=<?php echo $allcategories->id; ?>">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" value="<?php echo $allcategories->name; ?>" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>


<?php require '../layouts/footer.php'; ?>