<?php 

//Include Constants file
include('../config/constants.php');

//echo "Delete Page";
//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get the value and delete
    //echo "Get value and Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Remove the physical image file if available
    if($image_name != "")
    {
        //Image is available.So remove it
     $path="../images/category/".$image_name;
     //Remove the image
     $remove = unlink($path);
     //If failed to remove image then add an error message and stop the proces
     if($remove==false)
     {
         //set the session Message 
         $_SESSION['remove']="<div class='error'> failed to remove Category image.</div>";
         //Redirrect to manage categories page
         header('location:'.SITEURL.'Admin/manage_categories.php');
         //stop the process
         die();

     
    
     }
       
    }
    

    //Delete data from database
    //SQL query to delete the data from database
    $sql = "DELETE FROM tbl_category  WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whwthe the data is deleted from database or not
    if($res==true)
    {
          //set Success message and Redirrect
          $_SESSION['delete']="<div class='success'> Category Deleted Succesfully.</div>";
          //Redirrect to manage categories
          header('location:'.SITEURL.'Admin/manage_categories.php');

    }
    else
    {
          //Set fail message and Redirrect
          $_SESSION['delete']="<div class='error'> Failed to delete category.</div>";
          //Redirrect to manage categories
          header('location:'.SITEURL.'Admin/manage_categories.php');

    }

    }


else
{
     
    //Redirrect to the manage category page 
    header('location:'.SITEURL.'Admin/manage_categories.php');
}

?>