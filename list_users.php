    <section id="container" class="">
           
 
        <section id="main-content">
          <section class="wrapper">

 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h1> List of Employees </h1>
                              <br>
 
                          </header>
                          
                          <table id = "example" class="table table-striped table-advance table-hover">
                         
 
            <tr class= "danger"><td>Employee Id<td>Employee Name <td>Branch Address<td>Contact Number<th><th><th>

                <?php

                  $query_employees = $model->get_employees();

                  while($result= mysqli_fetch_assoc($query_employees)){


                  ?>  
                  <tr>
                    <td><?php echo $result['employee_id']; ?>
                    <td><?php echo $result['first_name']. ' '. $result['middle_name']. ' '.$result['last_name']; ?>
                    <td><?php switch($result['branch_id']){

                                    case 2:

                                      echo "Jagobiao";
                                      break;

                                    case 3:

                                      echo "Mandaue"; 
                                      break;

                                    case 6:

                                      echo "Consolacion";  

                                      break;
                                }
                                 ?>
                    <td><?php echo $result['employee_contact_number']; ?>
                      

            <?php } ?>
                          
                           </tbody>
                        </table>
                      </section>
                  </div>
              </div>

            </section>
          </section>
       </section>
   