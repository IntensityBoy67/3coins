  <section id="main-content">
        <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
          
        </div>
      </div>
            <div class="row">
              <!-- chart morris start -->
              <div class="col-lg-12">
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>General Chart</Char>
                      </header>
                         <div class="col-lg-12">
                              <section class="panel">
                                  <header class="panel-heading">`
                             <center> <b> # of ORDERS APPROVED</center> </b></h2>

                              <br>BETWEEN <?php 
                                        $from = (isset($_GET['from'])? $_GET['from']: date("Y-m-01"));
                                        $to = (isset($_GET['to'])? $_GET['to']: date("Y-m-d"));
                                        $branch_id= (isset($_GET['branch_id'])? $_GET['branch_id']: 'branch_id');

                                       echo "<br> From:". $from. "<br> Until:".$to;
                                    
                                       if($branch_id == "branch_id")
                                           echo "<br>Branch Id: All Branches";

                                    else
                                           echo "<br>Branch Name: ".mysqli_fetch_assoc($model->get_branch_from_id($branch_id))['branch_address'];
                                       ?>   

                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="bar_orders" height="200" width="1200"></canvas>



                                      <br>
                                       
                                  </div>


                                  <div class="panel-body text-center">
                              <header class="panel-heading">`

                                        <b>QUANTITY SOLD
                                          <?php 
                                        $from = (isset($_GET['from'])? $_GET['from']: date("Y-m-01"));
                                        $to = (isset($_GET['to'])? $_GET['to']: date("Y-m-d"));
                                        $branch_id= (isset($_GET['branch_id'])? $_GET['branch_id']: "branch_id");

                                     
                                    
                                    
                                       ?>   

                                      </header>

                                          <canvas id="bar_order_qty" height="300" width="1200"></canvas>

                                       

                                </div>            

                             
                              </section>

                          </div>

                      <div class="panel-body">
                        <div class="tab-pane" id="chartjs">

                           <script type="text/javascript" language="javascript" class="init">
  

                                      $(document).ready(function() {

                                        $('#example').DataTable({

                                            "order": [[ 1, "asc" ]]
 

 


                                        });

                                      });



                              </script>

                            <table class= 'table table-condensed'>
                              <tr><td>Product Type<td>Orders Approved<td>Quantity Sold<td>Total Sales Amount 
                              <tr><td><b><button id = "tarpaulin">Tarpaulin </button></b><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(1, $branch_id, $from, $to))['orders_sold']; ?><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(1, $branch_id, $from, $to))['stocks_sold']; ?><td>P<?php $sum = 0;  $prod_1 =   mysqli_fetch_assoc($model_reports->order_products_stats(1, $branch_id, $from, $to))['tot_price']; $sum+= $prod_1; echo number_format($prod_1, 2); ?> 
                              <tr><td><b><button id = "sticker">Sticker </button></b><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(2, $branch_id, $from, $to))['orders_sold']; ?><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(2, $branch_id, $from, $to))['stocks_sold']; ?><td>P<?php  $prod_2 =  mysqli_fetch_assoc($model_reports->order_products_stats(2, $branch_id, $from, $to))['tot_price'];  $sum+= $prod_2; echo number_format($prod_2, 2);  ?> 
                              <tr><td><b><button id = "mug">Mug </button></b><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(3, $branch_id, $from, $to))['orders_sold']; ?><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(3, $branch_id, $from, $to))['stocks_sold']; ?><td>P<?php $prod_3 =  mysqli_fetch_assoc($model_reports->order_products_stats(3, $branch_id, $from, $to))['tot_price'];  $sum+= $prod_3; echo number_format($prod_3, 2);  ?> 
                              <tr><td><b><button id = "signage"> Signage </button></b><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(4, $branch_id, $from, $to))['orders_sold']; ?><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(4, $branch_id, $from, $to))['stocks_sold']; ?><td>P<?php  $prod_4 =    mysqli_fetch_assoc($model_reports->order_products_stats(4, $branch_id, $from, $to))['tot_price'];  $sum+= $prod_4; echo number_format($prod_4, 2); ?> 
                              <tr><td><b><button id = "tshirt"> T-shirt </button></b><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(5, $branch_id, $from, $to))['orders_sold']; ?><td><?php echo  mysqli_fetch_assoc($model_reports->order_products_stats(5, $branch_id, $from, $to))['stocks_sold']; ?> <td>P<?php  $prod_5 =   mysqli_fetch_assoc($model_reports->order_products_stats(5, $branch_id, $from, $to))['tot_price'];  $sum+= $prod_5; echo number_format($prod_5, 2);  ?> 
                              </table>

                              <h2>Total Sales: <label class = 'text text-success'> P<?php echo number_format($sum, 2); ?></h2></label>

                              <script type="text/javascript">

                                $("document").ready(function(){


                                        $("#table_1").hide();
                                        $("#table_2").hide();
                                        $("#table_3").hide();
                                        $("#table_4").hide();
                                        $("#table_5").hide();
 

                                    $("#tarpaulin").click(function(){

                                        $("#table_1").show();
                                        $("#table_2").hide();
                                        $("#table_3").hide();
                                        $("#table_4").hide();
                                        $("#table_5").hide();

                                    });

                                      $("#sticker").click(function(){

                                        $("#table_1").hide();
                                        $("#table_2").show();
                                        $("#table_3").hide();
                                        $("#table_4").hide();
                                        $("#table_5").hide();

                                    });


  $("#mug").click(function(){

                                        $("#table_1").hide();
                                        $("#table_2").hide();
                                        $("#table_3").show();
                                        $("#table_4").hide();
                                        $("#table_5").hide();

                                    });


  $("#signage").click(function(){

                                        $("#table_1").hide();
                                        $("#table_2").hide();
                                        $("#table_3").hide();
                                        $("#table_4").show();
                                        $("#table_5").hide();

                                    });


  $("#tshirt").click(function(){

                                        $("#table_1").hide();
                                        $("#table_2").hide();
                                        $("#table_3").hide();
                                        $("#table_4").hide();
                                        $("#table_5").show();

                                    });


                                });

                              </script>
