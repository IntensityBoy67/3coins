    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h1> List of Suppliers </h1>
                              <br>
 
                          </header>
                          
                          <table id = "example" class="table table-striped table-advance table-hover">
                         
 
            <tr class= "danger"><td>Supplier Id<td> Supplier Name <td>Location <td>Contact Number<th><th><th>

                <?php
                   $sql = "SELECT * FROM supplier";

                  $query= mysqli_query($con, $sql);

                  while($result= mysqli_fetch_assoc($query)){


                  ?>  
                  <tr>
                    <td><?php echo $result['supplier_id']; ?>
                    <td><?php echo $result['supplier_name']; ?>
                    <td><?php echo $result['location']; ?>
                    <td><?php echo $result['contact_number']; ?>
                    <td>
              <a href= "<?php echo 'controller.php?page=update_stocks&supplier_id='. $result['supplier_id']; ?>" class= 'btn btn-primary' >Order Supply</a>

              <td>

            <?php } ?>
                          
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   