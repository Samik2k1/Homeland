<?php require "../includes/header.php";?>
<?php require "../config/config.php";?>

<?php

    if(isset($_POST['submit'])){
        if(empty($_POST['email']) OR empty($_POST['email']) OR empty($_POST['phone'])){
            echo "<script>alert('Please Enter Data in all the Fields')</script>";
            $prop_id = $_POST['prop_id'];
            echo "<script>window.location.href='".APPURL."/property-details.php?id=".$prop_id."'</script>";
    } else {
            //if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $prop_id = $_POST['prop_id'];
                $user_id = $_POST['user_id'];
                $admin_name = $_POST['admin_name'];

                $insert = $conn->prepare("INSERT INTO requests(name, email, phone, prop_id, user_id, admin_name) VALUES(:name, :email, :phone, :prop_id, :user_id, :admin_name)");
                $insert->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':prop_id' => $prop_id,
                    ':user_id' => $user_id,
                    ':admin_name' => $admin_name
                ]);
                echo "<script>alert('Request sent successfully')</script>";

                echo "<script>window.location.href='".APPURL."/property-details.php?id=".$prop_id."'</script>";
            }
        }

