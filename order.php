<?php require_once('partials-front/header.php'); 

if(!isset($_GET['id'])){
    linkto('index.php');
}
else{
    $id = $_GET['id'];
    // check in db
    $sql_check_value = "SELECT * FROM tbl_food WHERE f_id = '$id'";
    $query_sql_check_value = mysqli_query($conn, $sql_check_value);
    // check the row in db according to the id
    $count_row = mysqli_num_rows($query_sql_check_value);
    if($count_row != 1){
        linkto('index.php');
    }
    else{
        $order_food = mysqli_fetch_assoc($query_sql_check_value);
        $name = $order_food['f_name'];
        $price = $order_food['f_price'];
        $img = $order_food['f_image_name'];
    }
}

?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="media-file/food/<?= $img; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        <input type="hidden" name="food-img" value="<?= $img ?>">

                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?= $name ?></h3>
                        <input type="hidden" name="food-name" value="<?= $name ?>">
                        <p class="food-price">$<?= $price ?></p>
                        <input type="hidden" name="food-price" value="<?= $price ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="c_contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="c_email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="c_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="order-food" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php
                if(isset($_POST['order-food'])){
                    // get food details
                        $f_name = $_POST['food-name'];
                        $f_price = $_POST['food-price'];
                        $quantity = $_POST['qty'];
                        $total_price = $f_price * $quantity;
                        $img = $_POST['food-img'];
                        $status = "Ordered";
                        $order_date = date("y-m-d h:1:sa");
                    // get customer details
                        $c_name = $_POST['full-name'];
                        $c_contact = $_POST['c_contact'];
                        $c_email = $_POST['c_email'];
                        $c_address = $_POST['c_address'];
                    // insurt data to dabase
                        $sql_confirm_order = "INSERT INTO tbl_order SET
                            food = '$f_name',
                            price = '$f_price',
                            qty = '$quantity',
                            total = '$total_price',
                            order_date = '$order_date',
                            status = '$status',
                            customer_name = '$c_name',
                            customer_contact = '$c_contact',
                            customer_email = '$c_email',
                            customer_address = '$c_address',
                            order_f_image = '$img'
                        ";
                        $query_sql_confirm_order = mysqli_query($conn, $sql_confirm_order);
                        if($query_sql_confirm_order == true){
                            echo "success to order";
                            
                        }
                        else {
                            echo mysqli_error($conn);
                        }
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
<?php require_once('partials-front/footer.php'); ?>