    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h1> Products Inventory 
 
<?php

 if($_SESSION['type'] == "OWNER"){ 


if(isset($_GET['branch_id']) && !empty($_GET['branch_id']))
  echo "Branch : ". mysqli_fetch_assoc($model->get_branch_from_id($_GET['branch_id']))['branch_address'];

else echo "Branch: All Branches";

  ?>

                                  <p>
            <h4>Choose Branch:<br>  </h4>
 
 	<form action = "controller.php" method = 'GET' >


            <select name = 'branch_id' style = "width: 300px; margin-bottom:20px;" class= "form-control">
            <option <?php if(empty($_GET['branch_id']) || 0 == $_GET['branch_id'] ) echo 'selected'; ?> value = 0 >All Branches</option>

              <?php 

              $query_branches = $model->get_branch();

              while($result = mysqli_fetch_assoc($query_branches)) { ?>
              
                <option <?php if(isset($_GET['branch_id']) && $result['branch_id'] == $_GET['branch_id']) echo 'selected'; ?> value = "<?php echo $result['branch_id']; ?>"><?php echo $result['branch_address']; ?></option>

               <?php } ?>


            </select>  


 			<input type = "submit" value = "Change Branch" class= 'btn btn-primary'/>




             </p>

	<input type = "hidden" name = "page" value = "inventory" />

           </form>  


 <?php }else echo "Branch : ". mysqli_fetch_assoc($model->get_branch_from_id($_SESSION['branch_id']))['branch_address'];  ?>

</h1>


                             *Note: <span class= 'label label-warning'>There might be leftovers that can be more fitting than the current stock. </span>
                                  <br><span class= 'label label-danger'>*Red indicates that product is in crtitical stocks!</span>
                          </header>
                         <br> 
                          <table id = "example" class="table table-striped table-advance table-hover">
                         
 
            <tr class= "danger"><td>Product Id<td>Product Name<td>Supplier<td>Stocks (units)<th>
     <th>  

            


            <th>
           

                <?php

                	if(!isset($_GET['branch_id']) || $_GET['branch_id'] == 0)
 		               $branch_id = 'branch_id';

                	else if(isset($_GET['branch_id']) && !empty($_GET['branch_id']))
	                	$branch_id =$_GET['branch_id']; 

                  $query_orders=  $model->get_inventory($branch_id);

 
                  while($result= mysqli_fetch_assoc($query_orders)){


                  ?>  
                  <tr>

                    <td><?php echo $result['product_id']; ?>
                    <td><?php echo $result['product_name']; ?>
                      <td><?php echo $result['supplier_name']; ?>
                    <td>

		                    <label <?php 

                  if($branch_id != 0){


                    $query_stocks_added= mysqli_query($con, "SELECT SUM(stocks_added) AS stocks_added FROM restocks_history WHERE branch_product_id= (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]' AND branch_id = '$result[branch_id]' AND flag = 1) ");

                    $stocks_added = mysqli_fetch_assoc($query_stocks_added);


                    $query_stocks_decreased= mysqli_query($con, "SELECT SUM(stocks_added) AS stocks_decreased FROM restocks_history WHERE branch_product_id= (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]' AND branch_id = '$result[branch_id]' AND flag = 2) ");

                    $stocks_decreased = mysqli_fetch_assoc($query_stocks_decreased);

                  }else {

                        $query_stocks_added= mysqli_query($con, "SELECT SUM(stocks_added) AS stocks_added FROM restocks_history WHERE branch_product_id IN (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]'   AND flag = 1) ");

                    $stocks_added = mysqli_fetch_assoc($query_stocks_added);


                    $query_stocks_decreased= mysqli_query($con, "SELECT SUM(stocks_added) AS stocks_decreased FROM restocks_history WHERE branch_product_id IN (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]'  AND flag = 2) ");

                    $stocks_decreased = mysqli_fetch_assoc($query_stocks_decreased);
                  }
                                


                      $stocks  = $stocks_added['stocks_added']- $stocks_decreased['stocks_decreased'];

                      if(empty($stocks)) $stocks =0;

                        if($stocks <= $result['stocks_alert_limit']) { ?> class= 'label label-danger'><?php } else { echo '>'; } 



		                    echo $stocks;

                
                    ?>

                  </label>

                  <?php

                    if($branch_id != 0)
                    $query_leftovers= mysqli_query($con, "SELECT COUNT(*) AS leftovers FROM restocks_history WHERE branch_product_id= (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]' AND branch_id = '$result[branch_id]' AND flag = 1) ");

  else 

                    $query_leftovers= mysqli_query($con, "SELECT COUNT(*) AS leftovers FROM restocks_history WHERE branch_product_id IN (SELECT branch_product_id FROM branch_product WHERE product_id = '$result[product_id]'  AND flag = 1) ");

                    $leftovers = mysqli_fetch_assoc($query_leftovers);

                    if($result['stock_measurement'] == "feet")   
                      echo "<br><br><label class= 'label label-warning'>Leftover Stocks: ". $leftovers['leftovers']. "</small></label>";

                if(isset($_GET['branch_id']) && $_GET['branch_id'] != 0 ){
                  
                    ?>


 
                     
                      <td><a  href= "<?php echo 'controller.php?page=update_stocks&id='.$result['product_id'].'&branch_id='.$result['branch_id']; ?>" class = 'btn btn-primary'>
                      Update Stocks
                        </button>

                     <td><a  href= "<?php echo 'controller.php?page=view_inventory_hist&query=invent_hist&id='.$result['product_id'].'&prod_name='.$result['product_name'].'&unit='.$result['stock_measurement'].'&branch_id='.$_GET['branch_id']; ?>" class = 'btn btn-success btn-sm'>View Stocks History</button>


            <?php }

            } ?>
                          
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   