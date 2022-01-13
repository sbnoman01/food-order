<?php require_once('partials-front/header.php'); ?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="GET">
            <input type="search" name="search-food" placeholder="Search for Food.." required>
            <input type="submit" name="submit-search" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
            // sql to gether food info
            $sql_get_food = "SELECT * FROM tbl_food WHERE f_active='Yes'";
            $query_sql_get_food = mysqli_query($conn, $sql_get_food);
            
            // check the dat is available on the database
            $row_food = mysqli_num_rows($query_sql_get_food);

            if($row_food > 0){
                while($food = mysqli_fetch_assoc($query_sql_get_food)){
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
                    <?php
                }
            }
            else{
                echo " We don't have any food yet...!";
            }
        ?>

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->
<?php require_once('partials-front/footer.php'); ?>