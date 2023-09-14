
<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="clothes-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>clothes-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Clothes.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    
    <?php 
    
    if(isset($_SESSION['order']))
              {

                  echo $_SESSION['order'];
                  unset($_SESSION['order']);

              }
    
    ?>
            
    

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Clothes</h2>

            

            <?php
            //Create Sql Query to display Categories from datapase
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //Execute The Query
            $res = mysqli_query($conn, $sql);
            //Count Rows to Check Whether the Category is Available
            $count = mysqli_num_rows($res);
            if($count>0)
            {
               //Categories Available
               while($row=mysqli_fetch_assoc($res))
               {
                //Get the values Like title ,Image_name
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
            <a href="<?php echo SITEURL; ?>category-clothes.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">

            <?php 
            //Check whwther the image is available or not
            if ($image_name=="")
            {
                //Display Message
                echo "<div class='error'>image not available.</div>";
            }
            else
            {
                //Image Available
                ?>
              <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Shirt" class="img-responsive img-curve">
                <?php
            }
            
            ?>
               <br><br><br><br><br>
               <h3 class="float-text text-white"><?php echo $title;?></h3>
                
            </div>
           

            
            </a>
            

                <?php
               }
            }
            else{
                //Categories Not Available
                echo "<div class='error'>Category Not Added.</div>";
            }
            
            ?>

           
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="clothes-menu">
        <div class="container">
            <h2 class="text-center">Clothes Menu</h2>
            <?php 
            //getting Clothes From database
            //Sql Query
            $sql2 = "SELECT * FROM tbl_clothes WHERE active='YES' AND featured='YES' LIMIT 6";
            //Execute the query
            $res2 = mysqli_query($conn, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
            //Check Whwther Clothes Available Or not
            if($count2>0)
            {
               //Clothes Available
               while($row=mysqli_fetch_assoc($res2))
               {
                //Get All the values
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>
                 <div class="clothes-menu-box">
                <div class="clothes-menu-img">
                <?php 
                //Check Whether The image is available or not
                if ($image_name=="")
                {
                    //Image not available 
                    echo "<div class='error'>Image not available.</div>";
                }
                else
                {

                    //Image Available
                    ?>
                    <img src="<?php SITEURL; ?>images/clothes/<?php echo $image_name;?>" alt="Shirt" class="img-responsive img-curve">

                    <?php
                }
                ?>
                    
                </div>

                <div class="clothes-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="clothes-price">$<?php echo $price;?></p>
                    <p class="clothes-detail">
                    <?php echo $description;?>
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
              //Clothes not Available
              echo "<div class='error'>Clothes not Available.</div>";
         
            }
            
            ?>

           

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Clothes</a>
        </p>
    </section>
    <!-- Clothes Menu Section Ends Here -->

    <?php include('partials-front\footer.php');?>

   