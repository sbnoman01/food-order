<?php require_once('partials-front/header.php'); 

if(!isset($_GET['submit-search']) && !isset($_GET['search-food'])){
    linkto('index.php');
}
else{
    $search = $_GET['search-food'];
}

?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?= $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // sql to search the value into database
                $sql_search_ = "SELECT * FROM tbl_food WHERE f_name LIKE '%$search%' OR f_description LIKE '%$search%'";
                $query_sql_search_ = mysqli_query($conn, $sql_search_);

                // count the rows 
                $rows_search = mysqli_num_rows($query_sql_search_);
                if($rows_search > 0){
                    
                    while($food = mysqli_fetch_assoc($query_sql_search_)){
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

            <?php }
                }
                else{
                    echo "<h4>Sorry We don't have any data to show...!</h4>";
                    echo mysqli_error($conn);
                }
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php require_once('partials-front/footer.php'); ?>