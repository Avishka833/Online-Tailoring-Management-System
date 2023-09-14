<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="clothes-search text-center">
        <div class="container">
        <?php
             //Get the search Keyword
             $search = $_POST['search'];
            
            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="clothes-menu">
        <div class="container">
            
            <h2 class="text-center">Food Menu</h2>

            <?php 
           
            //Sql Query to get foods based on search keyword
            $sql ="SELECT * FROM tbl_clothes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check Whether food available or not
            if($count>0)
            {
               //Clothes Available
               while($row=mysqli_fetch_assoc($res))
               {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

                ?>
                <div class="clothes-menu-box">
                <div class="clothes-menu-img">
                    <?php 
                    //Check whether the image name is available or not
                    if($image_name=="")
                    {
                        //Image not available
                        echo "<div class ='error'>Image not available.</div>";
                        
                    }
                    else
                    {
                        //Image available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/clothes/<?php echo $image_name; ?>"alt="Chicke Hawain Pizza" class="img-responsive img-curve"> 

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

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

                <?php

               }
            }
            else
            {
                //Clothes Not Available
                echo "<div class='error'>Clothes Not Found </div>";

            }
            
            ?>

            

           
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>