<?php include('partials/menu.php');?>
<?php 
//Check whether the id is set or not
if(isset($_GET['id']))
{
    //echo "Getting data";
    //Get the id and all other details

    $id = $_GET['id'];
    //Create sql query to get all other details
    $sql2="SELECT * FROM tbl_clothes WHERE id=$id";
    //Execute the query
    $res2 = mysqli_query($conn, $sql2);

    //Get the value based on query executed
    $row2 = mysqli_fetch_assoc($res2);

    //Get the individual values of the selected clothes
    $title = $row2['title'];
    $description =$row2['description'];
    $price=$row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active =$row2['active'];

}
else
{
    //Redirrect to manage Category
    header('location:'.SITEURL.'Admin/manage_clothes.php');
}



?>


<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Update Food</h1>
<!-- Button to add Orders -->
<br/><br>



<form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr> 
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>" >
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php  echo $description;?> </textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price" value="<?php echo $price?>">
                </td>
            </tr>
            <tr>
                <td>Current Image :</td>
                <td>
                    
                <?php 
            if($current_image !="")
            {
                //Display the image
                ?>
                <img src="<?php echo SITEURL;?>images/clothes/<?php echo $current_image;?>" width="150px">

                <?php
            }
            else
            {
                //display Message
                echo "<div class='error'>Image Not found.</div>";
            }
            
            ?>
            </td>
            </tr>
            <tr>
                <td>Select New Image</td>
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
                            $category_id = $row['id'];
                            $category_title = $row['title'];
                            ?>

                            <option <?php if($current_category ==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"> <?php echo $category_title;?></option>

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
                <input <?php  if($featured=="Yes"){ echo "Checked";}?> type="radio" name="featured" value="Yes"> Yes

                <input <?php  if($featured=="No"){ echo "Checked";}?> type="radio" name="featured" value="No"> No
                </td>
            </tr>
            <tr>
                <td>Active:</td>
                <td>
                <input <?php  if($active=="Yes"){ echo "Checked";}?> type="radio" name="active" value="Yes"> Yes

                <input  <?php  if($active=="No"){ echo "Checked";}?> type="radio" name="active" value="No"> No
                </td>
            </tr>


            <tr>
                <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="current_image" value=" <?php echo $current_image;?>">
                <input type="submit" name="submit" value="Update Clothes" class="btn-secondary">
                </td>
            </tr>


        </table>
        </form>

        <?php 


if(isset($_POST['submit']))
{
    //echo "Clicked";
    //1.Get all the values from our form
    $id =$_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_image = $_POST['current_image'];
    $category =$_POST['category'];

    $featured = $_POST['featured'];
    $active = $_POST['active'];
// 2.Updating New Image idf selected 
//Check whether the image is selected or not
if(isset($_FILES['image']['name']))
{
//Upload button Clicked
$image_name=$_FILES['image']['name'];  //New image name
//Check Whether the file is availabe or not
if($image_name!="")  
     {

        //Image is available
        //Rename the image
        $extention = end(explode('.',$image_name)); //Gets the extention of the image
        $image_name="Clothes-Name-".rand(0000,9999).'.'.$extention;//e.g Clothes-Category-223.jpg

        //Get the source path and destination path
        $source_path = $_FILES['image']['tmp_name']; //Source path

        $destination_path ="../images/clothes/".$image_name; //Destination path
        
        //Upload the image
        $upload = move_uploaded_file($source_path, $destination_path);

        //Check whether the image is uploaded or not
//And if the image is not uploaded then will stop the process and redirrect with error message
if($upload==false)
{
    //Set message
    $_SESSION['upload']="<div class='error'> Failed to upload the image.</div>";
    //Redirrect to add category page 
    header('location:' .SITEURL.'Admin/manage_clothes.php');
    //sop the prosess
    die();
    
     }

     

     //B.Remove current image If available
     if($current_image!=" ")
       {
       
       
        $remove_path ="../images/clothes/".$current_image;

       $remove_path = unlink($remove_path);

    

    
    //Check whether the image image is removed or not
                    //if failled to remove then display message and stop the process
                    if($remove==false)
                {
    
                 //Failed to remove the current image
                 $_SESSION['failed-remove'] = "<div class='error'> Failed to remove current image.</div>";
                 header('location:' .SITEURL.'Admin/manage_clothes.php');
                 die();//stop the procces
    
    
    
                }

        }

            
    }
    else
    {
        $image_name = $current_image;//Default image when button is not clicked 
    }

}
else
{

    $image_name = $current_image;
}

//Update the clothes in database
$sql3 = "UPDATE tbl_clothes SET
title = '$title',
description ='$description',
price = '$price',
image_name ='$image_name',
category_id ='$category',
featured = '$featured',
active = '$active'
WHERE id=$id
";
//Execute the sql Query
$res3 = mysqli_query($conn,$sql3);

//Check whether the query is executed or not
if($res3==true)
{
    //Query executed and food updated
    $_SESSION['update'] = "<div class='success'> Category updated succesfully.</div>";
        header('location:' .SITEURL.'Admin/manage_clothes.php');
}
else{

     //Failed to update category
     $_SESSION['update'] = "<div class='error'> Failed to Update the Category.</div>";
     header('location:' .SITEURL.'Admin/manage_clothes.php');
}

}

?>


</div>
</div>









<?php include('partials/footer.php');?>