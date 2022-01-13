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

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        // sql query to desplay the category
        $sql_get_cat = "SELECT * FROM noman_test WHERE cat_active='Yes' AND cat_featured = 'Yes' LIMIT 3";
        $query_sql_get_cat = mysqli_query($conn, $sql_get_cat);
        $count_row_cat = mysqli_num_rows($query_sql_get_cat);

        // check if the cat available or not
        if($count_row_cat > 0){ 
            //  gether info
            
            while($cat = mysqli_fetch_assoc($query_sql_get_cat)){
                $cat_name = $cat['cat_name'];
                $cat_img = $cat['cat_image'];
                $cat_id = $cat['id'];
            ?>
                <a href="category-foods.php?cat-id=<?= $cat_id ?>&cat-name=<?= $cat_name; ?>">
                    <div class="box-3 float-container">
                        <img src="<?= 'media-file/category/'. $cat_img; ?>" alt="Pizza" class="img-responsive img-curve">
                        <h3 class="float-text text-white"><?= $cat_name ?></h3>
                    </div>
                </a>
        <?php }
        }
        else{
            echo "Category is not available!!!";
        }
        ?>
        

    

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
            // sql to gether food info
            $sql_get_food = "SELECT * FROM tbl_food WHERE f_featured='Yes' AND f_active='Yes' LIMIT 2";
            $query_sql_get_food = mysqli_query($conn, $sql_get_food);
            
            // check the dat is available on the database
            $row_food = mysqli_num_rows($query_sql_get_food);

            if($row_food > 0){
                while($food = mysqli_fetch_assoc($query_sql_get_food)){
                    $f_name = $food['f_name'];
                    $f_price = $food['f_price'];
                    $f_desc = $food['f_description'];
                    $f_img = $food['f_image_name'];
                    $f_id = $food['f_id'];

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

                            <a href="<?= SITEURL ?>order.php?id=<?= $f_id ?>" class="btn btn-primary">Order Now</a>
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

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php require('partials-front/footer.php'); ?>