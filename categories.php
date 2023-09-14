

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

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Clothes</h2>

            <?php 
            
           //Display all the categories that are active
           //sql query
           $sql = "SELECT * FROM tbl_category WHERE active='yes'";
           //Execute the query
           $res = mysqli_query($conn, $sql);
           //Count Rows
           $count = mysqli_num_rows($res);
           //Check Whether Categories Available or not
           if($count>0)
           {
            //Categories Available
            while($row=mysqli_fetch_assoc($res))
            {
                //Get The values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>
                 <a href="<?php echo SITEURL; ?>category-clothes.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php 
                if($image_name=="")
                {
                    //image not available
                    echo "<div class='error'>Image not found.</div>";
                }
                else
                {
                    //image Available
                   ?> 
                   <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                   <?php
                }
                
                ?>
                
                  <br><br><br><br><br>
                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                <?php
            }
           }
           else
           {
            //Categories not available
            echo "<div class='error'> Category not found.</div>";
           }
            
            ?>

           


            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front\footer.php');?>sssss