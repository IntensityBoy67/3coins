    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row" style = "background:#F7F7F7; color: #688a7e;">

                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h1> List of Orders </h1>
                              <br>
 


                           <script type="text/javascript" language="javascript" class="init">
  

                                      $(document).ready(function() {

                                        $('#example').DataTable({

                                            "order": [[ 1, "asc" ]]

                                        });

                                      });



                              </script>

                       </header>


                     <table  id="example" cellspacing="0" width="75%" style = "margin-left: 50px; width: 500px; font-size:12" class="table table-striped table-advance table-hover">


                        <thead>
                          <th>Date Ordered</th>
                          <th>Due Date</th>
                          <th>Client Name</th>
                          <th>Product Name</th>
                          <th>Product Type</th>
                          <th>Measurments/Pieces</th>
                           <th>Total Payment</th>
                          <th>Graphic Artists</th>
                          <th>Status</th>
                         </thead>  

                        <tbody>
                        <?php

                          $query_orders=  $model->get_orders();
 

                          while($result= mysqli_fetch_assoc($query_orders)){



                         ?>

                          <tr <?php if(isset($_GET['walk_in']) && $result['order_id'] == $_GET['walk_in']) { ?> style = "background-color: green;" <?php } ?>>
                            <td><?php echo $result['date_ordered']; ?></td>
                            <td><?php echo $result['due_date']; ?></td>
                            <td><?php 

                    $query_cust= mysqli_query($con, "SELECT * FROM customer WHERE customer_id= '$result[customer_id]' ");

                          $result_cust= mysqli_fetch_assoc($query_cust);


                            echo $result_cust['first_name']. " ". $result_cust['last_name']; ?></td>


                            <td><?php 


                    $query_prod= mysqli_query($con, "SELECT * FROM products WHERE product_id= '$result[product_id]' ");

                          $result_prod= mysqli_fetch_assoc($query_prod);



                            echo $result_prod['product_name']; ?></td>


                            <td><?php  switch($result_prod['product_type_id']){
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
                             <td><?php

                              if($result['unit_of_measurement'] != 'pcs')
                                 echo $result['width'].$result['unit_of_measurement']." x ".$result['height'].' '.$result['unit_of_measurement']; 
                              else 

                                 echo $result['quantity']." pcs";
                            ?>


                            </td>
                             <td>P<?php echo $result['price']; ?>
                               <td>

                                <?php 
                    $query_ga= mysqli_query($con, "SELECT * FROM login WHERE employee_id= '$result[employee_id]' ");

                          $result_ga= mysqli_fetch_assoc($query_ga);

                          echo $result_ga['username'];

                   ?>
                  <td>
                    <?php
                    
                    if($result['status'] == "ongoing")
                        $color = "label label-warning";
                    if($result['status'] == "cancelled")
                        $color = "label label-danger";
                    if($result['status'] == "approved")
                        $color = "label label-success";


                      
                    


                    ?>
 

                    <p class = <?php echo '"ui label '. $color.'"'; ?>><?php echo $result['status']; ?></p>
                             </td>

                         


                        <?php  } ?>


                          </tr>
                        </tbody>  
                      </table> 
                   
                     
                      </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   