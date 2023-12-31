<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>
<?php 
//Check whether the food id is set or not
if(isset($_GET['clothes_id']))
{
    //Get the food id and details of the selected food
    $clothes_id = $_GET['clothes_id'];
    //Get the details of the selected food
    $sql = "SELECT * FROM tbl_clothes WHERE id=$clothes_id";
    //Execute the query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //Check Whether the data is available or not
    if($count==1)
    {
      //We have Data 
      //Get the data from database
      $row = mysqli_fetch_assoc($res);
      $title = $row['title'];
      $price = $row['price'];
      $image_name = $row['image_name'] ;
    }
    else
    {
     //Clothes not Available
     //Redirrect to homepage
     header('location:'.SITEURL);
    }
}
else
{
    //Redirrect to Home page
    header('location:'.SITEURL);
}

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="clothes-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
            <fieldset>
                    <legend>Selected Clothes</legend>
     <div class="clothes-menu-img">
                        <?php
                        //Check whether thge image is available or not
                        if($image_name=="")
                        {
                            //Image not Available
                            echo "<div class='error'>Image not Available</div>";
                        }
                        else
                        {
                            //Image is available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name ?>" alt="Shirts" class="img-responsive img-curve">

                            <?php
                        }
                        
                        
                        ?>
                        
                    </div>
    
                    <div class="clothes-menu-desc">
                        <h3><?php echo $title; ?></h3>

                        <input type="hidden" name="clothes" value="<?php echo $title; ?>">
                        <p class="food-price">$<?php echo $price; ?></p>
                        
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
               
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Avishka wijerathne" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g.077*******" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. avishkavipulsara@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    
                    <input  type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                    
                    
                   

                </fieldset>

            </form>

            <?php 
            //Check Whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the details from the foarm
                $clothes = $_POST['clothes'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty; //total = price * Qty
                $order_date = date("y-m-d h:i:sa");//Order Date

                $status = "Ordered"; //Ordered, On delivery, Cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //Save the order in database
                //Create Sql to save the database
                $sql2 ="INSERT INTO tbl_order SET
                clothes = '$clothes',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address ='$customer_address'
                ";
                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                //Check Whether query executed successfully or not
                if($res2==true)
                {
                    echo "Order Details Submitted";

                }
                else
                {
                    echo "Order Details Are Not Submitted";

                }

            }
            
            ?>
           

        </div>
    </section>
    <!-- Clothes SEARCH Section Ends Here -->








   