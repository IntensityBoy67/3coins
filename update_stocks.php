    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h1> Update Stocks</h1> 
 
<form action="update_stocks_process.php" method="POST" enctype="multipart/form-data">


          <div class="ui two column grid">
            <div class="column">
              <div class="field">
                <label>Product Details</label>
           <table>

<?php if(!isset($_GET['supplier_id'])) {   

           $row_prod= mysqli_fetch_assoc($model->get_branch_product($_GET['id'], $_GET['branch_id'])); 


           ?>

           <tr><td>Product Id: <td><?php  echo $row_prod['product_id']; ?>
          <tr><td>Product Name: <td><?php  echo $row_prod['product_name']; ?>

      <input type= "hidden" value = "<?php echo $_GET['branch_id']; ?>" name = "branch_id" />
      <input type= "hidden" value = "<?php echo $row_prod['product_id']; ?>" name = "prod_id" />

 
      
          
  <?php }else { ?>

<tr><td>Product Name:<td>

      <select name = "prod_id" class = "form-control">

    <?php

  $query_supplier = $model->get_products();
 
   while($row = mysqli_fetch_assoc($query_supplier)) { ?>

       <option value = <?php echo $row['product_id']; ?> > <?php echo $row['product_name']; ?></option>

     <?php } ?>


      </select>



    
<?php } 

if(!isset($_GET['branch_id'])){ ?>

 <tr><td>Branch Id:  <td>

  <select name = "branch_id" class = "form-control" >

  <option value = 2>Jagobiao</option>
  <option value = 4>Mandaue</option>
  <option value = 6>Consolacion</option> 

       </select>


          
          <input type = 'hidden' name = "prod_name" value = "<?php echo $row_prod['prod_name']; ?>" />
  

<?php } ?>

      <tr><td>  Re- Stocks (in units): <td><input type = "number" name = "new_stocks"  class = "form-control" />

        <tr><td>Price (per unit):  <td><input type = "number" name = "new_price" class = "input input-mini form-control" 
           value = "<?php if(isset($_GET['branch_id'])) echo $model->get_product_by_id( $_GET['branch_id'], $_GET['id'])['price']; ?>" /> 




          </table>


              
               <input type = 'submit'  name = "replinish" class = "btn btn-primary"  value = "Update Stocks" />



                             

    </div>
            </div>  

            <div class="column">
              <div class="field">
              </div>  
            </div>

            <div class="column">
                  

<br><br>

            </div>
          </div>  

        </form>


                   </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   