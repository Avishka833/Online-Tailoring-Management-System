<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>




<?php 
//Check Whether the id is passed or not
if(isset($_GET['category_id']))
{
    //Category id is set and get the id
    $category_id = $_GET['category_id'];
    //Get the category title based on category ID
    $sql = "SELECT title  FROM tbl_category WHERE id=$category_id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Get the value from Database
    $row = mysqli_fetch_assoc($res);

    //Get the title
    $category_title = $row['title'];
}
else
{
    //Category not passed
    //Redirrect to home page
    header('location:'.SITEURL);
}


?>
    <!-- Clothes sEARCH Section Starts Here -->
    <section class="clothes-search text-center">
        <div class="container">
            
            <h2>Clothes on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- Clothes sEARCH Section Ends Here -->



    <!-- Clothes MEnu Section Starts Here -->
    <section class="clothes-menu">
        <div class="container">
            <h2 class="text-center">Clothes Menu</h2>

            <?php 
            //Create SQL Query to Get clothes based on selected Category
            $sql2 = "SELECT * FROM tbl_clothes WHERE category_id=$category_id";
            //Execute the query
            $res2 = mysqli_query($conn,$sql2);
            //count The rows
            $count2 = mysqli_num_rows($res2);
            //Check Whether clothes is available or not
            if($count2>0)
            {
                //Clothes is available
                while($row2=mysqli_fetch_assoc($res2))
                {   $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                    <div class="clothes-menu-box">
                <div class="clothes-menu-img">
                    <?php 
                    if($image_name=="")
                    {
                        //Image Not available
                        echo "<div class='error'>Image Not Available</div>";
                    }
                    else
                    {
                        //Image Available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                        <?php
                    }
                    
                    ?>
                    
                </div>

                <div class="clothes-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="clothes-price">$<?php echo $price; ?></p>
                    <p class="clothes-detail">
                    <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?clothes_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                    <?php
        
                }
            }
            else
            {
                //Clothes not available
                echo "<div class='error'>Clothes Not Available</div>";
            }
            
            ?>

            

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- clothes Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>