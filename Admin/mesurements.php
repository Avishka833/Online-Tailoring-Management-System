
<?php include('partials/menu.php');?>
    

    <link rel="stylesheet" href="css/Style.css">
    <link rel="stylesheet" href="css/Admin.css">
    
    
    
    
        
    <!--Main Section Starts -->
    <div class="main-Content" >
    <div class="wrapper">
    <h1>Mesurements</h1>
    <!-- Button to add Orders -->
    <br/><br/>
    
    <br/> <br/> <br/>
    
    <?php 
     if (isset($_SESSION['delete']))
     {
            
           echo $_SESSION['delete'];
           unset($_SESSION['delete']);
     }
    
    
    ?>
    <br><br>
    
    
     
    
    <table class="tbl-full" class="text-left">
    
    
    <?php
    //Get all the orders from database
    $sql = "SELECT * FROM tbl_mesurements ORDER BY id DESC"; //Display latest Order in First
    //Execute query
    $res = mysqli_query($conn, $sql);
    //Count the Rows
    $count = mysqli_num_rows($res);
    
    $sn = 1; //Create a serial number and set its initial value as 1
    
    
    if($count>0)
    {
           //Order Available
           while($row=mysqli_fetch_assoc($res))
           {
                  //Get all the order details
                  $id = $row['id'];
                  $neck_base = $row['neck_base'];
                  $chest = $row['chest'];
                  $waist = $row['waist'];
                  $hip =$row['hip'];
                  $center_front = $row['center_front'];
                  $center_back = $row['center_back'];
                  $shoulder_length = $row['shoulder_length'];
                  $accross_shoulder = $row['accross_shoulder'];
  
                  ?>
    
    <tr>
    <th>I.D</th>

    <th>Neck Base</th>
    
    <th>Chest </th>
    
    <th>Waist</th>
    
    <th>Hip</th>
    
    
    
    <th>Center Front</th>
    
    <th>Center Back</th>
    </tr>
    
                  <tr>
     <td><?php echo $sn++; ?></td>
     
     <td><?php echo $neck_base; ?></td>
     
     <td><?php echo $chest; ?></td>
     
     <td><?php echo $waist; ?></td>
     
     <td><?php echo $hip; ?></td>
     
     <td><?php echo $center_front; ?></td>
    </tr>


    <tr>
    <th>Center Back</th>
    
    <th>shoulder_length</th>
    
    <th>accross_shoulder</th>
    
   
    
    
    </tr>
    <tr>
     <td><?php echo $center_back; ?></td>
     
     <td><?php echo $shoulder_length; ?></td>
    
     <td><?php echo $accross_shoulder; ?></td>

     <td>
     
        <a href="<?php echo SITEURL; ?>admin/delete_mesurements.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>      
     </td>
    
     
    
     
    </tr>
    
    
                  <?php
           }
    }
    else
    {
           //Order not Available
           echo "<tr><td colspan='12' class='error'>Mesurements Not Available.</td></tr>";
    }
    
    ?>
    
    
    
    
    
    
    
    </table>
    
       
    </div>   
    </div> 
         
        
    <!--Main Section Ends -->
    
    <!--Footer Section Starts -->
    <?php include('partials/footer.php');?>