    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                               <h1>Inventory History of Product <?php echo $_GET['prod_name']; ?> </h1>
                              <br>
                              <h4>Branch Location: <?php echo mysqli_fetch_assoc($model->get_branch_from_id($_GET['branch_id']))['branch_address']; ?> </h4>
                          <h4>Legend:</h4>
                             Green:          <label class= 'label label-success'>+ Added Stocks</label><br>
                                Red:              <label class= 'label label-danger'>- Decreased Stocks</label><br>
                                Yellow:             <label class= 'label label-warning'>* Bad Stocks</label><br>

                          </header>
                                    <div  style = "height: 500px; overflow-y: scroll;">

<center><h4>Restocks History</h4></center>


                                      <table class="ui orange selectable table">


                                            <?php
 

                                                $query_invent_hist=  $model->get_invent_hist($_GET['id'], $_GET['branch_id']);

                            ?>

                                        <tr class=  'success'>
                                          <td>Restocks Id
                                          <td> Employee Supplied 
                                          <td>Stocks Updated in units
                                          <td>Price 
                                          <td>Date and Time Supplied
                                          <td>

                                        
                                          <?php

                                            $total_supplies = 0;

                                              while($result= mysqli_fetch_assoc($query_invent_hist)){
                                                
                                              ?>  
                                              <tr>

                                                <td><?php echo $result['restocks_prod_id']; ?>
                                                <td><?php echo $result['username']; ?>
                                                <td>

                                                <?php 

                                                if($result['flag'] == 1) echo "<label class= 'label label-success'>+";
                                                if($result['flag'] == 2) echo "<label class= 'label label-danger'>-";
                                                if($result['flag'] == 0) echo "<label class= 'label label-warning'>*";


                                                echo $result['stocks_added']."</label>";
                                                if($result['flag'] == 2){

                                                   $total_supplies -= $result['stocks_added'];
                                                  echo ' <small>Order Id: '.$result['order_id']."</small>"; 


                                                }


                                                if($result['flag'] == 1){

                                                   $total_supplies += $result['stocks_added'];

                                                ?>

     <b><a href= "<?php echo 'mark_bad.php?restocks_prod_id='. $result['restocks_prod_id']; ?>" class= 'btn btn-warning' style = "height:20px; width:100px; font-size:9px; color: black">Mark Bad Stocks</a></b>

                                          <?php } ?>

                                                <td><?php echo $result['stocks_price']; ?>
                                                <td><?php echo $result['timestamp']; ?>
                             

                                        <?php

                                             } 

 
                                      ?>
                                    </table>

        Total Supplies: <label class= 'label label-success'><?php echo $total_supplies; ?></label>

<center><h4>Orders History</h4></center>
 <table class="table table-condensed">


                                            <?php
 

                                                $query_order_hist=  $model->get_order_history($_GET['id'], $_GET['branch_id']);

                            ?>

                                        <tr class=  'danger'>
                                          <td>Order Id
                                          <td>Date Approved 
                                           <td>Quantity 
                                           <td>

                                        
                                          <?php

                                            $order_qty = 0;

                                              while($result= mysqli_fetch_assoc($query_order_hist)){
                                                
                                              ?>  
                                              <tr>

                                                <td><?php echo $result['order_id']; ?>
                                                <td><?php echo $result['date_approved']; ?>
                                                <td>

                                              

                                                   <label class= 'label label-danger'><small><?php echo $result['quantity'];

                                                      $order_qty += $result['quantity'];
 
                                                    ?></small></label>

 

 
 
                                          <?php } ?>

                                            
                             
 
 
                                    </table>
                                    Remaining Supplies: <label class= 'label label-success'><?php echo $total_supplies- $order_qty; ?></label>
                                      </div>
                      </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   