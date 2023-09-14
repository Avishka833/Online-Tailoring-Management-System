<?php include ('C:\xampp\htdocs\Online_tailoring\partials-front\menu.php');?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="clothes-search">
        <div class="container">

        <a href="#" title="mesurements">
                    <img src="image\h.jpg" alt="Mesurements"  class="img-responsive">
                </a>
            
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>



            <form action="" method="POST" class="order">
           
               
                
            <fieldset>
                    <legend>Give Your Mesurements</legend>
                    <div class="order-label">Neck Base(nB)</div>
                    <input type="value" name="neck_base" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Chest(CH)</div>
                    <input type="value" name="chest" placeholder="Inches" class="input-responsive" required>

                    

                    <div class="order-label">Waist(W)</div>
                    <input type="value" name="waist" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Hip(H)</div>
                    <input type="value" name="hip" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Center Front(CF)</div>
                    <input type="value" name="center_front" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Center Back(CB)</div>
                    <input type="value" name="center_back" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Shoulder Length(SL)</div>
                    <input type="value" name="shoulder_length" placeholder="Inches" class="input-responsive" required>

                    <div class="order-label">Accross Shoulder(XB)</div>
                    <input type="value" name="accross_shoulder" placeholder="Inches" class="input-responsive" required>

                    
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>

            <?php 
            //Check Whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
               
                $neck_base = $_POST['neck_base'];
                $chest = $_POST['chest'];
                $waist = $_POST['waist'];
                $hip = $_POST['hip'];
                $center_front = $_POST['center_front'];
                $center_back = $_POST['center_back'];
                $shoulder_length = $_POST['shoulder_length'];
                $accross_shoulder = $_POST['accross_shoulder'];

                //Save the order in database
                //Create Sql to save the database
                $sql2 ="INSERT INTO tbl_mesurements SET
                neck_base = $neck_base,
                chest = $chest,
                waist = $waist,
                hip = $hip,
                center_front = $center_front,
                center_back = $center_back,
                shoulder_length = $shoulder_length,
                accross_shoulder = $accross_shoulder
                
                ";
                //Execute the query
                $res2 = mysqli_query($conn, $sql2);
                //Check Whether query executed successfully or not
                if($res2==true)
                {
                    //Query Executed and order saved
                   echo "Mesurements are Submitted";
                }
                else
                {
                    echo "Mesurements are Not Submitted";

                }

            }
            
            ?>

        </div>
    </section>
    <!-- Clothes SEARCH Section Ends Here -->








   