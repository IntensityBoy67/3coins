    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">
        <div class="row">
 
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-files-o"></i> Update Employee Branch</h3>
          
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
                                  <form class="form-validate form-horizontal" id="feedback_form"  method="POST" action="change_emp_branch.php">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Employee<span class="required">*</span></label>
                                          <div class="col-lg-5">
                                                <select class="form-control" name="emp_id" >


                                                  <?php
                                                                 $sql = "SELECT * FROM employee WHERE position= 'SALES REPRESENTATIVE' ";

                                                                $query= mysqli_query($con, $sql);

                                                                while($result= mysqli_fetch_assoc($query)){


                                                    ?>  
                                                                        <option value = <?php echo $result['employee_id']; ?>><?php echo $result['first_name']. ' '. $result['middle_name']. ' '.$result['last_name']; ?></option>
                                                   
                                              

                                                <?php } ?>
                                                  
                                                </select>
                                          </div>
                                      </div>


                                   <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Branch<span class="required">*</span></label>
                                          <div class="col-lg-5">
                                                <select class="form-control" name="branch_id" >

                                                  <option value = 2>Jagobiao</option>
                                                  <option value = 3>Mandaue</option>
                                                  <option value = 6>Consolacion</option>
                                                  
                                                  
                                                </select>
                                          </div>
                                      </div>
                                                                              
                                   
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-5">
                                              <button class="btn btn-primary" type="submit">Update Employee Branch</button>
                                           </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

           
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
    </section>

  </section>

</section>