<?php include('partials/menu.php');?>

 <!--Main Section Starts -->
 <div class="main-Content">
        <div class="wrapper">
        <h1>Add Clothes</h1>
        
        <br/><br/>
        <?php
        if(isset($_SESSION['upload']))
          {  
            echo $_SESSION['upload'];
           unset($_SESSION['upload']);
        }
       ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr> 
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the clothes">
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Description of the clothes"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>
            <tr>
                <td>Select Image :</td>
                <td>
                    <input type="file" name="image">
            </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <select name="category">
                        <?php
                        //Create PHP code to display Categories from database
                        //1. Create SQL to get all active categories from database

                        $sql ="SELECT * FROM tbl_category WHERE active='yes'";
                        //Executing the query
                        $res =mysqli_query($conn,$sql);
                        //Count rows to Check whether we have categories or not
                        $count = mysqli_num_rows($res);
                        //If count is greater than zero, we have categories else we do not have categories
                        if($count>0)
                        {
                            //We have categories
                           while($row=mysqli_fetch_assoc($res))
                           {
                            //Get the details of categories
                            $id = $row['id'];
                            $title = $row['title'];
                            ?>

                            <option value="<?php echo $id; ?>"> <?php echo $title;?></option>

                            <?php
                           }
                    
                        }
                        else
                        {
                            //We do not have category
                            ?>
                         <option value="0">No category Found</option>
                            <?php
                        }

                        //IF
                        //2.Display on dropdown
                        ?>
    
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No">No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No">No
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="add clothes" class="btn-secondary">
                </td>
            </tr>


        </table>
        </form>

        <?php 
        //Check whether the button is clicked or not
        if(isset($_POST['submit']))
        {
            //Add the food in Database
            //echo "Clicked";
            //1. Get the dat from Form
            $title = $_POST['title'];
            $description =$_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            //Check whether radio button for featured and active are checked or not
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No"; //Setting the default value
            }





            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active ="No";
            }


            
            //2.Upload the image is selected
            //Check whether the select image is clicked or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name']))
            {
                //Get the details of the selected image
                $image_name =$_FILES['image']['name'];
                //Check whether the image is selected or not and upload image only if selected 
                if($image_name!="")
                {
                    //Image is selected
                    //A.Rename the image
                    //Get the extention of selected image
                    $extention = end(explode('.', $image_name));
                    //Create new name for Image
                    $image_name ="Clothes-name-".rand(0000,9999).".".$extention;//New image name may be"Clothes_name_"


                    //B. Upload the image

                    //Get the source path destination path

                    //Source path is the current location of the image
                    $source_path = $_FILES['image']['tmp_name'];
                    //Destination path for thrr image to be uploaded
                    $distination_path = "../images/clothes/".$image_name;

                    //Finally Upload the clothes image
                    $upload = move_uploaded_file( $source_path, $distination_path);

                    //Check whether image uploaded or not
                    if($upload==false)
                    {
                      //failed to upload the image
                      //Redirrected to the add food page with error mesage
                      $_SESSION['upload'] ="<div class='error'> Failed to upload the image.</div>";
                      header('location:'.SITEURL.'Admin/add_clothes.php');
                      //Stop the process
                      Die();

                    }
                }
            }
            else
            {
                $image_name="";//Setting default value as blank
            }

            //3.Insert into Database
            //Create a sql query to Save or add food
            //For numerical we dont need pas value inside '' but string value it is compulsary to add uote ''
            $sql2 = "INSERT INTO tbl_clothes SET
            title ='$title',
            description = '$description',
            price =$price,
            image_name = '$image_name',
            category_id =$category,
            featured = '$featured', 
            active ='$active'
            ";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            //Check whether data inserted or not
            
            //4.Redirrect with message to Manage food page
            if($res2== true)
            {
                   //Data inserted successfully

                   $_SESSION['add'] = "<div class='success'>Clothes Added Successfully.</div>";
                   header('location:'.SITEURL.'Admin/manage_clothes.php');
            }
            else
            {
                   //Failed to insert data
                   $_SESSION['add'] = "<div class='error'>Failed to added the clothes.</div>";
                   header('location:'.SITEURL.'Admin/manage_clothes.php');
            }
             
        }
       
        
        
        ?>
</div>
</div>


<?php include('partials/footer.php');?>