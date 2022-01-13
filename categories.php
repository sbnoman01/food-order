<?php require_once('partials-front/header.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            
            <?php
        // sql query to desplay the category
        $sql_get_cat = "SELECT * FROM noman_test WHERE cat_active='Yes' AND cat_featured = 'Yes'";
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

<?php require_once('partials-front/footer.php'); ?>