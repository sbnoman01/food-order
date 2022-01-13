<?php require_once('partials-front/header.php'); 

if(isset($_GET['cat-id'])){
    // store the variable
    $cat_id = $_GET['cat-id'];

    // cehck the passed valu on db
    $sql_cehck_value = "SELECT * FROM tbl_food WHERE category_id = '$cat_id'";
    $query_sql_cehck_value = mysqli_query($conn, $sql_cehck_value);

    // check the number of row in db
    $num_rows = mysqli_num_rows($query_sql_cehck_value);
    if($num_rows == 1){ 

   }
}
else{
    linkto('index.php');
    die();
}

?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?= $_GET['cat-name']; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        <?php
           while($food = mysqli_fetch_assoc($query_sql_cehck_value)){
            $f_name = $food['f_name'];
            $f_price = $food['f_price'];
            $f_desc = $food['f_description'];
            $f_img = $food['f_image_name'];

            ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="media-file/food/<?= $f_img; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?= $f_name; ?></h4>
                    <p class="food-price">$<?= $f_price; ?></p>
                    <p class="food-detail">
                    <?= $f_desc; ?>
                    </p>
                    <br>

                    <a href="<?= SITEURL ?>order.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php } ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php require_once('partials-front/footer.php'); ?>