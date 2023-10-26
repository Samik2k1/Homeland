<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php

    if(!isset($_SESSION['username'])){
        echo "<script>window.location.href='".APPURL."'</script>";
    }
    if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

    $selectprop = $conn->query("SELECT * FROM props, favs where props.id=favs.prop_id and favs.user_id='$user_id'");
    $selectprop->execute();
    $props=$selectprop->fetchAll(PDO::FETCH_OBJ);
    //var_dump($props);
    }else{
        echo "<script>window.location.href='".APPURL."/404.php'</script>";
      }


?>


<div class="site-wrap">


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo APPURL; ?>/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
            <h1 class="mb-2">Your favourites</h1>
        </div>
        </div>
    </div>
    </div>
</div>

<?php if(count($props) > 0) :?>
    <div class="site-section site-section-sm bg-light">
        <div class="container">
        
            <div class="row mb-5">
            <?php foreach($props as $prop) :?>

            <div class="col-md-6 col-lg-4 mb-4 mt-4">
                <div class="property-entry h-100">
                <a href="../property-details.php?id=<?php echo $prop->prop_id; ?>" class="property-thumbnail">
                    <div class="offer-type-wrap">
                    <span class="offer-type bg-<?php echo ($prop->type == 'rent')?"success":"danger"; ?>"><?php echo $prop->type;?></span>
                    </div>
                    <img src="../images/<?php echo $prop->image; ?>" alt="Image" class="img-fluid">
                </a>
                <div class="p-4 property-body">
                    <h2 class="property-title"><a href="../property-details.php?id=<?php echo $prop->prop_id; ?>"><?php echo $prop->name; ?></a></h2>
                    <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> <?php echo $prop->location; ?></span>
                    <strong class="property-price text-primary mb-3 d-block text-success"><?php echo $prop->price; ?></strong>
                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                    <li>
                        <span class="property-specs">Beds</span>
                        <span class="property-specs-number"><?php echo $prop->beds; ?></span>
                        
                    </li>
                    <li>
                        <span class="property-specs">Baths</span>
                        <span class="property-specs-number"><?php echo $prop->baths; ?></span>
                        
                    </li>
                    <li>
                        <span class="property-specs">SQ FT</span>
                        <span class="property-specs-number"><?php echo $prop->sqft; ?></span>
                        
                    </li>
                    </ul>

                </div>
                </div>
            </div>

            <?php endforeach;?>
            </div>
        
            
        </div>
    </div>
<?php else : ?>
    <div class="text-black mt-3 mb-3">You have not added any properties to your favourites yet</div>
<?php endif; ?>


<?php require "../includes/footer.php"; ?>