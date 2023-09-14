<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="clothes-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>clothes-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for clothes.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="clothes-menu">
        <div class="container">
            <h2 class="text-center">Clothes Menu</h2>
            <?php 
            //Display Foods that Are  Active
            $sql = "SELECT * FROM tbl_clothes WHERE active='Yes'";

            //Execute the query$res=
            $res=mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Check whther the clothes are available or not
            if($count>0)
            {
                //Clothes Available
                while($row=mysqli_fetch_assoc($res))
                {
                    //Get the value
                    $id = $row['id'];
                    $title=$row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name =$row['image_name'];
                    ?>

                <div class="clothes-menu-box">
                <div class="clothes-menu-img">
                <?php 
                //Check whether the image is available or not
                if($image_name=="")
                {
                    //Image Not available
                    echo "<div class='error'>Image Not Available</div>";
                }
                else
                {
                    ?>
                      <img src="<?php echo SITEURL;?>images/clothes/<?php echo $image_name  ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                }
                
                ?>
                    
                </div>

                <div class="clothes-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="clothes-price">$<?php echo $price ?></p>
                    <p class="clothes-detail">
                    <?php echo $description ?>
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
                echo "<div class='error'>Clothes Not Found.</div>";
            }
            
            
            ?>

           

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>