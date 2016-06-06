    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">
        <div class="row">
 
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> Supply Management</h3>
          
        </div>
               <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-8" style = "margin-left:50px;">
                      <section class="panel">
                          <header class="panel-heading">
                              Add Supply Product
                          </header>
                          <div class="panel-body">
                              <div class="form" >
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="add_prod.php">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Product Type <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                                <select class="form-control" name="prod_type" >

                                                  <option value = 1>Tarpaulin</option>
                                                  <option value = 2>Sticker</option>
                                                  <option value = 3>Mug</option>
                                                  <option value = 4>Signage</option>
                                                  <option value = 5>T- shirt</option>
                                                  
                                                </select>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Product Name<span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <input class="form-control " id="cemail" type="text" name="prod_name" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Product Price <span class="required">*</span></label>
                                         <div class="col-lg-5">
                                              <input class="form-control " type = "number"  min = 1 name="prod_price" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Stocks Units  <span class="required">*</span></label>
                                          <div class="col-lg-5">
    
                                                <select name = "stock_units" class = "form-control">

                                                    <option value = "pcs">Pieces</option>
                                                    <option value = "feet">Feet</option>

                                                </select>

                                              </div>
                                      </div>       

                                      <div class="form-group ">

                                          <label for="cname" class="control-label col-lg-2">Supplier  <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <select name = "supplier" class = 'form-control' required >

                                                  <?php


                                                    $query_supplier = $model->get_supplier();


                                                   while($row = mysqli_fetch_assoc($query_supplier)) { ?>

                                                  <option value = "<?php echo $row['supplier_id']; ?>" > <?php echo $row['supplier_name']; ?></option>

                                                  <?php } ?>


                                              </select>       
                                                </div>
                                      </div>          



                             <div class="form-group ">

                                          <label for="cname" class="control-label col-lg-2">Initial Stocks  <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                      
                                              <input class="form-control " type = "number"  min = 1 name="init_stocks" />

                                                </div>
                                      </div>          

                                   
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-5">
                                              <button class="btn btn-primary" type="submit">Add Product</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

           <div class="row">
                  <div class="col-lg-8" style = "margin-left:50px;">
                      <section class="panel">
                          <header class="panel-heading">
                              Add Supplier
                          </header>
                          <div class="panel-body">
                              <div class="form" >
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="add_supplier.php">
                                      
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Supplier Name<span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <input class="form-control " id="cemail" type="text" name="prod_name" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="curl" class="control-label col-lg-2">Location  <span class="required">*</span></label>
                                         <div class="col-lg-5">
                                              <input class="form-control " type = "text"  name="location" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2"> Contact Number <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                             <input class="form-control" id="subject" name="cont_number"   type="text" required />
                                          </div>
                                      </div>                                      
                                   
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-5">
                                              <button class="btn btn-primary" type="submit">Add Supplier</button>
                                              <button class="btn btn-default" type="button">Cancel</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
            </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
    </section>

  </section>

</section>