<div id = "table_1">

                Product Type: Tarpaulin
                     <table  id="example_1" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500; font-size: 12" class="table table-striped table-advance table-hover" >


                        <thead>
                          <th>Order Id
                          <th>Date Approved</th>
                          <th>Brach Id </th>
                          <th>Product Name</th>
                           <th>Product Type</th>
                          <th>Unit Sold</th> 
                         </thead>  

                        <tbody>
                        <?php

                          $sql= "SELECT *

                FROM orders 

                RIGHT JOIN products on orders.product_id = products.product_id

                RIGHT JOIN product_type ON product_type.product_type_id = products.product_type_id
              
                 JOIN branch_product ON  branch_product.product_id = products.product_id
                                
                WHERE branch_product.branch_id= ".$branch_id . "

                AND product_type.product_type_id = 1 

                AND date_ordered BETWEEN '".$from."' AND '".$to."'

                AND orders.status= 'approved'
     ";



                          $query= mysqli_query($con, $sql) or die(mysqli_error($con));
                            while($result= mysqli_fetch_assoc($query)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['order_id']; ?></td>
                            <td><?php echo $result['date_approved']; ?></td>
                            <td><?php echo $result['branch_id']; ?></td>
                              <td><?php echo $result['product_name']; ?></td>



                            <td><?php  switch($result['product_type_id']){
                                  case 1:
                                  echo "Tarpaulin";
                                  break;
                                  case 2:
                                  echo "Sticker";
                                  break;
                                  case 3:
                                  echo "Mug";
                                  break;
                                  case 4:
                                  echo "Signage";
                                  break;
                                  case 5:
                                  echo "T- Shirt";
                                  break;

                              } ?></td>
                                
                                <td>

                                  <?php  

                                    echo $result['quantity'];


                                //   else if ($result['width'] > $result['height']) 

                                //   echo $result['width'];

                                // else

                                //    echo $result['height'];

                                  ?>                                 
 <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 

</div>

<div id = "table_2">

    Product Type: Sticker
                     <table  id="example_2" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500; font-size: 12" class="table table-striped table-advance table-hover" >


                        <thead>
                          <th>Order Id
                          <th>Date Approved</th>
                          <th>Brach Id </th>
                          <th>Product Name</th>
                           <th>Product Type</th>
                          <th>Unit Sold</th> 
                                    
                        </thead>  

                        <tbody>
                        <?php

                          $sql= "SELECT *

                FROM orders 

                RIGHT JOIN products on orders.product_id = products.product_id

                RIGHT JOIN product_type ON product_type.product_type_id = products.product_type_id
              
                 JOIN branch_product ON  branch_product.product_id = products.product_id
                                
                WHERE branch_product.branch_id= ".$branch_id . "

                AND product_type.product_type_id = 2

                AND date_ordered BETWEEN '".$from."' AND '".$to."'

                AND orders.status= 'approved'
     ";



                          $query= mysqli_query($con, $sql) or die(mysqli_error($con));
                            while($result= mysqli_fetch_assoc($query)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['order_id']; ?></td>
                            <td><?php echo $result['date_approved']; ?></td>
                            <td><?php echo $result['branch_id']; ?></td>
                              <td><?php echo $result['product_name']; ?></td>



                            <td><?php  switch($result['product_type_id']){
                                  case 1:
                                  echo "Tarpaulin";
                                  break;
                                  case 2:
                                  echo "Sticker";
                                  break;
                                  case 3:
                                  echo "Mug";
                                  break;
                                  case 4:
                                  echo "Signage";
                                  break;
                                  case 5:
                                  echo "T- Shirt";
                                  break;

                              } ?></td>
                                
                                <td>

                                  <?php  

                                    echo $result['quantity'];


                                //   else if ($result['width'] > $result['height']) 

                                //   echo $result['width'];

                                // else

                                //    echo $result['height'];

                                  ?>                                 

                    


                        <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 
</div>
<div id = "table_3">
    Product Type: Mug
                     <table  id="example_3" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500; font-size: 12" class="table table-striped table-advance table-hover" >


                        <thead>
                          <th>Order Id
                          <th>Date Approved</th>
                          <th>Brach Id </th>
                          <th>Product Name</th>
                           <th>Product Type</th>
                          <th>Unit Sold</th> 
                         </thead>  

                        <tbody>
                        <?php

                          $sql= "SELECT *

                FROM orders 

                RIGHT JOIN products on orders.product_id = products.product_id

                RIGHT JOIN product_type ON product_type.product_type_id = products.product_type_id
              
                 JOIN branch_product ON  branch_product.product_id = products.product_id
                                
                WHERE branch_product.branch_id= ".$branch_id . "

                AND product_type.product_type_id = 3 

                AND date_ordered BETWEEN '".$from."' AND '".$to."'

                AND orders.status= 'approved'
     ";



                          $query= mysqli_query($con, $sql) or die(mysqli_error($con));
                            while($result= mysqli_fetch_assoc($query)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['order_id']; ?></td>
                            <td><?php echo $result['date_approved']; ?></td>
                            <td><?php echo $result['branch_id']; ?></td>
                              <td><?php echo $result['product_name']; ?></td>



                            <td><?php  switch($result['product_type_id']){
                                  case 1:
                                  echo "Tarpaulin";
                                  break;
                                  case 2:
                                  echo "Sticker";
                                  break;
                                  case 3:
                                  echo "Mug";
                                  break;
                                  case 4:
                                  echo "Signage";
                                  break;
                                  case 5:
                                  echo "T- Shirt";
                                  break;

                              } ?></td>
                                
                                <td>

                                  <?php  

                                    echo $result['quantity'];


                                //   else if ($result['width'] > $result['height']) 

                                //   echo $result['width'];

                                // else

                                //    echo $result['height'];

                                  ?>                                 

                         


                        <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 
</div>

<div id = "table_4">


    Product Type: Signage
                     <table  id="example_4" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500; font-size: 12" class="table table-striped table-advance table-hover" >


                        <thead>
                          <th>Order Id
                          <th>Date Approved</th>
                          <th>Brach Id </th>
                          <th>Product Name</th>
                           <th>Product Type</th>
                          <th>Unit Sold</th> 
                         </thead>  

                        <tbody>
                        <?php

                          $sql= "SELECT *

                FROM orders 

                RIGHT JOIN products on orders.product_id = products.product_id

                RIGHT JOIN product_type ON product_type.product_type_id = products.product_type_id
              
                 JOIN branch_product ON  branch_product.product_id = products.product_id
                                
                WHERE branch_product.branch_id= ".$branch_id . "

                AND product_type.product_type_id = 4

                AND date_ordered BETWEEN '".$from."' AND '".$to."'

                AND orders.status= 'approved'
     ";



                          $query= mysqli_query($con, $sql) or die(mysqli_error($con));
                            while($result= mysqli_fetch_assoc($query)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['order_id']; ?></td>
                            <td><?php echo $result['date_approved']; ?></td>
                            <td><?php echo $result['branch_id']; ?></td>
                              <td><?php echo $result['product_name']; ?></td>



                            <td><?php  switch($result['product_type_id']){
                                  case 1:
                                  echo "Tarpaulin";
                                  break;
                                  case 2:
                                  echo "Sticker";
                                  break;
                                  case 3:
                                  echo "Mug";
                                  break;
                                  case 4:
                                  echo "Signage";
                                  break;
                                  case 5:
                                  echo "T- Shirt";
                                  break;

                              } ?></td>
                                
                                <td>

                                  <?php  

                                    echo $result['quantity'];


                                //   else if ($result['width'] > $result['height']) 

                                //   echo $result['width'];

                                // else

                                //    echo $result['height'];

                                  ?>                                 

                      


                        <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 
</div>

<div id = "table_5">



    Product Type: T- shirt
                     <table  id="example_5" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500; font-size: 12" class="table table-striped table-advance table-hover" >


                        <thead>
                          <th>Order Id
                          <th>Date Approved</th>
                          <th>Brach Id </th>
                          <th>Product Name</th>
                           <th>Product Type</th>
                          <th>Unit Sold</th> 
                         </thead>  

                        <tbody>
                        <?php

                          $sql= "SELECT *

                FROM orders 

                RIGHT JOIN products on orders.product_id = products.product_id

                RIGHT JOIN product_type ON product_type.product_type_id = products.product_type_id
              
                 JOIN branch_product ON  branch_product.product_id = products.product_id
                                
                WHERE branch_product.branch_id= ".$branch_id . "

                AND product_type.product_type_id = 5 

                AND date_ordered BETWEEN '".$from."' AND '".$to."'

                AND orders.status= 'approved'
     ";



                          $query= mysqli_query($con, $sql) or die(mysqli_error($con));
                            while($result= mysqli_fetch_assoc($query)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['order_id']; ?></td>
                            <td><?php echo $result['date_approved']; ?></td>
                            <td><?php echo $result['branch_id']; ?></td>
                              <td><?php echo $result['product_name']; ?></td>



                            <td><?php  switch($result['product_type_id']){
                                  case 1:
                                  echo "Tarpaulin";
                                  break;
                                  case 2:
                                  echo "Sticker";
                                  break;
                                  case 3:
                                  echo "Mug";
                                  break;
                                  case 4:
                                  echo "Signage";
                                  break;
                                  case 5:
                                  echo "T- Shirt";
                                  break;

                              } ?></td>
                                
                                <td>

                                  <?php  

                                    echo $result['quantity'];


                                //   else if ($result['width'] > $result['height']) 

                                //   echo $result['width'];

                                // else

                                //    echo $result['height'];

                                  ?>                                 

                  


                        <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 

</div>



 Choose Between Dates:
                               <form method = "GET" action = "controller.php">

                                <table><tr><td>From: 

                                  <td><input type = "date"  name = "from" value = "<?php echo $from; ?>"/>
                             <tr><td> To
                                   <td><input type = "date" name = "to" value = "<?php echo $to; ?>"/>
                                   <input type = "hidden" name = "page" value = "report"/>

                            


                            <tr><td>Choose Branch
                              <td><select name = "branch_id">
                                    <?php 
                                     $query_branch= $model->get_branch();

                                     while($result = mysqli_fetch_assoc($query_branch)){

                                      echo "<option value = '".$result['branch_id']."'>".$result['branch_address']."</option>";

                                     }
                                   ?>
                                   </select>




                                 </table>



                                   <br>
                                    <input type = "submit" value = "Generate Report" class= 'btn btn-primary'/>
                                  </form>
                    <script>
                      
                      $("document").ready(function(){
                          $("#add_charts").hide();
                      });

                    </script>


    <div style = "visibility: hidden;" id = "add_charts"> 

                            <div class="row">
                          <!-- Line -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Line
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="line" height="300" width="450"></canvas>
                                  </div>
                              </section>
                          </div>                      
                          <!-- Bar -->
                         
                      </div>
 

                      <div class="row">
                          <!-- Radar -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Radar
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="radar" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                          <!-- Polar Area -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Polar Area
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="polarArea" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>
                      <div class="row">
                          
                          <!-- Pie -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Pie
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="pie" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                          <!-- Doughnut -->
                          <div class="col-lg-6">
                              <section class="panel">
                                  <header class="panel-heading">
                                      Doughnut
                                  </header>
                                  <div class="panel-body text-center">
                                      <canvas id="doughnut" height="300" width="400"></canvas>
                                  </div>
                              </section>
                          </div>
                      </div>



                  </div>

            </div>
                      </div>
                      </div>
                    </section>
              </div>
              <!-- chart morris start -->
            </div>
      </section>


    <script src="assets/chart-master/Chart.js"></script>
    <!-- custom chart script for this page only-->
 
  <?php require 'js/admin.php'; ?>

