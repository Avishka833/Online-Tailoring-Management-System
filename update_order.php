<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>
<link rel="stylesheet" href="css/Style.css">

<!--Main Section Starts -->
<div class="main-Content">
<div class="wrapper">
<h1>Update Order</h1>
<br><br>
<?php
//Check Whether the id is set or not
if(isset($_GET['id']))
{
    //Get the order details
    $id=$_GET['id'];

    //Get all other details based on this id
    //SqL query to get the order details
    $sql ="SELECT * FROM tbl_order WHERE id=$id";
    //Execute the query
    $res = mysqli_query($conn, $sql);
    //Count The rows
    $count = mysqli_num_rows($res);

    if ($count==1)
    {
        //Detail Available
        $row=mysqli_fetch_assoc($res);

        $clothes = $row['clothes'];
        $price = $row['price'];
        $qty = $row['qty'];
        $status = $row['status'];
        $customer_name = $row['customer_name'];
        $customer_contact = $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address = $row['customer_address'];
    }
    else
    {
       //Detail Not available
       //Redirrect to manage order
        header('location:'.SITEURL.'orders.php');

    }
}
else
{
    //Redirrect to Manage Order Page
    header('location:'.SITEURL.'orders.php');
}

?>

<form action="" method="POST">

<table>


<tr>
    <td>Clothes Name</td>
    <td><b><?php echo $clothes; ?></b></td>
</tr>

<tr>
    <td>Price</td>
    <td><b>$<?php echo $price; ?></b></td>
</tr>


<tr>
    <td>Qty</td>
    <td>
        <input type="number" name="qty" value="<?php echo $qty; ?>">
    </td>
</tr>

<tr>
    <td>Status</td>
    <td>
        <select name="status">
            <option <?php if ($status=="ordered") {echo "selected";} ?>  value="ordered">Ordered</option>
            <option <?php if ($status=="on delivery") {echo "selected";} ?> value="on delivery">On delivery</option>
            <option <?php if ($status=="delivered") {echo "selected";} ?> value="delivered">Delivered</option>
            <option <?php if ($status=="canceled") {echo "selected";} ?> value="canceled">Canceled</option>
        </select>
    </td>
</tr>
<tr>
    <td>Customer Name</td>
    <td>
        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
    </td>
</tr>

<tr>
    <td>Customer Contact</td>
    <td>
        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
    </td>
</tr>

<tr>
    <td>Customer Email</td>
    <td>
        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
    </td>
</tr>

<tr>
    <td>Customer Address</Address></td>
    <td>
       <textarea name="customer_address"  cols="30" rows="5"><?php echo $customer_address; ?></textarea>
    </td>
</tr>


<tr>
    <td colspan="2">
        <input type="hidden" name="id" value=" <?php echo $id; ?>">
         <input type="hidden" name="price" value=" <?php echo $price; ?>">
        <input type="submit" name="submit" value="update order" class="btn-secondary">
       
                
    </td>
</tr>
</table>





</form>

<?php 
//Check whether update bitton is clicked or not
if(isset($_POST['submit']))
{
    //echo "Clicked";
    //Get all the values from form
    $id=$_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;
    $status = $_POST['status'];


    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];

    //Update the values
    $sql2 = "UPDATE tbl_order SET
    
    qty = $qty,
    total = $total,
    status = '$status',
    customer_name = '$customer_name',
    customer_contact = '$customer_contact',
    customer_email = '$customer_email',
    customer_address = '$customer_address'

    WHERE id=$id
    ";
    //execute the query
    $res2 = mysqli_query($conn, $sql2);

    //Check whether update or not
    //And Redirrect to manage order with message
    if($res2==true)
    {
        //Update
        $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
        header('location:' .SITEURL.'orders.php');
    }
    else
    {
        //Failed to update
        $_SESSION['update'] = "<div class='error'>Failed to update the order.</div>";
        header('location:' .SITEURL.'orders.php');
    }


    //And redirrect to manage order with message



}


?>


</div>
</div>















<?php include('partials-front\footer.php');?>